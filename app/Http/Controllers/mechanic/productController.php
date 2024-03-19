<?php

namespace App\Http\Controllers\mechanic;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $product = product::where('active', 1)->get();
        return view('mechanic.product.index', ['products' => $product]);
    }

    public function new()
    {
        return view('mechanic.product.new');
    }

    public function edit($id)
    {
        $product = product::find($id);
        return view('mechanic.product.edit', ['product' => $product]);
    }


    public function store(Request $request)
    {
        $data = $request->validate(['serial' => 'required']
        );

        $newProduct = product::insert($data);
        return redirect()->route('product');
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([

            'serial' => 'numeric',
            'contract_start' => 'nullable',
            'contract_end' => 'nullable'

        ]);

        $product = product::find($id);
        $product->update($data);

        return redirect()->route('product');
    }

    public function delete($id)
    {
        $product = product::find($id);
        if ($product && $product->active == 1) {
            $product->update(['active' => 0]);
            return true;
        } else {
            return false;
        }
    }
}
