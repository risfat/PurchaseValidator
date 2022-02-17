<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddProducts extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $image;
    public $price;
    public $status;



    public function submit()
    {
        $this->validate(
            [
                'name' => 'required',
                'status' => 'required',
                'description' => 'required',
                'image' => 'required',
                'price' => 'required',
            ]
        );

        // Execution doesn't reach here if validation fails.

        Product::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'image' => $this->image,
            'price' => $this->price,
            'licensed' => 0,
            'status' => $this->status,
        ]);


    }


    public function render()
    {
        return view('livewire.products.add-products');
    }
}
