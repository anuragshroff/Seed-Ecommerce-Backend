<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function report()
    {
        $allProduct = Product::all();
        $allOrder = Order::latest()->with('order_attributes.products')->get();

        return view('admin.report.order-report', compact('allOrder', 'allProduct'));
    }

    /*

    public function saleReport()
    {
        $allProduct = Product::all();


        $total_order_amounts_data = Order::whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->pluck('amount');

        $total_delivery_amounts_data = Order::whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->where('status', 'Delivered')
            ->pluck('amount');

        $total_cancel_amounts_data = Order::whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->where('status', 'Cancelled')
            ->pluck('amount');

        $total_return_amounts_data = Order::whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->where('status', 'Returned')
            ->pluck('amount');

        // Generate dates for the current month up to today
        $currentYear = Carbon::now()->year;
        $dates = [];
        
        for ($month = 1; $month <= 12; $month++) {
            // Create a Carbon instance for the first day of each month
            $date = Carbon::create($currentYear, $month, 1);
            // Format the date to 'Y-m' and add it to the dates array
            $dates[] = $date->format('Y-m');
        }
        
        




        return view('admin.report.sale-report', compact('total_order_amounts_data', 'total_delivery_amounts_data', 'total_cancel_amounts_data', 'total_return_amounts_data', 'allProduct', 'dates'));
    } 
     */


    public function saleReport()
    {

        $allProduct = Product::all();

        $currentYear = Carbon::now()->year;
        $months = [];
        $total_order_amounts_data = [];
        $total_delivery_amounts_data = [];
        $total_cancel_amounts_data = [];
        $total_return_amounts_data = [];

        for ($month = 1; $month <= 12; $month++) {
            // Create a Carbon instance for the first day of each month
            $date = Carbon::create($currentYear, $month, 1);

            // Store month in 'Y-m' format
            $months[] = $date->format('Y-m');

            // Get total amounts for the month
            $total_order_amounts_data[] = Order::whereMonth('date', $month)
                ->whereYear('date', $currentYear)
                ->sum('amount');

            $total_delivery_amounts_data[] = Order::whereMonth('date', $month)
                ->whereYear('date', $currentYear)
                ->where('status', 'Delivered')
                ->sum('amount');

            $total_cancel_amounts_data[] = Order::whereMonth('date', $month)
                ->whereYear('date', $currentYear)
                ->where('status', 'Cancelled')
                ->sum('amount');

            $total_return_amounts_data[] = Order::whereMonth('date', $month)
                ->whereYear('date', $currentYear)
                ->where('status', 'Returned')
                ->sum('amount');
        }

        return view('admin.report.sale-report', compact(
            'total_order_amounts_data',
            'total_delivery_amounts_data',
            'total_cancel_amounts_data',
            'total_return_amounts_data',
            'months',
            'allProduct'
        ));
    }








    public function reportFilter(Request $request)
    {

        $query = Order::with('order_attributes.products'); // Assuming 'products' is the relationship name

        // Apply filtering by dates if provided
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        // Handle predefined filters
        switch ($request->get('date_filter')) {
            case 'today':
                $query->whereDate('date', today());
                break;
            case 'yesterday':
                $query->whereDate('date', today()->subDay());
                break;
            case 'last_7_days':
                $query->whereDate('date', '>=', today()->subDays(7));
                break;
            case 'this_month':
                $query->whereMonth('date', date('m'))->whereYear('date', date('Y'));
                break;
            case 'last_month':
                $query->whereMonth('date', date('m', strtotime('last month')))
                    ->whereYear('date', date('Y', strtotime('last month')));
                break;
        }

        // Filter by product name
        if ($request->filled('product_filter')) {
            $productName = $request->get('product_filter');
            $query->whereHas('order_attributes.products', function ($q) use ($productName) {
                $q->where('name', $productName);
            });
        }

        // Get all orders
        $allOrder = $query->get();
        $allProduct = Product::all();

        // Pass product filter to the view
        $selectedProduct = $request->get('product_filter');
        $selectedDateFilter = $request->get('date_filter');


        return view('admin.report.filter-order-report', compact('allOrder', 'allProduct', 'selectedProduct', 'selectedDateFilter'));
    }


    public function saleFilter(Request $request)
    {
        $query = Order::query(); // Change to query builder

        // Apply filtering by dates if provided
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        // Handle predefined filters
        switch ($request->get('date_filter')) {
            case 'today':
                $query->whereDate('date', today());
                break;
            case 'yesterday':
                $query->whereDate('date', today()->subDay());
                break;
            case 'last_7_days':
                $query->whereDate('date', '>=', today()->subDays(7));
                break;
            case 'this_month':
                $query->whereMonth('date', date('m'))->whereYear('date', date('Y'));
                break;
            case 'last_month':
                $query->whereMonth('date', date('m', strtotime('last month')))
                    ->whereYear('date', date('Y', strtotime('last month')));
                break;
        }

        // Filter by product name
        if ($request->filled('product_filter')) {
            $productName = $request->get('product_filter');
            $query->whereHas('order_attributes.products', function ($q) use ($productName) {
                $q->where('name', $productName);
            });
        }

        // Get filtered orders
        $allOrder = $query->get();
        $allProduct = Product::all();

        // Calculate sums based on the order status
        $totalAmount = $allOrder->sum('amount');
        $deliveredAmount = $allOrder->where('status', 'Delivered')->sum('amount');
        $cancelledAmount = $allOrder->where('status', 'Cancelled')->sum('amount');
        $returnedAmount = $allOrder->where('status', 'Returned')->sum('amount');

        // Pass data to the view
        $selectedProduct = $request->get('product_filter');
        $selectedDateFilter = $request->get('date_filter');



        return view('admin.report.sale-filter-report', compact(
            'allOrder',
            'allProduct',
            'selectedProduct',
            'selectedDateFilter',
            'totalAmount',
            'deliveredAmount',
            'cancelledAmount',
            'returnedAmount'
        ));
    }
}
