<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use App\Models\sales\Customer;
use App\Models\sales\CustomerType;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::where("active", 1)->with("type")->get();
        return view("sales.customer.index", compact("customers"));
    }

    public function new(){
        $types = CustomerType::get();
        return view("sales.customer.new", compact("types"));
    }

    public function edit($id){
        $customer = Customer::find($id);
        $types = CustomerType::get();
        return view("sales.customer.edit", compact("types", "customer"));
    }


    public function store(Request $request){
        $validated = $request->validate([
            'type_id' => 'required',
            'full_name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'bank_account_number' => 'required',
            'phone_number' => 'nullable',
        ]);
        Customer::insert($validated);

        return redirect()->route('sales.customer.index');
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'type_id' => 'required',
            'full_name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'bank_account_number' => 'required',
            'phone_number' => 'nullable',
        ]);

        Customer::find($id)->update($validated);

        return redirect()->route('sales.customer.index');
    }

    public function delete($id){
        Customer::find($id)->update([
            'active' => 0
        ]);
        return route("sales.customer.index");
    }
}
