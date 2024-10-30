<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $today_sale_amount = Order::where('status', 'Delivered')
            ->whereDate('date', Carbon::today())
            ->sum('amount');



        $today_return_amount = Order::where('status', 'Returned')
            ->whereDate('date', Carbon::today())
            ->sum('amount');

        $today_cancel_amount = Order::where('status', 'Cancelled')
            ->whereDate('date', Carbon::today())
            ->sum('amount');

        $pending_amount = Order::where('status', 'Pending')->sum('amount');

        $total_delivered = Order::where('status', 'Delivered')->sum('amount');
        $total_cancel = Order::where('status', 'Cancelled')->sum('amount');

        $todays_all_order = Order::with('order_attributes.products')->whereDate('date', Carbon::today())->get();

        //chart function process  

        $currentYear = Carbon::now()->year;
        $months = [];
    
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



        return view('admin.index', compact('today_sale_amount', 'today_return_amount', 'today_cancel_amount', 'pending_amount', 'total_delivered', 'total_cancel', 'todays_all_order', 'total_delivery_amounts_data', 'total_cancel_amounts_data', 'total_return_amounts_data', 'months'));
    }
}
