<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong.');
        }
        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');
        $subtotal = 0;
        foreach ($cart as $id => $row) {
            if (isset($products[$id])) $subtotal += $products[$id]->price * $row['quantity'];
        }
        return view('orders.checkout', compact('cart', 'products', 'subtotal'));
    }

    public function place(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:120',
            'phone' => 'required|string|max:30',
            'shipping_address' => 'required|string|max:2000',
            'payment_method' => 'required|in:transfer_bank,cod',
            'notes' => 'nullable|string|max:1000',
        ]);
        $cart = session('cart', []);
        if (!$cart) return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong.');

        $order = DB::transaction(function () use ($request, $data, $cart) {
            $subtotal = 0;
            $lines = [];
            foreach ($cart as $id => $row) {
                $product = Product::whereKey($id)->lockForUpdate()->firstOrFail();
                $qty = (int) $row['quantity'];
                if (!$product->is_active || $product->stock < $qty) {
                    throw new \RuntimeException('Stok produk '.$product->name.' tidak mencukupi. Periksa keranjang Anda.');
                }
                $line = $product->price * $qty;
                $subtotal += $line;
                $lines[] = [$product, $qty, $line];
            }
            $order = Order::create([
                'user_id' => $request->user()->id,
                'order_number' => 'AG-'.now()->format('Ymd').'-'.Str::upper(Str::random(6)),
                'customer_name' => $data['customer_name'],
                'phone' => $data['phone'],
                'shipping_address' => $data['shipping_address'],
                'subtotal' => $subtotal, 'shipping_cost' => 0, 'total' => $subtotal,
                'payment_method' => $data['payment_method'], 'notes' => $data['notes'] ?? null,
            ]);
            foreach ($lines as [$product, $qty, $line]) {
                $order->items()->create([
                    'product_id' => $product->id, 'product_name' => $product->name,
                    'weight_gram' => $product->weight_gram, 'unit_price' => $product->price,
                    'quantity' => $qty, 'line_total' => $line,
                ]);
                $product->decrement('stock', $qty);
            }
            return $order;
        });

        session()->forget('cart');
        return redirect()->route('orders.index')->with('success', 'Pesanan '.$order->order_number.' berhasil dibuat. Status pembayaran masih menunggu konfirmasi.');
    }

    public function index()
    {
        $orders = Order::with('items')->where('user_id', auth()->id())->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }
}
