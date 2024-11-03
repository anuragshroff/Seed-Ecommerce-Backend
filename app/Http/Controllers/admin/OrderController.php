<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\StreamReader;



class OrderController extends Controller
{

   

    public function order()
    {
        $orders = Order::latest()->with('order_attributes.products')->get();

        $pending_amount = Order::where('status', 'Pending')->sum('amount');
        $delivered_amount = Order::where('status', 'Delivered', 'Cancelled')->sum('amount');
        $cancelled_amount = Order::where('status', 'Cancelled')->sum('amount');
        $returned_amount = Order::where('status', 'Returned')->sum('amount');

        $confirmed_amount = Order::where('status', 'Confirmed')->sum('amount');
        $processing_amount = Order::where('status', 'Processing')->sum('amount');
        $pick_up_amount = Order::where('status', 'Pick Up')->sum('amount');
        $on_the_way_amount = Order::where('status', 'On The Way')->sum('amount');

        return view('admin.order.index', compact('orders', 'pending_amount', 'delivered_amount', 'cancelled_amount', 'returned_amount', 'confirmed_amount', 'processing_amount', 'pick_up_amount', 'on_the_way_amount'));
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


        $pending_amount = Order::where('status', 'Pending')->sum('amount');
        $delivered_amount = Order::where('status', 'Delivered', 'Cancelled')->sum('amount');
        $cancelled_amount = Order::where('status', 'Cancelled')->sum('amount');
        $returned_amount = Order::where('status', 'Returned')->sum('amount');

        $confirmed_amount = Order::where('status', 'Confirmed')->sum('amount');
        $processing_amount = Order::where('status', 'Processing')->sum('amount');
        $pick_up_amount = Order::where('status', 'Pick Up')->sum('amount');
        $on_the_way_amount = Order::where('status', 'On The Way')->sum('amount');

        return view('admin.order.index', compact('orders', 'pending_amount', 'delivered_amount', 'cancelled_amount', 'returned_amount', 'confirmed_amount', 'processing_amount', 'pick_up_amount', 'on_the_way_amount'));
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


    /*
    public function downloadBulkPdf(Request $request)
    {


        $ids = $request->input('ids', []);
        $ids = json_decode($ids);
        $invoiceUrls = [];

        foreach ($ids as $id) {
            //$order = Order::with(['products', 'customers', 'order_attributes.attributes_option', 'order_attributes.attributes'])->findOrFail($id);

            $order = Order::with(['order_attributes.products', 'order_attributes.attributes', 'order_attributes.attributes_option'])->findOrFail($id);

            dd($order->toJson(JSON_PRETTY_PRINT));


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
    } */


    public function downloadBulkPdf(Request $request)
    {
        $ids = $request->input('ids', []);
        $ids = json_decode($ids);
        $pdfPaths = [];

        foreach ($ids as $id) {
            $order = Order::with(['order_attributes.products', 'order_attributes.attributes', 'order_attributes.attributes_option'])->findOrFail($id);

            // Generate the PDF for the order
            $pdf = PDF::loadView('admin.order.pdf', compact('order'));

            // Save the PDF to a temporary location
            $pdfPath = public_path('invoices/order_invoice_' . $order->invoice_no . '.pdf');
            $pdf->save($pdfPath);

            // Add the path to the array
            $pdfPaths[] = $pdfPath;
        }

        // Create a new merged PDF using FPDI
        $mergedPdf = new Fpdi();

        // Iterate over the paths and add each PDF to the merged PDF
        foreach ($pdfPaths as $path) {
            $pageCount = $mergedPdf->setSourceFile($path);
            for ($i = 1; $i <= $pageCount; $i++) {
                $templateId = $mergedPdf->importPage($i);
                $size = $mergedPdf->getTemplateSize($templateId);
                $mergedPdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                $mergedPdf->useTemplate($templateId);
            }
        }

        // Set the output path for the merged PDF
        $mergedPdfPath = public_path('invoices/merged_order_invoice.pdf');
        $mergedPdf->Output($mergedPdfPath, 'F');

        // Return a download link for the merged PDF
        return response()->download($mergedPdfPath)->deleteFileAfterSend(true);
    }
}
