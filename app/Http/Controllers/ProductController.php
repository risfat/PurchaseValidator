<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'status' => 'required',
                'description' => 'required',
                'image' => 'required',
                'price' => 'required',
            ]
        );


        /* ------------------------------Product Image------------------------------- */

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imageName = rand(1,100).'_'.$imageName;
        $imageName = str_replace(' ', '_', $imageName);
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(270, 350);
        $imgFile->save(public_path('uploads/images/products/'). $imageName, 90);
        $product_image = $imageName;

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'image' => $product_image,
            'price' => $request->price,
            'licensed' => 0,
            'status' => $request->status,
        ]);

        return redirect()->route('products.create')->withSuccess('Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.products.edit',
            [
                'product' => Product::find($id),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'status' => 'required',
                'description' => 'required',
                'price' => 'required',
            ]
        );

        $product = Product::find($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imageName = rand(1,100).'_'.$imageName;
            $imageName = str_replace(' ', '_', $imageName);
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(270, 350);
            $imgFile->save(public_path('uploads/images/products/'). $imageName, 90);
            $product->image = $imageName;

        }


        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->status = $request->status;

        $product->update();

        return redirect()->route('products.edit', $id)->withSuccess('Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $imgPath = public_path('uploads/images/products/').$product->image;
        if (file_exists($imgPath)) {
            unlink($imgPath);
        }
        $product->delete();
        return redirect()->route('products.index')->withSuccess('Product Deleted Successfully');
    }
}
