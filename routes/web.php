<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect()->intended('admin/dashboard');
});

Route::group(['prefix' => 'admin' , 'middleware' => ['auth','role:admin|superadmin']], function () {

    /* --------------------------- Basic Admin Routes --------------------------- */

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

});
