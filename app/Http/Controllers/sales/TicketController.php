<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use App\Models\sales\Customer;
use App\Models\sales\CustomerType;
use App\Models\sales\Product;
use App\Models\sales\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        $tickets = Ticket::where("type_id", 1)->with("user", "status", "type", "product.customer")->get();
        return view("sales.ticket.index", compact("tickets"));
    }

    public function new(){
        $customers = Customer::where('active', 1)->get();
        $products = Product::where(['active' => 1, 'customer_id' => null])->get();
        return view("sales.ticket.new", compact("customers", "products"));
    }

    public function show($id){
        $ticket = Ticket::where('id', $id)->with("user", "status", "type", "product.customer")->first();
        return view("sales.ticket.show", compact("ticket"));
    }

    public function cancel($id){
        $ticket = Ticket::find($id);
        if($ticket->status_id != 1){ return; }
        $ticket->update([
            "status_id" => 4,
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            "product_id" => "required",
            "customer_id" => "required",
            "description" => "nullable",
        ]);

        $product = Product::find($validated['product_id']);
        $product->update([
            "customer_id" => $validated["customer_id"],
            "contract_start" => Carbon::now(),
            "contract_end" => $request->extended_warenty ? Carbon::now()->addDays(730) : Carbon::now()->addDays(365),
            "contract" => "test",
        ]);

        Ticket::insert([
            'type_id' => 1,
            'status_id' => 1,
            'product_id' => $validated["product_id"],
            'description' => $validated["description"] ?? "",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('sales.ticket.index');
    }
}
