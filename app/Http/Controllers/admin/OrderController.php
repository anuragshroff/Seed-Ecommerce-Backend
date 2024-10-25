<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        $orders = Order::latest()->with('products', 'customers')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function orderFilter(Request $request)
    {
        $customerName = $request->input('customer_name');
        $phone = $request->input('phone');
        $productCode = $request->input('product_code');
        $invoiceNo = $request->input('invoice_no');
        $date = $request->input('date');

        // Build your query here based on the inputs
        $query = Order::query();

        if ($customerName) {
            $query->whereHas('customers', function ($q) use ($customerName) {
                $q->where('name', 'like', "%{$customerName}%");
            });
        }

        if ($phone) {
            $query->whereHas('customers', function ($q) use ($phone) {
                $q->where('phone', 'like', "%{$phone}%");
            });
        }

        if ($productCode) {
            $query->whereHas('products', function ($q) use ($productCode) {
                $q->where('code', 'like', "%{$productCode}%");
            });
        }

        if ($invoiceNo) {
            $query->where('invoice_no', $invoiceNo);
        }

        if ($date) {
            $query->whereDate('created_at', $date);
        }

        $orders = $query->get();

        return view('admin.order.index', compact('orders'));
    }
}
