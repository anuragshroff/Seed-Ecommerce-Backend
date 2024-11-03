<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderAttribute;
use Illuminate\Http\Request;

class ApiOrderController extends Controller
{
    //

    public function placeOrder(Request $request)
    {



        try {

            $validatedData = $request->validate([

                'address' => 'required|string|max:255',
                'coupon_code' => 'nullable|string|max:255',
                'name' => 'required|string|max:255',
                'payment_method' => 'required|string',
                'phone' => 'required|string',
                'product_id' => 'required|integer',
                'quantity' => 'required|integer',
                'shipping_area' => 'required|string',
                'shipping_cost' => 'required|numeric', // Ensure is numeric
                'total_price' => 'required|numeric' // Ensure is numeric
            ]);


            // return $validatedData;

            $order = new Order();
            $order->invoice_no = 'invoice-' . now()->timestamp;
            $order->date = now()->toDateString();
            $order->amount = $validatedData['total_price'];
            $order->status = 'Pending';
            $order->payment_status = 'Unpaid';
            $order->name = $validatedData['name'];
            $order->address = $validatedData['address'];
            $order->mobile = $validatedData['phone'];
            $order->area = $validatedData['shipping_cost'];

            // Save the order first
            $order->save();


            $order_attributes = new OrderAttribute();
            $order_attributes->order_id = $order->id;
            $order_attributes->product_id = $validatedData['product_id'];
            $order_attributes->quantity = $validatedData['quantity'];

            $order_attributes->save();

            return response()->json([
                'message' => 'New order created',

            ], 201);
        } catch (\Exception $error) {
            //dd($error->getMessage());

            return response()->json([
                'message' => 'Error ! order not completed',

            ], 500);
        }
    }
}
