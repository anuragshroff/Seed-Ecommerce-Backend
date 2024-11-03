<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\OrderAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$products = Product::where('quantity', '>', 0)->with('product_attribute_options.attributes', 'product_attribute_options.attributes_option')->get()->random(6);

        $products = Product::where('quantity', '>', 0)
            ->with('product_attribute_options.attributes', 'product_attribute_options.attributes_option')
            ->get()
            ->when(function ($collection) {
                return $collection->count() >= 6; // Only try to get 6 if 6 or more products are available
            }, function ($collection) {
                return $collection->random(6); // Get 6 random items
            }, function ($collection) {
                return $collection->random($collection->count()); // Get all items if less than 6 are available
            });


        return view('admin.pos.index', compact('products'));
    }

    public function search(Request $request)
    {

        try {

            $products = Product::where('quantity', '>', 0)
                ->where('name', 'LIKE', '%' . $request->query('term') . '%')
                ->orWhere('code', 'LIKE', '%' . $request->query('term') . '%')
                ->with(['product_attribute_options' => function ($query) {
                    $query->with([
                        'attributes:id,name',       // Eager load attributes with name field
                        'attributes_option:id,name' // Eager load attributes_option with name field
                    ]);
                }])
                ->get(['id', 'name', 'code', 'price', 'featured_image']); // Select fields from Product


            return response()->json($products);
        } catch (\Exception $error) {
            dd($error->getMessage());
        }
    }


    /*
    public function posOrder(Request $request)
    {
       

        $validatedData =  $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'payment_status' => 'required|string',
            'status' => 'required|string',
            'area' => 'required|string',
            'products' => 'required|json',
            'grandTotal' => 'required'
        ]);

        // Create a new Order and save other data
        $order = new Order();
        $order->name = $validatedData['name'];
        $order->address = $validatedData['address'];
        $order->mobile = $validatedData['mobile'];
        $order->payment_status = $validatedData['payment_status'];
        $order->status = $validatedData['status'];
        $order->area = $validatedData['area'];

        // Generate unique invoice number using name and current timestamp
        $order->invoice_no = 'invoice-' . now()->timestamp;

        
        $order->date = now()->toDateString();
        $order->amount = $validatedData['grandTotal'];

        $order->save();

        
        // Decode products JSON
        $products = json_decode($validatedData['products'], true);


        foreach ($products as $product) {
            $quantity = (int) $product['quantity']; // Convert to integer
        
            // Assuming the attributes array can contain multiple attributes
            $attributes = $product['attributes'];
        
            // Store the first attribute as attribute_id and second as attribute_option_id
            $orderAttribute = new OrderAttribute();
            $orderAttribute->order_id = $order->id; // Associate with the saved order
            $orderAttribute->product_id = $product['id']; // Product ID
            $orderAttribute->attribute_id = isset($attributes[0]) ? $attributes[0] : null; // First attribute
            $orderAttribute->attribute_option_id = isset($attributes[1]) ? $attributes[1] : null; // Second attribute (if available)
            $orderAttribute->quantity = $quantity; // Quantity
        
            $orderAttribute->save();

            //reduce product Quantity

            $product = Product::where('id', $product['id'])->first();
            $product->quantity = $product->quantity - $quantity;
            $product->save();


        }
        

      

        return response()->json(['success' => 'Order created successfully!']);
    }  */



    public function posOrder(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'payment_status' => 'required|string',
            'status' => 'required|string',
            'area' => 'required|string',
            'products' => 'required|json',
            'grandTotal' => 'required|numeric' // Ensure grandTotal is numeric
        ]);

        // Create a new Order and save other data
        $order = new Order();
        $order->name = $validatedData['name'];
        $order->address = $validatedData['address'];
        $order->mobile = $validatedData['mobile'];
        $order->payment_status = $validatedData['payment_status'];
        $order->status = $validatedData['status'];
        $order->area = $validatedData['area'];
        $order->invoice_no = 'invoice-' . now()->timestamp;
        $order->date = now()->toDateString();
        $order->amount = $validatedData['grandTotal'];

        // Save the order first
        $order->save();

        // Decode products JSON
        $products = json_decode($validatedData['products'], true);

        foreach ($products as $productData) {
            $quantity = (int) $productData['quantity']; // Convert to integer

            // Get the product by ID
            $product = Product::find($productData['id']);

            if ($product) {
                // Check if sufficient quantity is available
                if ($product->quantity >= $quantity) {
                    // Store the first attribute as attribute_id and second as attribute_option_id
                    $orderAttribute = new OrderAttribute();
                    $orderAttribute->order_id = $order->id; // Associate with the saved order
                    $orderAttribute->product_id = $product->id; // Product ID
                    $orderAttribute->attribute_id = isset($productData['attributes'][0]) ? $productData['attributes'][0] : null; // First attribute
                    $orderAttribute->attribute_option_id = isset($productData['attributes'][1]) ? $productData['attributes'][1] : null; // Second attribute (if available)
                    $orderAttribute->quantity = $quantity; // Quantity
                    $orderAttribute->save();

                    // Reduce product quantity
                    $product->quantity -= $quantity; // Decrease quantity
                    $product->save();
                } else {
                    // Handle insufficient stock (optional)
                    return response()->json(['error' => 'Insufficient stock for product ID ' . $product->id], 400);
                }
            } else {
                // Handle product not found (optional)
                return response()->json(['error' => 'Product not found for ID ' . $productData['id']], 404);
            }
        }

        return response()->json(['success' => 'Order created successfully!']);
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
