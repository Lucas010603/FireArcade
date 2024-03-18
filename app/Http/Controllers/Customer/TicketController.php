<?php

namespace app\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'serial' => 'required',
            'postal_code' => 'required',
            'description' => 'required'
        ]);

        $customer = Customer::where('postal_code', $data['postal_code'])->first();

        $product = Product::where('serial', $data['serial'])->first();

        if ($customer) {
            $data['customer_id'] = $customer->id;
        }

        if ($product) {
            $data['product_id'] = $product->id;
        }

        Ticket::insert($data);
        return redirect()->route('customerportal');
    }
}
