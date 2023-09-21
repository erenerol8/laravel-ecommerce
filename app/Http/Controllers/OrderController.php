<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('basket')
            ->whereHas('basket', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->orderByDesc('created_at')
            ->get();
        return view('order', compact('orders'));
    }
    public function detail($id)
    {
        $order = Order::with('basket.basket_product.product')
            ->whereHas('basket', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->where('order.id', $id)
            ->firstOrFail();
        return view('detail', compact('order'));
    }
}
