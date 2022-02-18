<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use App\Models\Ticket;
use App\Models\License;
use App\Models\Product;
use App\Models\User;
use Image;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers =  User::whereRoleIs(['customer'])->get()->map(function($customer) {
            $customer->total_license = License::where('buyer_id', $customer->id)->count();
            return $customer;
        });

        return view('admin.customer.index', compact('customers'));
    }

    public function index_banned()
    {
        $customers =  User::whereRoleIs(['customer'])->where('status', 'banned')->get()->map(function($customer) {
            $customer->total_order = Order::where('user_id', $customer->id)->count();
            // $customer->last_order = Order::where('user_id', $customer->id)->orderBy('created_at', 'desc')->first();
            $customer->total_deposit = Deposit::where('user_id', $customer->id)->count();
            $customer->wallet_balance = Wallet::where('user_id', $customer->id)->sum('balance');
            return $customer;
        });


        // dd(User::find('1')->orders());
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'status' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->status = $request->status;

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $request->name .'_'.rand(1,100). '.' . $image->getClientOriginalExtension();
            $imageName = str_replace(' ', '_', $imageName);
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(200, 200);
            $imgFile->save(public_path('uploads/images/profiles/'). $imageName, 60);
            $user->image = $imageName;
        }


        $user->save();

        $user->attachRole('customer');

        return redirect()->route('customer.index')->withSuccess('Customer Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $customer = User::find($id);
        $licenses = License::where('buyer_id', $customer->id)->paginate(7);

        return view('admin.customer.details')->with(compact('customer', 'licenses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.customer.edit');
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
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->firstname . ' ' . $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->status = $request->status;

        /* ------------------------------- User Avater ------------------------------ */
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $request->lastname .'_'.rand(1,100). '.' . $image->getClientOriginalExtension();
            $imageName = str_replace(' ', '_', $imageName);
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(200, 200);
            $imgFile->save(public_path('uploads/images/profiles/'). $imageName, 60);
            $user->image = $imageName;
        }

        /* --------------------------------- Wallet --------------------------------- */


        $user->update();


        return redirect()->back()->withSuccess('Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        User::find($id)->delete();

        return redirect()->route('customer.index')->withSuccess('Customer Deleted Successfully');
    }
}
