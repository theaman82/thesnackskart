<?php
namespace App\Livewire\Public;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use App\Models\Cart as CartModel;
use App\Models\CartItem;
use App\Models\Address;

class Cart extends Component
{
    public $cart = [];
    public $addresses = [];
    public $selectedAddressId = null;
    public $paymentMethod = 'cod';
    public $showAddressModal = false;

    #[Validate('required|string')]
    public $addressName = '';
    
    #[Validate('required|string|max:15')]
    public $addressPhone = '';
    
    #[Validate('required|string')]
    public $addressType = 'home';
    
    #[Validate('required|string')]
    public $addressLine = '';
    
    #[Validate('required|string')]
    public $city = '';
    
    #[Validate('required|string')]
    public $state = '';
    
    #[Validate('required|string|max:6')]
    public $pincode = '';
    
    public $landmark = '';
    public $isDefault = false;

    protected $listeners = ['addressSaved' => 'loadAddresses'];

    public function mount()
    {
        $this->syncCart();
        if (auth()->check()) {
            $this->loadAddresses();
        }
    }

    public function loadAddresses()
    {
        if (auth()->check()) {
            $this->addresses = Address::where('user_id', auth()->id())
                ->where('status', true)
                ->get()
                ->toArray();
            
            // Auto-select default address if exists
            if (empty($this->selectedAddressId) && !empty($this->addresses)) {
                $defaultAddress = collect($this->addresses)->firstWhere('is_default', true);
                $this->selectedAddressId = $defaultAddress['id'] ?? $this->addresses[0]['id'] ?? null;
            }
        }
    }

    public function openAddressModal()
    {
        $this->resetAddressForm();
        $this->addressName = auth()->user()->name;
        $this->showAddressModal = true;
    }

    public function resetAddressForm()
    {
        $this->addressName = '';
        $this->addressPhone = '';
        $this->addressType = 'home';
        $this->addressLine = '';
        $this->city = '';
        $this->state = '';
        $this->pincode = '';
        $this->landmark = '';
        $this->isDefault = false;
    }

    public function saveAddress()
    {
        $this->validate();

        Address::create([
            'user_id' => auth()->id(),
            'name' => $this->addressName,
            'phone' => $this->addressPhone,
            'address_type' => $this->addressType,
            'address_line' => $this->addressLine,
            'city' => $this->city,
            'state' => $this->state,
            'pincode' => $this->pincode,
            'landmark' => $this->landmark,
            'is_default' => $this->isDefault,
        ]);

        $this->loadAddresses();
        $this->showAddressModal = false;
        $this->resetAddressForm();
        $this->dispatch('addressSaved');
    }

    // 🔥 MAIN LOGIC
    public function syncCart()
    {
        if (auth()->check()) {

            $user = auth()->user();

            $dbCart = CartModel::firstOrCreate([
                'user_id' => $user->id
            ]);

            // ✅ Merge session into DB
            $sessionCart = session()->get('cart', []);

            foreach ($sessionCart as $item) {

                $existing = CartItem::where([
                    'cart_id' => $dbCart->id,
                    'product_variant_id' => $item['variant_id']
                ])->first();

                if ($existing) {
                    $existing->increment('quantity', $item['quantity']);
                } else {
                    CartItem::create([
                        'cart_id' => $dbCart->id,
                        'product_variant_id' => $item['variant_id'],
                        'quantity' => $item['quantity']
                    ]);
                }
            }

            // ❗ clear session after merge
            session()->forget('cart');

            // ✅ Load DB cart with images
            $this->cart = CartItem::with([
                'productVariant.product.images',
                'productVariant'
            ])->where('cart_id', $dbCart->id)
                ->get()
                ->mapWithKeys(function ($item) {
                    $imageUrl = $item->productVariant->product->images->first()?->image_url ?? null;
                    
                    return [
                        $item->product_variant_id => [
                            'id' => $item->id,
                            'variant_id' => $item->product_variant_id,
                            'product_name' => $item->productVariant->product->title,
                            'price' => $item->productVariant->sale_price,
                            'mrp' => $item->productVariant->mrp,
                            'quantity' => $item->quantity,
                            'weight' => $item->productVariant->weight . ' ' . $item->productVariant->weight_unit,
                            'flavor' => $item->productVariant->flavor,
                            'image' => $imageUrl ? asset('storage/' . $imageUrl) : asset('images/placeholder.png'),
                        ]
                    ];
                })->toArray();

        } else {
            // Guest
            $this->cart = session()->get('cart', []);
        }
    }

    // ✅ Quantity
    public function increase($id)
    {
        if (auth()->check()) {
            $cart = CartModel::where('user_id', auth()->id())->first();
            $item = $cart->items()->where('product_variant_id', $id)->first();
            $item->increment('quantity');
        } else {
            $this->cart[$id]['quantity']++;
            session()->put('cart', $this->cart);
        }

        $this->syncCart();
    }

    public function decrease($id)
    {
        if (auth()->check()) {
            $cart = CartModel::where('user_id', auth()->id())->first();
            $item = $cart->items()->where('product_variant_id', $id)->first();

            if ($item->quantity > 1) {
                $item->decrement('quantity');
            } else {
                $item->delete();
            }
        } else {
            if ($this->cart[$id]['quantity'] > 1) {
                $this->cart[$id]['quantity']--;
            } else {
                unset($this->cart[$id]);
            }

            session()->put('cart', $this->cart);
        }

        $this->syncCart();
    }

    public function remove($id)
    {
        if (auth()->check()) {
            $cart = CartModel::where('user_id', auth()->id())->first();
            $cart->items()->where('product_variant_id', $id)->delete();
        } else {
            unset($this->cart[$id]);
            session()->put('cart', $this->cart);
        }

        $this->syncCart();
    }

    // 💰 Calculations
    public function getTotalProperty()
    {
        return collect($this->cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    }

    public function getSubtotalProperty()
    {
        return collect($this->cart)->sum(fn($item) => $item['mrp'] * $item['quantity']);
    }

    public function getDiscountProperty()
    {
        return $this->subtotal - $this->total;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.public.cart', [
            'selectedAddress' => auth()->check() && $this->selectedAddressId 
                ? Address::find($this->selectedAddressId) 
                : null,
        ]);
    }
}