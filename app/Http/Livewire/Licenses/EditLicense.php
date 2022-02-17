<?php

namespace App\Http\Livewire\Licenses;

use Livewire\Component;
use App\Models\License;
use App\Models\Product;
use App\Models\User;

class EditLicense extends Component
{
    public $license;
    public $product;
    public $customer;

    public $license_expiry_date;
    public $license_type;
    public $license_key;
    public $license_domain;
    public $license_status;

    protected $listeners = [
        'set:GetLicense' => 'GetLicense'
    ];

    public function GetLicense($license_id)
    {
        $this->license = License::find($license_id);
        $this->product = Product::find($this->license->product_id);
        $this->customer = User::find($this->license->buyer_id);

        $this->license_type = $this->license->type;
        $this->license_domain = $this->license->domain;
        $this->license_key = $this->license->key;
        $this->license_expiry_date = $this->license->expired_at;
        $this->license_status = $this->license->status;
    }

    public function UpdateLicense()
    {

        $this->license->update([
            'expired_at' => $this->license_expiry_date,
            'type' => $this->license_type,
            'domain' => $this->license_domain,
            'status' => $this->license_status
        ]);

        session()->flash('success', 'License Updated Successfully.');

        return redirect()->route('admin.license');
    }

    public function GenerateLicense()
    {
        if ($this->customer->id && $this->product->id && $this->license_type && $this->license_domain && $this->license_expiry_date) {
            $this->license_key = 'CID-'.$this->customer->id .'-'.'PID-'. $this->product->id .'-'.'LT-'. strtoupper(substr($this->license_type,0,2)) .'-'. $this->license_domain .'-'. date('Ymd') .'-'. $this->generateRandomString(5) . '-' . $this->license_expiry_date;

            $this->license->update([
                'key' => $this->license_key
            ]);
            session()->flash('success', 'License Key Updated Successfully.');

        }else{
            session()->flash('error', 'Something Went Wrong.');
        }


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
        return view('livewire.licenses.edit-license');
    }
}
