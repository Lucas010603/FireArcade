<?php

namespace App\Http\Controllers\mechanic;

use App\Http\Controllers\Controller;
use App\Models\ticket;

class ticketController extends Controller
{
    public function index()
    {
        //$tickets = ticket::where('active', 1)->get();
        //Ticket::where("active", 1)->with("type", "product.customer", "status")->get();

        //return view('mechanic.ticket.index', compact('tickets'));
    }

}
