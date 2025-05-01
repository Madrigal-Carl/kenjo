<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('customer_id', Auth::id())->first();

        return response()->json([
            'success' => true,
            'products' => $cart ? $cart->products : [],
        ], 200);
    }

    public function store(Request $request)
    {
        $cart = Cart::firstOrCreate(
            ['customer_id' => Auth::id()],
            ['products' => []]
        );

        $productData = $request->input('product');
        $productId = $productData['id'];
        $quantityToAdd = $productData['quantity'] ?? 1;

        $products = $cart->products ?? [];

        $existingIndex = collect($products)->search(fn($p) => $p['id'] === $productId);

        if ($existingIndex !== false) {
            $products[$existingIndex]['quantity'] += $quantityToAdd;
        } else {
            $productData['quantity'] = $quantityToAdd;
            $products[] = $productData;
        }

        $cart->products = $products;
        $cart->save();

        flash()->title('Added Successfully')->success('Product added to cart!');
        return response()->json([
            'success' => true,
            'redirect' => route('home')
        ], 200);
        
    }

    public function remove($id)
    {
        $cart = Cart::where('customer_id', Auth::id())->first();

        $products = $cart->products;
        $updated = array_filter($products, fn($p) => $p['id'] != $id);

        $cart->products = array_values($updated);
        $cart->save();

        return response()->json(['message' => 'Product removed'], 200);
    }

    public function update(Request $request, $id)
    {
        $quantity = (int)$request->input('quantity');

        $cart = Cart::where('customer_id', Auth::id())->first();

        $updated = collect($cart->products)->map(function ($item) use ($id, $quantity) {
            if ($item['id'] == $id) $item['quantity'] = $quantity;
            return $item;
        })->values()->toArray();

        $cart->products = $updated;
        $cart->save();

        return response()->json(['message' => 'Quantity updated'], 200);
    }
}
