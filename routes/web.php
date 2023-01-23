<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\DepositController;

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
})->name('home');

Route::group(['prefix' => 'admin' , 'middleware' => ['auth','role:admin|superadmin']], function () {

    /* --------------------------- Basic Admin Routes --------------------------- */

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [AdminController::class, 'adminProfle'])->name('admin.profile');
    Route::post('/profile/update', [AdminController::class, 'adminProfleUpdate'])->name('admin.profile.update');

    /* ----------------------------- Products Route ----------------------------- */

    Route::resource('/products', ProductController::class);


    /* ------------------------------ License Route ----------------------------- */

    Route::get('/licenses', [LicenseController::class, 'index'])->name('admin.license');
    Route::get('/licenses/{id}/details', [LicenseController::class, 'show'])->name('license.details');
    Route::get('/licenses/{id}/delete', [LicenseController::class, 'destroy'])->name('admin.license.delete');
    Route::get('/licenses/active', [LicenseController::class, 'active_licenses'])->name('active.license');
    Route::get('/licenses/expired', [LicenseController::class, 'expired_licenses'])->name('expired.license');


    /* ----------------------------- Customers Route ----------------------------- */

    Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/{id}/details', [CustomerController::class, 'details'])->name('customer.details');
    Route::get('/customer/create',[CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer/create',[CustomerController::class, 'store'])->name('customer.store');
    // Route::get('/customer/{id}/edit', [CustomerController::class,'edit'])->name('customer.edit');
    Route::post('/customer/{id}/update', [CustomerController::class,'update'])->name('customer.update');
    Route::get('/customer/{id}/delete', [CustomerController::class,'delete'])->name('customer.delete');



    /* ------------------------------ Deposit Routes ------------------------------ */

    Route::get('/deposit', [DepositController::class, 'index'])->name('deposit.index');
    Route::get('/deposit/pending', [DepositController::class, 'pending'])->name('deposit.pending');
    Route::get('/deposit/processing', [DepositController::class, 'processing'])->name('deposit.processing');
    Route::get('/deposit/completed', [DepositController::class, 'completed'])->name('deposit.completed');
    Route::get('/deposit/cancelled', [DepositController::class, 'cancelled'])->name('deposit.cancelled');

    Route::get('/deposit/create', [DepositController::class, 'create'])->name('deposit.create');
    Route::get('/deposit/{id}/details', [DepositController::class, 'details'])->name('deposit.details');
    Route::post('/deposit/{id}/update', [DepositController::class, 'update'])->name('deposit.update');
    Route::get('/deposit/{id}/delete', [DepositController::class, 'delete'])->name('deposit.delete');

    Route::get('/deposit/{id}', [DepositController::class, 'ajax_deposit'])->name('ajax.deposit');
    Route::post('/deposit/update', [DepositController::class, 'deposit_update_ajax'])->name('deposit.update.ajax');


    /* --------------------------------- Tickets -------------------------------- */

    Route::get('/support/ticket', [TicketController::class, 'index'])->name('ticket.index');
    Route::get('/support/ticket/serving', [TicketController::class, 'serving_tickets'])->name('ticket.serving');
    Route::get('/support/ticket/served', [TicketController::class, 'served_tickets'])->name('ticket.served');
    // Route::get('/support/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
    Route::post('/support/ticket/create', [TicketController::class, 'store'])->name('ticket.store');
    Route::get('/support/ticket/{id}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
    Route::post('/support/ticket/{id}/update', [TicketController::class, 'update'])->name('ticket.update');
    Route::post('/support/ticket/{id}/update/ajax', [TicketController::class, 'update_ajax'])->name('ticket.update.ajax');
    Route::get('/support/ticket/{id}/delete', [TicketController::class, 'destroy'])->name('ticket.delete');
    Route::get('/support/ticket/{id}/close', [TicketController::class, 'ticket_close'])->name('ticket.close');


    /* ------------------------------ Apps Routes ----------------------------- */

    Route::get('/calendar', [AppController::class, 'calendar'])->name('admin.calendar');


    /* -------------------------------- Commands -------------------------------- */

    Route::get('/commands/down', [CommandController::class, 'down'])->name('maintenance.down');
    Route::get('/commands/up', [CommandController::class, 'up'])->name('maintenance.up');

    Route::get('/commands/optimize', [CommandController::class, 'optimize'])->name('optimize');
    Route::get('/commands/clear', [CommandController::class, 'clear'])->name('clear');


});


Route::group(['prefix' => 'user' , 'middleware' => ['auth','role:user|admin|superadmin']], function () {

    Route::get('/pay/{for}', [DepositController::class, 'pay'])->name('user.pay');
    Route::post('/process/payment', [DepositController::class, 'processPayment'])->name('process.payment');

});
