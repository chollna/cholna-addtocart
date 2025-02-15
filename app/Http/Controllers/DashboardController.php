<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCustomers = User::count();
        $totalOrders = Order::count();
        $totalEarnings = Order::where('status', 'completed')->sum('total_price'); // Assuming completed orders count as earnings

        return view('dashboard.index', compact('totalProducts', 'totalCustomers', 'totalOrders', 'totalEarnings'));
    }
}
