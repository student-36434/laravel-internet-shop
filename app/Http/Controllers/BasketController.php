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

    public function basketAdd(int $productId)
    {
        if (is_null(session('orderId'))) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find(session('orderId'));
        }

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }


        return redirect('basket');
    }

    public function basketRemove(int $productId)
    {
        if (is_null(session('orderId'))) {
            return redirect('basket');
        }

        $order = Order::find(session('orderId'));

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        return redirect('basket');
    }

}
