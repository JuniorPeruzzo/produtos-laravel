<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class StockController extends Controller {
    public function index() {
        $products = Product::all();
        return view('stock.index', compact('products'));
    }

    public function update(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'operation' => 'required|in:entrada,saida,balanco',
            'quantity' => 'required|integer|min:0'
        ]);

        $product = Product::find($request->product_id);

        switch ($request->operation) {
            case 'entrada':
                $product->stock += $request->quantity;
                break;
            case 'saida':
                $product->stock -= $request->quantity;
                break;
            case 'balanco':
                $product->stock = $request->quantity;
                break;
        }

        $product->save();

        return redirect()->route('stock.update')->with('success', 'Estoque atualizado com sucesso!');
    }
}