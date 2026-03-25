<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Проверка роли прямо внутри метода
    private function checkAdmin()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Доступ запрещён');
        }
    }

    public function index()
    {
        $this->checkAdmin(); // проверка админа
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $this->checkAdmin();
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $this->checkAdmin();

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $filename);
            $imagePath = 'img/' . $filename;
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Продукт создан');
    }

    public function edit(Product $product)
    {
        $this->checkAdmin();
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
{
    $this->checkAdmin();

    // Валидация
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'price' => 'required|numeric',
        'category' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048', // 2MB
    ]);

    // Обновляем поля
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->category = $request->category;

    // Обработка нового изображения
    if ($request->hasFile('image')) {
        // Удаляем старый файл, если есть
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('img'), $filename);
        $product->image = 'img/' . $filename;
    }

    // Сохраняем изменения
    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Продукт обновлён');
}

    public function destroy(Product $product)
    {
        $this->checkAdmin();

        // Удаляем файл изображения
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $product->delete();

        return back()->with('success', 'Продукт удалён');
    }
}