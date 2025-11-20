<?php

namespace App\Http\Controllers;

use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(8)->get();
        return view('frontend.index', compact('products'));
    }

    public function product($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.product', compact('product'));
    }
}
