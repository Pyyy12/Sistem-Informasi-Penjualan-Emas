<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $orderCount = Order::count();
        $customerCount = User::where('is_admin', false)->count();
        $revenue = Order::where('payment_status', 'paid')->sum('total');
        $monthly = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->where('payment_status', 'paid')->whereYear('created_at', now()->year)
            ->groupBy('month')->pluck('total', 'month');
        $chart = [];
        for ($m = 1; $m <= 12; $m++) $chart[] = (float) ($monthly[$m] ?? 0);
        $recentOrders = Order::with('user')->latest()->take(8)->get();
        return view('admin.dashboard', compact('productCount', 'orderCount', 'customerCount', 'revenue', 'chart', 'recentOrders'));
    }
}
