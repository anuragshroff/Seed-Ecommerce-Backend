<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiCartController extends Controller
{
    public function index(Request $request)
    {
        $cart = session()->get('cart', []);
        return response()->json(['cart' => $cart, 'total' => $this->getCartTotal($cart)]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
            'name' => 'required|string',
        ]);

        $cart = session()->get('cart', []);
        $productId = $request->product_id;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $request->quantity;
        } else {
            $cart[$productId] = [
                'product_id' => $productId,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ];
        }

        session()->put('cart', $cart);
        return response()->json(['message' => 'Product added to cart', 'cart' => $cart]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return response()->json(['message' => 'Cart updated', 'cart' => $cart]);
        }

        return response()->json(['message' => 'Product not found in cart'], 404);
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return response()->json(['message' => 'Product removed from cart']);
        }

        return response()->json(['message' => 'Product not found in cart'], 404);
    }

    public function clear()
    {
        session()->forget('cart');
        return response()->json(['message' => 'Cart cleared']);
    }

    private function getCartTotal($cart)
    {
        return array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
    }
}