<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Http\Requests\StoreDepositRequest;
use App\Http\Requests\UpdateDepositRequest;
use Illuminate\Http\Request;
use DB;

class DepositController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd($query);

        return view('admin.deposit.index',
            [
                'deposits' => Deposit::all(),

            ]);
    }

    public function ajax_deposit($id)
    {
        $deposit = DB::table('deposits')
            ->where('deposits.id', $id)
            ->first();

        return response()->json($deposit);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request)
    // {
    //     $deposit = new Deposit();

    //     $deposit->payment_amount = $request->amount;
    //     $deposit->payment_method = $request->payment_method;
    //     $deposit->account_number = 'Admin_Account';
    //     $deposit->trx_id = 'This Transaction Was Made By Admin';
    //     $deposit->payment_status = $request->payment_status;
    //     $deposit->delivery_status = 'pending';
    //     $deposit->status = $request->status;

    //     $deposit->save();

    //     $user = User::find($request->customer_id);
    //     $this->sendDepositMail('deposit-confirmation', $deposit, $user);

    //     return redirect()->back()->withSuccess('Deposit Added Successfully');


    // }


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
    public function details($id)
    {
        $deposit = Deposit::find($id);

        return view('admin.deposit.details',
            [
                'deposit' => $deposit,

            ]);
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
        // $request->validate([
        //     'status|payment_status' => 'required',
        // ]);

        if ($request->status) {

            $deposit = Deposit::find($id);
            $deposit->status = $request->status;
            $deposit->update();
        }


        return redirect()->back()->withSuccess('Deposit Status Updated Successfully');

    }



    public function deposit_update_ajax(Request $request)
    {
        // $request->validate([
        //     'status|payment_status' => 'required',
        // ]);

        $id = $request->deposit_id;

        if ($request->status) {

            $deposit = Deposit::find($id);
            $deposit->status = $request->status;
            $deposit->update();
        }


        return redirect()->back()->withSuccess('Deposit Status Updated Successfully');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deposit = Deposit::find($id);
        $deposit->delete();

        return redirect()->route('deposit.index')->withSuccess('Deposit Deleted Successfully');
    }


    /* ----------------------------- Deposit Sorting ---------------------------- */


    public function completed(){

            return view('admin.deposit.index',
                [
                    'deposits' => DB::table('deposits')
                        ->where('deposits.status', '=', 'completed')
                        ->paginate(10)
                        ->appends(request()->query()),

                    'customers' => User::all(),

                ]);
    }

    public function processing(){

            return view('admin.deposit.index',
                [
                    'deposits' => DB::table('deposits')
                        ->where('deposits.status', '=', 'processing')
                        ->paginate(10)
                        ->appends(request()->query()),

                    'customers' => User::all(),

                ]);
    }

    public function pending(){

            return view('admin.deposit.index',
                [
                    'deposits' => DB::table('deposits')
                        ->where('deposits.status', '=', 'pending')
                        ->paginate(10)
                        ->appends(request()->query()),

                    'customers' => User::all(),

                ]);
    }

    public function cancelled(){

            return view('admin.deposit.index',
                [
                    'deposits' => DB::table('deposits')
                        ->where('deposits.status', '=', 'cancelled')
                        ->paginate(10)
                        ->appends(request()->query()),

                    'customers' => User::all(),

                ]);
    }



    /* -------------------------------------------------------------------------- */
    /*                                User Section                                */
    /* -------------------------------------------------------------------------- */

            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function pay(Request $request)
     {
         return view('user.payment', [
             'payment_for' => $request->for ,
         ]);

     }

     public function processPayment(Request $request)
     {
         $deposit = new Deposit();

         $deposit->payer_name = $request->payer_name;
         $deposit->payer_email = $request->payer_email;
         $deposit->payer_phone = $request->account_number;

        //  if ($request->payment_method == 'bkash'){
        //      $deposit->charge = round(($request->amount / 100) * 1.85);
        //  }
        //  elseif ($request->payment_method == 'rocket'){
        //      $deposit->charge = round(($request->amount / 100) * 1.80);
        //  }
        //  elseif ($request->payment_method == 'nagad'){
        //      $deposit->charge = round(($request->amount / 100) * 1.30);
        //  }else{
        //      $deposit->charge = 0;
        //  }

         $deposit->payment_for = $request->payment_for;
         $deposit->payment_amount = $request->amount;
         $deposit->payment_method = $request->payment_method;
         $deposit->account_number = $request->account_number;
         $deposit->trx_id = $request->trx_id;
         $deposit->status = 'pending';

         $deposit->save();

        //  $this->sendDepositNotification($deposit);
        //  $this->sendDepositMail('deposit-confirmation', $deposit, $user);

         return redirect()->route('user.pay',$request->payment_for)->withSuccess('Transaction Completed Successfully');

     }



    /* ---------------------------------- Mails --------------------------------- */

    public function sendDepositMail($mailType, $deposit, $user)
    {
        Mail::to($user->email)->send(new DepositMail($mailType, $deposit));

    }

}
