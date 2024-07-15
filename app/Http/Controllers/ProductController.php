<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller {
    public function index() {
        $products = Product::with(['brand', 'category'])->get();
        return view('products.index', compact('products'));
    }

    public function create() {
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.create', compact('brands', 'categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'stock.required' => 'O campo estoque é obrigatório.',
            'price.required' => 'O campo preço é obrigatório.',
            'brand_id.required' => 'O campo marca é obrigatório.',
            'category_id.required' => 'O campo categoria é obrigatório.',
        ]);

        $path = $request->file('photo') ? $request->file('photo')->store('photos') : null;

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'photo' => $path,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index');
    }

    public function edit(Product $product) {
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.edit', compact('product', 'brands', 'categories'));
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'photo' => 'nullable|image',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'stock.required' => 'O campo estoque é obrigatório.',
            'price.required' => 'O campo preço é obrigatório.',
            'brand_id.required' => 'O campo marca é obrigatório.',
            'category_id.required' => 'O campo categoria é obrigatório.',
        ]);

        if ($request->hasFile('photo')) {
            if ($product->photo) {
                Storage::delete($product->photo);
            }
            $path = $request->file('photo')->store('photos');
            $product->photo = $path;
        }

        $product->update($request->only(['name', 'description', 'stock', 'price', 'brand_id', 'category_id']));

        return redirect()->route('products.index');
    }

    public function destroy(Product $product) {
        if ($product->photo) {
            Storage::delete($product->photo);
        }
        $product->delete();
        return redirect()->route('products.index');
    }
}
