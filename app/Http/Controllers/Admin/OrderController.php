<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'items')->latest()->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => ['required', Rule::in(['pending','confirmed','processing','shipped','completed','cancelled'])],
            'payment_status' => ['required', Rule::in(['pending','paid','failed','refunded'])],
        ]);
        $order->update($data);
        return back()->with('success', 'Status pesanan diperbarui.');
    }
}
