<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        if (!is_null(session('orderId'))) {
            $order = Order::findOrFail(session('orderId'));
        }

        return view('basket', compact('order'));
    }

    public function basketPlace()
    {
        return view('order');
    }

    public function basketAdd($productId)
    {
        if (is_null(session('orderId'))) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find(session('orderId'));
        }

        $order->products()->attach($productId);

        return view('basket', compact('order'));
    }

}
