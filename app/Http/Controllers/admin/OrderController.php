<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use setasign\Fpdi\Fpdi;



class OrderController extends Controller
{
    public function order()
    {
        $orders = Order::latest()->with('order_attributes.products')->get();

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
        $query = Order::with('order_attributes.products');


        if ($customerName) {
            $query->where('name', 'like', "%{$customerName}%");
        }

        if ($phone) {
            $query->where('mobile', 'like', "%{$phone}%");
        }

        if ($productCode) {
            $query->whereHas('order_attributes.products', function ($q) use ($productCode) {
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

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    public function orderView($id)
    {
        $order = Order::with(['order_attributes.products', 'order_attributes.attributes', 'order_attributes.attributes_option'])->findOrFail($id);

        //return $order;

        return view('admin.order.view', compact('order'));
    }

    public function print($id)
    {
        $order = Order::with(['order_attributes.products', 'order_attributes.attributes', 'order_attributes.attributes_option'])->findOrFail($id);
        //$order = Order::with(['products', 'customers', 'order_attributes.attributes_option', 'order_attributes.attributes'])->findOrFail($id);

        return view('admin.order.print', compact('order'));
    }

    public function downloadPDF($id)
    {

        //$order = Order::with(['products', 'customers', 'order_attributes.attributes_option', 'order_attributes.attributes'])->findOrFail($id);

        $order = Order::with(['order_attributes.products', 'order_attributes.attributes', 'order_attributes.attributes_option'])->findOrFail($id);

        //return view('admin.order.pdf' ,compact('order'));

        $pdf = Pdf::loadView('admin.order.pdf', compact('order'));

        return $pdf->download('order_invoice_' . $order->invoice_no . '.pdf');
    }

    public function delete($id)
    {
        Order::find($id)->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }

    public function bulkDelete(Request $request)
    {



        $orderIds = $request->input('ids');

        // Delete the orders in bulk
        Order::whereIn('id', $orderIds)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Selected orders have been deleted successfully.'
        ]);
    }



    public function downloadBulkPdf(Request $request)
    {


        $ids = $request->input('ids', []);
        $ids = json_decode($ids);
        $invoiceUrls = [];

        foreach ($ids as $id) {
            //$order = Order::with(['products', 'customers', 'order_attributes.attributes_option', 'order_attributes.attributes'])->findOrFail($id);

            $order = Order::with(['order_attributes.products', 'order_attributes.attributes', 'order_attributes.attributes_option'])->findOrFail($id);

            // Generate the PDF for the order
            $pdf = PDF::loadView('admin.order.pdf', compact('order'));

            // Save the PDF to a temporary location
            $pdfPath = public_path('invoices/order_invoice_' . $order->invoice_no . '.pdf');
            $pdf->save($pdfPath);

            // Store the URL for the generated PDF
            $invoiceUrls[] = url('invoices/order_invoice_' . $order->invoice_no . '.pdf');
        }

        // Return a view with download links
        return view('admin.order.bulkpdf', compact('invoiceUrls'));
    }
}
