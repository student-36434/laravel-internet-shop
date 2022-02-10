<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
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
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect('index');
        }

        $order =  Order::find($orderId);

        return view('order', compact('order'));
    }

    public function basketConfirm(Request $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect('index');
        }

        $order =  Order::find($orderId);

        $success = $order->saveOrder($request->name, $request->phone);

        if ($success) {
            session()->flash('success','Your order has been processed!');
        } else {
            session()->flash('warning','Error!');
        }

        return redirect()->route('index');
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

        $product = Product::find($productId);

        session()->flash('success', 'Added item ' . $product->name);

        return redirect('basket');
    }

    public function basketRemove(int $productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect('basket');
        }

        $order =  Order::find($orderId);
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        $product = Product::find($productId);

        session()->flash('warning', 'Removed product ' . $product->name);

        return redirect('basket');
    }

    /**
     * @param string $redirectRoute
     * @return mixed
     */
    private function getOrderForSession(string $redirectRoute): mixed
    {
        if (is_null(session('orderId'))) {
            return redirect('redirectRoute');
        }
        return Order::find(session('orderId'));
    }
}
