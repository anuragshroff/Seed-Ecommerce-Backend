<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function report()
    {
        return view('admin.report.order-report');
    }

    public function saleReport()
    {
        return view('admin.report.sale-report');
    }

   
}
