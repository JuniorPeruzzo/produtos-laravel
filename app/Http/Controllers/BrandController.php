<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller {
    public function index() {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function create() {
        return view('brands.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'photo' => 'nullable|image',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
        ]);

        $path = uniqid() . "." . $request->file("photo")->extension();
        $request->file("photo")->storeAs("public", $path);

        Brand::create([
            'name' => $request->name,
            'photo' =>  $path,
        ]);

        return redirect()->route('brands.index');
    }

    public function edit(Brand $brand) {
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand) {
        $request->validate([
            'name' => 'required',
            'photo' => 'nullable|image',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
        ]);

        if ($request->hasFile('photo')) {
            $path = uniqid() . "." . $request->file("photo")->extension();
            $request->file("photo")->storeAs("public", $path);

            $brand->photo = $path;
        }

        $brand->update($request->only(['name']));

        return redirect()->route('brands.index');
    }

    public function destroy(Brand $brand) {
        if ($brand->photo) {
            Storage::delete($brand->photo);
        }
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
