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
        $products = Product::where('active', 1)->get();
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
                'serial' => 'required',
            ]
        );
        Product::insert($data);
        return redirect()->route('product');
    }

    public function edit($id)
    {
        $customers = Customer::where('active', 1)->get();
        $product = Product::where(['active' => 1, 'id' => $id])->first();
        return view("admin.product-edit", compact('product', 'customers'));
    }

    public function update($id, Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required',
                'serial' => 'required',
                'customer_id' => 'nullable',
                'contract_start' => 'nullable',
                'contract_end' => 'nullable'
            ]
        );

        $product = Product::find($id);
        $product->update($data);

        return redirect()->route('product');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->update(["active" => 0]);
        return response()->json($product);
    }
}
