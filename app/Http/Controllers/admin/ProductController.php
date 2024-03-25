<?php

namespace app\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Product;
use App\Models\customer\Customer;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('customer')->where('active', 1)->get();
        return view('admin.product', compact('products'));
    }

    public function new()
    {
        $products = Product::where('active', 1)->get();
        return view('admin.product-new', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required',
                'serial' => 'required|unique:product',
            ],
            [
               'name.required' => "Vul een geldige product naam in",
               'serial.required' => "Vul een geldig serienummer in",
               'serial.unique' => "Het gekozen serienummer bestaat al"
            ]
        );
        Product::insert($data);
        return redirect()->route('adminportal.product');
    }

    public function edit($id)
    {
        $customers = Customer::where('active', 1)->get();
        $product = Product::where(['active' => 1, 'id' => $id])->first();
        return view("admin.product-edit", compact('product', 'customers'));
    }

    public function update($id, Request $request)
    {
        $product = Product::with('customer')->find($id);
        if($product->customer){
            $data = $request->validate(
                [
                    'name' => 'required',
                    'serial' => 'required',
                    'customer_id' => 'required',
                    'contract_end' => 'required'
                ],[
                    'name.required' => 'Kies een naam',
                    'serial.required' => 'Kies een Serienummer',
                    'customer_id.required' => 'Selecteer een klant',
                    'contract_end.required' => 'Selecteer een eind datum voor het contract'
                ]
            );
        }else{
            $data = $request->validate(
                [
                    'name' => 'required',
                    'serial' => 'required',
                ],[
                    'name.required' => 'Kies een naam',
                    'serial.required' => 'Kies een Serienummer',
                ]
            );
        }


        $product->update($data);

        return redirect()->route('adminportal.product');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->update(["active" => 0]);
        return response()->json($product);
    }
}
