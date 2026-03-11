<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {

        Product::create($request->all());

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {

        $product->update($request->all());

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {

        $product->delete();

        return back();
    }

}