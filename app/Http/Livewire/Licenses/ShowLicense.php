<?php

namespace App\Http\Livewire\Licenses;

use Livewire\Component;
use App\Models\License;
use App\Models\Product;
use App\Models\User;

class ShowLicense extends Component
{

    public $license;
    public $product;
    public $customer;

    protected $listeners = [
        'set:GetLicense' => 'GetLicense'
    ];

    public function GetLicense($license_id)
    {
        $this->license = License::find($license_id);
        $this->product = Product::find($this->license->product_id);
        $this->customer = User::find($this->license->buyer_id);
    }


    public function copyText()
    {
        session()->flash('success', 'License Copied Successfully.');

    }




    public function render()
    {
        return view('livewire.licenses.show-license');
    }
}
