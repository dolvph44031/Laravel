<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;

class OrderController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to place an order.');
        }

        $cart = Cart::query()->where('user_id', $user->id)->first();

        if (!$cart) {
            return redirect()->route('cart.list')->with('error', 'Cart is empty.');
        }

        $cartItems = $cart->cartItems()
            ->join('product_variants', 'product_variants.id', '=', 'cart_items.product_variant_id')
            ->get([
                'cart_items.product_variant_id as product_variant_id',
                'product_variants.product_id',
                'product_variants.price as product_price',
                'product_variants.price_sale as product_price_sale',
                'cart_items.quantity as quantity'
            ]);

        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => $cartItems->sum(function($item) {
                return $item->quantity * ($item->product_price_sale ?: $item->product_price);
            })
        ]);

        foreach ($cartItems as $item) {
            $order->orderItems()->create([
                'product_variant_id' => $item->product_variant_id,
                'quantity' => $item->quantity,
                'price' => $item->product_price_sale ?: $item->product_price
            ]);
        }

        $cart->cartItems()->delete(); // Clear cart

        return redirect()->route('order.list')->with('success', 'Order placed successfully.');
    }

    public function list()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to view your orders.');
        }

        $orders = Order::where('user_id', $user->id)->get();

        return view('orders.list', compact('orders'));
    }
}

