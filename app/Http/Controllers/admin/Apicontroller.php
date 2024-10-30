<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ApiSetting;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\SteadfastCourierService;
use SteadFast\SteadFastCourierLaravelPackage\Facades\SteadfastCourier;
use Illuminate\Support\Facades\Log;

class Apicontroller extends Controller
{

    /*protected $steadfast;

    public function __construct(SteadfastCourierService $steadfast)
    {
        $this->steadfast = $steadfast;
    }*/

    public function sendSteadfast($id)
    {
        $order = Order::with('order_attributes')->find($id);

        // Prepare the payload for Steadfast Courier API
        $orderPayload = [
            'invoice' => $order->invoice_no,
            'recipient_name' => $order->name,
            'recipient_phone' => $order->mobile,
            'recipient_address' => $order->address,
            'cod_amount' => $order->amount, // Change this if COD amount is different
            'note' => 'Handle with care', // Optional
        ];


        $response = SteadfastCourier::placeOrder($orderPayload);

       


        if ($response['status'] == '200') {

            // Save consignment details to the database
            $order->update([
                'consignment_id' => $response['consignment']['consignment_id'],
                'tracking_code' => $response['consignment']['tracking_code'],
                'couriar_status' => $response['consignment']['status'],
            ]);


            return redirect()->back()->with('success', 'Order has sent to the couriar');
        } else {
            // Extract specific error messages
            $errorMessages = [];
            foreach ($response['errors'] as $field => $messages) {
                foreach ($messages as $message) {
                    $errorMessages[] = $message;
                }
            }

            // Debugging line to check if errors are being captured
            Log::info('Error messages:', $errorMessages);

            return redirect()->back()->with('errorMessages', $errorMessages);
        }
    }

    public function apiStore(Request $request)
    {

        $validatedData  = $request->validate([
            'pathau_client_id' => 'nullable|string',
            'pathau_client_secret' => 'nullable|string',
            'pathau_username' => 'nullable|string',
            'pathau_password' => 'nullable|string',
            'steadfast_client_id' => 'nullable|string',
            'steadfast_client_secret' => 'nullable|string',
            'redx_client_id' => 'nullable|string',
            'redx_client_secret' => 'nullable|string',
        ]);


        // Check if the settings already exist
        $apiSetting = ApiSetting::first(); // Fetch the first record or null

        if ($apiSetting) {
            // Update the existing settings
            $apiSetting->update($validatedData);
        } else {
            // Create a new settings record
            ApiSetting::create($validatedData);
        }

        return redirect()->back()->with('success', 'Settings saved successfully');
    }



    public function couriarApi()
    {
        return view('admin.api.index');
    }
}
