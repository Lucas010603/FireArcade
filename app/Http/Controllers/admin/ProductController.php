<?php

namespace app\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Product;
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
}
