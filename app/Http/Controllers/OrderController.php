<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request) {
        $order = Order::create([
            'customer_id' => Auth::id(),
            'products' => $request->products,
            'total_amount' => $request->total,
            'status' => 'pending',
        ]);

        Cart::where('customer_id', Auth::id())->delete();

        flash()->title('Thank you for your order!')->success('Your order has been placed successfully.');
        return response()->json([
            'message' => 'Order successfully placed.',
            'order_id' => $order->_id,
        ], 200);
        
    }
}
