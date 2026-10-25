<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('admin.products.index', compact('products'));
    }

    public function create() { return view('admin.products.form', ['product' => new Product()]); }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($data['name']).'-'.Str::lower(Str::random(5));
        Product::create($data);
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product) { return view('admin.products.form', compact('product')); }

    public function update(Request $request, Product $product)
    {
        $data = $this->validated($request);
        $data['slug'] = $product->slug;
        $product->update($data);
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $product->update(['is_active' => false]);
        return back()->with('success', 'Produk dinonaktifkan dan tidak dihapus dari histori transaksi.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:190',
            'category' => ['required', Rule::in(['batangan', 'perhiasan', 'koin'])],
            'description' => 'nullable|string|max:5000',
            'weight_gram' => 'required|numeric|min:0.01|max:100000',
            'purity' => 'required|string|max:30',
            'price' => 'required|numeric|min:1|max:999999999999',
            'stock' => 'required|integer|min:0|max:1000000',
            'image_url' => 'nullable|url|max:2048',
            'is_active' => 'nullable|boolean',
        ]) + ['is_active' => $request->boolean('is_active')];
    }
}
