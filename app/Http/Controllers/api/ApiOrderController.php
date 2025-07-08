<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderAttribute;
use Illuminate\Http\Request;

class ApiOrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('user_id', auth()->id())->latest()->paginate(20);
        return response()->json($orders);
    }

    public function show($id)
    {
        $order = Order::where('user_id', auth()->id())->findOrFail($id);
        return response()->json($order);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|string',
            'address' => 'required|string',
            'area' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $order = Order::create([
            'invoice_no' => 'INV-' . time(),
            'date' => now()->toDateString(),
            'amount' => $request->amount,
            'name' => $request->name,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'area' => $request->area,
            'status' => 'Pending',
            'payment_status' => 'Unpaid',
        ]);

        return response()->json($order, 201);
    }

    public function cancel($id)
    {
        $order = Order::where('user_id', auth()->id())->findOrFail($id);
        
        if ($order->status !== 'Pending') {
            return response()->json(['message' => 'Cannot cancel this order'], 400);
        }

        $order->update(['status' => 'Cancelled']);
        return response()->json(['message' => 'Order cancelled successfully']);
    }

    public function shippingMethods()
    {
        return response()->json([
            ['id' => 1, 'name' => 'Standard Delivery', 'price' => 60],
            ['id' => 2, 'name' => 'Express Delivery', 'price' => 120],
        ]);
    }

    public function paymentMethods()
    {
        return response()->json([
            ['id' => 1, 'name' => 'Cash on Delivery'],
            ['id' => 2, 'name' => 'Online Payment'],
        ]);
    }

    public function placeOrder(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'shipping_area' => 'required|string',
            'shipping_cost' => 'required|numeric',
            'total_price' => 'required|numeric'
        ]);

        $order = Order::create([
            'invoice_no' => 'invoice-' . now()->timestamp,
            'date' => now()->toDateString(),
            'amount' => $validatedData['total_price'],
            'status' => 'Pending',
            'payment_status' => 'Unpaid',
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'mobile' => $validatedData['phone'],
            'area' => $validatedData['shipping_area'],
        ]);

        OrderAttribute::create([
            'order_id' => $order->id,
            'product_id' => $validatedData['product_id'],
            'quantity' => $validatedData['quantity'],
        ]);

        return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
    }
}
