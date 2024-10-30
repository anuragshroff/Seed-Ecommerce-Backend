<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductAttributeOption;
use App\Models\Template;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    use FileUploadTrait;

   




    public function index()
    {
        $all_products = Product::latest()->get();

        return view('admin.product.index', compact('all_products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $templates = Template::all();
        $attributes = Attribute::with('attribute_options')->get();
        return view('admin.product.create', compact('templates', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();



        $imagePaths = [];
        foreach (['featured_image', 'first_image', 'second_image', 'third_image'] as $image) {
            if ($request->hasFile($image)) {

                $imagePaths[$image] = $this->uploadFile($request, $image);
            }
        }




        $validatedData['featured_image'] = $imagePaths['featured_image'] ?? null;
        $validatedData['first_image'] = $imagePaths['first_image'] ?? null;
        $validatedData['second_image'] = $imagePaths['second_image'] ?? null;
        $validatedData['third_image'] = $imagePaths['third_image'] ?? null;

        $product = Product::create($validatedData);






        // Store attribute_options data using Eloquent model
        if ($request->has('attribute_options')) {
            foreach ($request->attribute_options as $attribute_id => $option_ids) {
                foreach ($option_ids as $option_id) {
                    ProductAttributeOption::create([
                        'product_id' => $product->id,
                        'attribute_id' => $attribute_id,
                        'option_id' => $option_id,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Product created successfully!');
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
        $templates = Template::all();
        $attributes = Attribute::with('attribute_options')->get();

        $product = Product::with('product_attribute_options')->find($id);

        return view('admin.product.edit', compact('templates', 'attributes', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();

        $imagePaths = [];

        foreach (['featured_image', 'first_image', 'second_image', 'third_image'] as $image) {
            if ($request->hasFile($image)) {
                // Delete old image if exists
                if ($product->{$image}) {
                    $this->deleteOldFile($product->{$image}); // Assuming you want to handle old file deletion
                }
                // Use the trait method to upload the new file
                $imagePaths[$image] = $this->uploadFile($request, $image);
            }
        }

        $validatedData['featured_image'] = $imagePaths['featured_image'] ?? $product->featured_image;
        $validatedData['first_image'] = $imagePaths['first_image'] ?? $product->first_image;
        $validatedData['second_image'] = $imagePaths['second_image'] ?? $product->second_image;
        $validatedData['third_image'] = $imagePaths['third_image'] ?? $product->third_image;

        $product->update($validatedData);

        // Update attribute_options for the product
        if ($request->has('attribute_options')) {
            // Syncing the product's attribute options
            $product->product_attribute_options()->delete(); // Clear old options first
            foreach ($request->attribute_options as $attribute_id => $option_ids) {
                foreach ($option_ids as $option_id) {
                    ProductAttributeOption::create([
                        'product_id' => $product->id,
                        'attribute_id' => $attribute_id,
                        'option_id' => $option_id,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    protected function deleteOldFile($filePath)
    {
        $fullPath = public_path($filePath);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    public function toggleStatus(Request $request)
    {
        $product = Product::find($request->id);

        // Toggle the status
        if ($product->status === 'published') {
            $product->status = 'unpublished';
        } else {
            $product->status = 'published';
        }

        $product->save();

        return response()->json([
            'success' => true,
            'new_status' => $product->status
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->product_attribute_options()->delete();
        $product->delete();

        return response()->json(['success' => 'Product deleted successfully!']);
    }
}
