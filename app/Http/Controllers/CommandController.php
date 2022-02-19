<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class CommandController extends Controller
{
    public function down()
    {
        Artisan::call('down',['--secret'=>'secret']);

        return 'Site is down';
    }


    public function up()
    {
        Artisan::call('up');

        return 'Site is now up!';
    }

    public function optimize()
    {
        Artisan::call('optimize');
        Artisan::call('event:cache');
        Artisan::call('config:cache');
        Artisan::call('view:cache');
        Artisan::call('route:cache');


        return 'Site is now optimized!';
    }

    public function clear()
    {
        Artisan::call('optimize:clear');
        Artisan::call('cache:clear');
        Artisan::call('event:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        // Artisan::call('clear-compiled');


        return 'Cache cleared!';
    }


}
