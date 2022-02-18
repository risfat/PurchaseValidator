<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use Auth;
use DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        $total_tickets =  Ticket::count();
        $closed_tickets =  Ticket::where('status', 'closed')->count();
        $open_tickets =  Ticket::where('status', 'open')->count();
        $total_assignees = DB::table('tickets')->where('served_by', '!=', null)->distinct()->count('served_by');
        return view('admin.ticket.index', compact('tickets','total_tickets','closed_tickets','open_tickets','total_assignees'));
    }
    public function serving_tickets()
    {
        $tickets = Ticket::where('status', 'open')->get();
        $total_tickets =  Ticket::count();
        $closed_tickets =  Ticket::where('status', 'closed')->count();
        $open_tickets =  Ticket::where('status', 'open')->count();
        $total_assignees = DB::table('tickets')->where('served_by', '!=', null)->distinct()->count('served_by');
        return view('admin.ticket.index', compact('tickets','total_tickets','closed_tickets','open_tickets','total_assignees'));
    }
    public function served_tickets()
    {
        $tickets = Ticket::where('status', 'closed')->get();
        $total_tickets =  Ticket::count();
        $closed_tickets =  Ticket::where('status', 'closed')->count();
        $open_tickets =  Ticket::where('status', 'open')->count();
        $total_assignees = DB::table('tickets')->where('served_by', '!=', null)->distinct()->count('served_by');
        return view('admin.ticket.index', compact('tickets','total_tickets','closed_tickets','open_tickets','total_assignees'));
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
        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required',
            'user_phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $ticket = new Ticket;
        $ticket->user_name = $request->user_name;
        $ticket->user_email = $request->user_email;
        $ticket->user_phone = $request->user_phone;
        $ticket->subject = $request->subject;
        $ticket->message = $request->message;
        $ticket->status = 'open';
        $ticket->priority = 'normal';

        $user = User::where('email', $request->user_email)->first();
        if ($user) {
            $ticket->user_id = $user->id;
        }

        $ticket->save();

        return redirect()->back()->withSuccess('Your Support Ticket Has Been Created Successfully');
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
        $ticket = Ticket::find($id);
        return view('admin.ticket.edit', compact('ticket'));
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
            'notes' => 'required'
        ]);

        $ticket = Ticket::find($id);
        $ticket->notes = $request->notes;
        $ticket->save();


        return redirect()->back()->withSuccess('Ticket Notes Updated Successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_ajax(Request $request, $id)
    {
        $ticket = Ticket::find($id);

        if ($request->status) {
            $ticket->status = $request->status;
            $ticket->served_by = Auth::user()->id;
        }

        if ($request->priority) {
            $ticket->priority = $request->priority;
            $ticket->served_by = Auth::user()->id;
        }

        $ticket->save();

        if ($ticket->save()) {
            return response()->json(['success' => 'Ticket Updated Successfully']);
        } else {
            return response()->json(['error' => 'Ticket Not Updated']);
        }

    }

    public function ticket_close($id)
    {
        $ticket = Ticket::find($id);
        $ticket->status = 'closed';
        $ticket->served_by = Auth::user()->id;
        $ticket->save();

        return redirect()->back()->withSuccess('Ticket Closed Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::destroy($id);

        return redirect()->back()->withSuccess('Ticket Deleted Successfully');
    }



    /* -------------------------------------------------------------------------- */
    /*                                User Section                                */
    /* -------------------------------------------------------------------------- */

    public function user_index()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->get();

        return view('user.tickets.index', compact('tickets'));
    }
}
