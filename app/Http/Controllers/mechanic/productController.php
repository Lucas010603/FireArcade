<?php

namespace App\Http\Controllers\mechanic;

use App\Http\Controllers\Controller;
use App\Models\mechanic\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $product = product::where('active', 1)->get();
        return view('mechanic.product.index', ['products' => $product]);
    }

    public function view($id)
    {
        $product = product::find($id);
        return view('mechanic.product.view', ['product' => $product]);
    }


    public function store(Request $request)
    {
        $data = $request->validate(['serial' => 'required','name' => 'required']
        );

        product::insert($data);
        return redirect()->route('mechanic.product');
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([

            'serial' => 'required',
            'name' => 'required',
            'contract_start' => 'nullable',
            'contract_end' => 'nullable'

        ]);

        $product = product::find($id);
        $product->update($data);

        return redirect()->route('mechanic.product');
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
