<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;

class ShowProducts extends Component
{
    public $products;
    public $search;

    public function mount()
    {
        $this->products = Product::all();
    }

    public function remove($id)
    {
        $product = Product::find($id);
        $imgPath = public_path('uploads/images/products/').$product->image;
        if (file_exists($imgPath)) {
            unlink($imgPath);
        }
        $product->delete();
        $this->products = Product::all();

        session()->flash('message', 'Product Deleted Successfully');
    }


    public function render()
    {
        return view('livewire.products.show-products');
    }
}
