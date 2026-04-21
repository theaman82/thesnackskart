<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Address;

class AddressModal extends Component
{
    public $showModal = false;
    public $isEdit = false;
    public $addressId;

    public $name, $phone, $alt_phone, $address_type;
    public $landmark, $street, $area, $address_line;
    public $city, $state, $pincode;
    public $is_default = false;

    protected $listeners = ['openAddressModal'];

    public function openAddressModal($data = null)
    {
        $this->resetFields();

        if ($data) {
            $this->isEdit = true;
            $this->addressId = $data['id'];

            $this->fill($data);
        } else {
            $this->isEdit = false;
            $this->name = auth()->user()->name; // default
        }

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
        ]);

        Address::updateOrCreate(
            ['id' => $this->addressId],
            [
                'name' => $this->name,
                'phone' => $this->phone,
                'alt_phone' => $this->alt_phone,
                'address_type' => $this->address_type,
                'landmark' => $this->landmark,
                'street' => $this->street,
                'area' => $this->area,
                'address_line' => $this->address_line,
                'city' => $this->city,
                'state' => $this->state,
                'pincode' => $this->pincode,
                'is_default' => $this->is_default,
            ]
        );

        $this->dispatch('addressSaved'); // refresh list
        $this->showModal = false;
    }

    public function resetFields()
    {
        $this->reset([
            'addressId',
            'name',
            'phone',
            'alt_phone',
            'address_type',
            'landmark',
            'street',
            'area',
            'address_line',
            'city',
            'state',
            'pincode',
            'is_default'
        ]);
    }

    public function render()
    {
        return view('livewire.address-modal');
    }
}
