<?php
namespace App\Livewire\Public;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Cart as CartModel;
use App\Models\CartItem;

class Cart extends Component
{
    public $cart = [];

    public function mount()
    {
        $this->syncCart();
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

            // ✅ Load DB cart
            $this->cart = CartItem::with('productVariant.product')
                ->where('cart_id', $dbCart->id)
                ->get()
                ->mapWithKeys(function ($item) {
                    return [
                        $item->product_variant_id => [
                            'variant_id' => $item->product_variant_id,
                            'product_name' => $item->productVariant->product->title,
                            'price' => $item->productVariant->sale_price,
                            'mrp' => $item->productVariant->mrp,
                            'quantity' => $item->quantity,
                            'weight' => $item->productVariant->weight . ' ' . $item->productVariant->weight_unit,
                            'flavor' => $item->productVariant->flavor,
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
        return view('livewire.public.cart');
    }
}