<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $ids = array_keys($cart);
        $products = Product::whereIn('id', $ids)->get()->keyBy('id');
        $total = 0;
        foreach ($cart as $id => $row) {
            if (isset($products[$id])) $total += $products[$id]->price * $row['quantity'];
        }
        return view('cart.index', compact('cart', 'products', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        abort_unless($product->is_active, 404);
        $data = $request->validate(['quantity' => 'nullable|integer|min:1|max:20']);
        $qty = $data['quantity'] ?? 1;
        $cart = session('cart', []);
        $newQty = ($cart[$product->id]['quantity'] ?? 0) + $qty;
        if ($newQty > $product->stock) return back()->withErrors(['cart' => 'Stok tidak mencukupi.']);
        $cart[$product->id] = ['quantity' => $newQty];
        session(['cart' => $cart]);
        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang.');
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate(['quantity' => 'required|integer|min:1|max:20']);
        if ($data['quantity'] > $product->stock) return back()->withErrors(['cart' => 'Jumlah melebihi stok tersedia.']);
        $cart = session('cart', []);
        if (isset($cart[$product->id])) $cart[$product->id]['quantity'] = $data['quantity'];
        session(['cart' => $cart]);
        return back()->with('success', 'Keranjang diperbarui.');
    }

    public function remove(Product $product)
    {
        $cart = session('cart', []);
        unset($cart[$product->id]);
        session(['cart' => $cart]);
        return back()->with('success', 'Produk dihapus dari keranjang.');
    }
}
