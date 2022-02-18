<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function calendar()
    {
        return view('admin.apps.calendar');
    }

    public function user_calendar()
    {
        return view('user.apps.calendar');
    }
}
