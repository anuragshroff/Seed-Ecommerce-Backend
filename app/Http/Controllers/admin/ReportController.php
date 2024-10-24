<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function report()
    {
        $allOrder = Order::latest()->with('products')->get();
        return view('admin.report.order-report', compact('allOrder'));
    }

    public function saleReport()
    {
        return view('admin.report.sale-report');
    }

    public function reportFilter(Request $request){

        $query = Order::with('products'); // Assuming 'products' is the relationship name

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

        // Get all orders
        $allOrder = $query->get();

        return view('admin.report.order-report', compact('allOrder'));


    }

   
}
