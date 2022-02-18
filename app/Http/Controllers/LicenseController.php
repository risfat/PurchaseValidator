<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\License;
use App\Models\User;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licenses = License::get()->map(function($license){
            $license->customer = User::find($license->buyer_id)->name;
            $license->product = Product::find($license->product_id)->name;
            return $license;
        })->sortByDesc('id');

        return view('admin.licenses.index', compact('licenses'));
    }

    public function active_licenses()
    {
        $licenses = License::where('expired_at', '<', date('Y-m-d H:i:s'))->get()->map(function($license){
            $license->customer = User::find($license->buyer_id)->name;
            $license->product = Product::find($license->product_id)->name;
            return $license;
        })->sortByDesc('id');

        return view('admin.licenses.index', compact('licenses'));
    }

    public function expired_licenses()
    {
        $licenses = License::where('expired_at', '>', date('Y-m-d H:i:s'))->get()->map(function($license){
            $license->customer = User::find($license->buyer_id)->name;
            $license->product = Product::find($license->product_id)->name;
            return $license;
        })->sortByDesc('id');

        return view('admin.licenses.index', compact('licenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $license = License::find($id);
        $license->delete();

        return redirect()->route('admin.license')->withSuccess('License Deleted Successfully.');
    }


    public function verify($key,$domain,$cid,$pid)
    {
        $license = License::where('license_key',$key)->first();

        if(!$license)
        {
            return response()->json(['status' => 'error', 'message' => 'Invalid License Key.']);
        }

        if($license->status == 0)
        {
            return response()->json(['status' => 'error', 'message' => 'License Key is Suspended.']);
        }

        if($license->domain != $domain)
        {
            return response()->json(['status' => 'error', 'message' => 'Invalid Domain.']);
        }

        if($license->buyer_id != $cid)
        {
            return response()->json(['status' => 'error', 'message' => 'Invalid Customer.']);
        }

        if($license->product_id != $pid)
        {
            return response()->json(['status' => 'error', 'message' => 'Invalid Product.']);
        }

        return response()->json(['status' => 'success', 'message' => 'License Key is Valid.']);

    }
}
