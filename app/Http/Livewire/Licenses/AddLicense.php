<?php

namespace App\Http\Livewire\Licenses;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Models\License;

class AddLicense extends Component
{
    public $selected_customer;
    public $selected_product;
    public $license;
    public $license_type;
    public $license_domain;
    public $license_expiry_date;
    public $status;


    public function mount()
    {
        $this->customers = User::all();
        $this->products = Product::all();

    }

    public function SelectCustomer($customer)
    {
        $this->selected_customer = User::find($customer);
    }

    public function SelectProduct($product)
    {
        $this->selected_product = Product::find($product);
    }

    public function GenerateLicense()
    {
        if ($this->selected_customer && $this->selected_product && $this->license_type && $this->license_domain && $this->license_expiry_date) {
            $this->license = 'CID-'.$this->selected_customer->id .'-'.'PID-'. $this->selected_product->id .'-'.'LT-'. strtoupper(substr($this->license_type,0,2)) .'-'. $this->license_domain .'-'. date('Ymd') .'-'. $this->generateRandomString(5) . '-' . $this->license_expiry_date;

            session()->flash('success', 'License Generated Successfully.');

        }else{
            session()->flash('error', 'Please Fill All Fields Above.');
        }


    }


    public function CreateLicense()
    {
        $license = new License;

        $license->type = $this->license_type;
        $license->product_id = $this->selected_product->id;
        $license->buyer_id = $this->selected_customer->id;
        $license->license_key = $this->license;
        $license->domain = $this->license_domain;
        $license->status = $this->status;
        $license->expired_at = $this->license_expiry_date;
        $license->save();

        $this->selected_product->licensed ++;
        $this->selected_product->save();

        session()->flash('success', 'License Created Successfully.');

        return redirect()->route('admin.license');

    }


    function generateRandomString($length = 25) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function render()
    {
        return view('livewire.licenses.add-license');
    }
}
