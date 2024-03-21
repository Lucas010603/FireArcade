<?php

namespace App\Http\Controllers\mechanic;

use App\Http\Controllers\Controller;
use App\Models\mechanic\Customer;
use App\Models\mechanic\product;
use App\Models\mechanic\ticket;
use App\Models\mechanic\TicketStatus;
use App\Models\mechanic\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ticketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('status', 'type', 'user', 'product.customer')->get();

        return view('mechanic.ticket.index', compact('tickets'));
    }

    public function personal()
    {
        Auth::login(User::where('role_id',3)->first());
        $user = Auth::user();

        $tickets = Ticket::where('user_id', $user->id)->with('status', 'type', 'user', 'product.customer')->get();

        return view('mechanic.ticket.index', compact('tickets'));
    }

    public function edit($id)
    {
        $ticket = Ticket::find($id);
        $ticket_status = TicketStatus::all();
        $product = product::where('active', 1)->get();
        $customer = Customer::where('active', 1)->get();
        return view('mechanic.ticket.edit',compact('ticket','ticket_status','product','customer'));
    }

    public function update($id, Request $request)
    {

        $data = $request->validate([
            'action' => 'required',
        ]);


        $ticket = Ticket::find($id);
        $ticket->actions = $data['action'];
        $ticket->updated_at = Carbon::now();
        $ticket->save();

        return redirect()->route('mechanic.ticket');
    }

    public function delete($id){

        $ticket = ticket::find($id);
        if ($ticket && $ticket->status_id == 1 ||  $ticket->status_id == 2) {
            $ticket->update(['status_id' => 4]);
            $ticket->updated_at = Carbon::now();

        }
        return route('ticket');
    }

    public function accept($id){
        Auth::login(User::where('role_id',3)->first());

      $ticket = ticket::find($id);

      if($ticket && $ticket->status_id == 1){
        $ticket->update(['user_id' => Auth::user()->id,'status_id' => 2]);
          $ticket->updated_at = Carbon::now();;
      }

    }

    public function finnish($id){
        $ticket = ticket::find($id);

        if($ticket && $ticket->status_id == 2){
            $ticket->update(['status_id' => 3]);
            $ticket->updated_at = Carbon::now();;
            return route('ticket');
        }

    }



}
