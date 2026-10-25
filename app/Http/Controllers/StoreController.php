<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('is_active', true)
            ->when($request->filled('q'), fn($q) => $q->where('name', 'like', '%'.$request->q.'%'))
            ->when($request->filled('category'), fn($q) => $q->where('category', $request->category))
            ->latest()->paginate(9)->withQueryString();

        return view('store.index', compact('products'));
    }

    public function show(Product $product)
    {
        abort_unless($product->is_active, 404);
        $related = Product::where('is_active', true)->where('id', '!=', $product->id)->take(4)->get();
        return view('store.show', compact('product', 'related'));
    }
}
