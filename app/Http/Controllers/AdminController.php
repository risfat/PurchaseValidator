<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }


    public function adminProfle()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    public function adminProfleUpdate(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = Auth::user();
        $user->name = $request->firstname . ' ' . $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->fb_id = $request->fb_id;
        $user->google_id = $request->google_id;
        $user->twitter_id = $request->twitter_id;
        $user->linkedin_id = $request->linkedin_id;
        $user->insta_id = $request->insta_id;
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

        $user->update();

        return redirect()->back()->withSuccess('Profile Updated Successfully');
    }



}
