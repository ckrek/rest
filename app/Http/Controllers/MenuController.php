<?php
namespace App\Http\Controllers;
use App\Models\Product;


class MenuController extends Controller
{
    public function index($category = null)
    {
        $categories = ['Салаты','Супы','Закуски','Горячее','Гриль'];

        $products = $category 
            ? Product::where('category', $category)->get() 
            : Product::all();

        return view('welcome', compact('products','categories','category'));
    }
}