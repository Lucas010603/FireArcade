<?php

namespace app\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\admin\Product;
use App\Models\customer\Customer;
use App\Models\customer\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'postal_code' => 'required',
            'serial' => 'required',
            'description' => 'required'
        ]);

        $customer = Customer::where('postal_code', $data['postal_code'])->first();
        $product = Product::where('serial', $data['serial'])->first();

        if (!($customer && $product)) {
            return redirect()->back()->withErrors(['validation' => 0]);
        }

        Ticket::insert(
            [
                'type_id' => 2,
                'status_id' => 1,
                'product_id' => $product->id,
                'customer_id' => $customer->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'description' => $data['description']
            ]
        );

        return redirect()->back()->with(
            'success', 1
        );

    }
}
