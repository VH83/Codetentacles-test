<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        
        return view('product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $imagePath = $request->file('image')->store('public/images');
    
        $imagePath = str_replace('public/', '', $imagePath);

        $product = Product::create([
            'name' => $request['name'],
            'amount' => $request['amount'],
            'description' => $request['description'],
            'image' => base_path($imagePath), 
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', [
            'product' =>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $product->name = $request->input('name');
        $product->amount = $request->input('amount');
        $product->description = $request->input('description');
    
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/images/' . $product->image);
            }
    
            $imagePath = $request->file('image')->store('public/images');
            $product->image = str_replace('public/', '', $imagePath);
        }   
    
        $product->save();
    
        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'product deleted successfully');
    }
}
