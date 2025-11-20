<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // List products
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    // Show add product form
    public function create()
    {
        return view('admin.products.create');
    }

    // Store product
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imagePath = null;

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name'  => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'stock' => $request->stock ?? 0,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product added successfully');
    }

    // Edit form
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Update product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'  => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imagePath = $product->image;

        if($request->hasFile('image')){
            if($product->image){
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products','public');
        }

        $product->update([
            'name'  => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'stock' => $request->stock,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    // Delete product
    public function destroy(Product $product)
    {
        if($product->image){
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product removed successfully');
    }
}
