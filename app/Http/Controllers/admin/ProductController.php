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
        foreach (['featured_image', 'first_image', 'second_image', 'third_image', 'video'] as $image) {
            if ($request->hasFile($image)) {
                $imagePaths[$image] = $this->uploadFile($request, $image);
            }
        }

        // Handle multiple review images
        $reviewImagePaths = [];
        if ($request->hasFile('review_images')) {
            foreach ($request->file('review_images') as $reviewImage) {
                $reviewImagePaths[] = $this->uploadFile($request, $reviewImage);
            }
        }

        $validatedData['featured_image'] = $imagePaths['featured_image'] ?? null;
        $validatedData['first_image'] = $imagePaths['first_image'] ?? null;
        $validatedData['second_image'] = $imagePaths['second_image'] ?? null;
        $validatedData['third_image'] = $imagePaths['third_image'] ?? null;
        $validatedData['review_images'] = json_encode($reviewImagePaths);
        $validatedData['video'] = $imagePaths['video'] ?? null;

        // Convert FAQ questions and answers to JSON if saving in the same table
        $validatedData['faq_questions'] = json_encode($request->faq_questions);
        $validatedData['faq_answers'] = json_encode($request->faq_answers);

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
        //$templates = Template::all();
        //$attributes = Attribute::with('attribute_options')->get();

        //$product = Product::with('product_attribute_options')->find($id);

        //return view('admin.product.edit', compact('templates', 'attributes', 'product'));

        $product = Product::find($id);
        $templates = Template::where("id", $product->template_id)->first();
        return view('admin.product.edit-product-template', compact('product', 'templates'));
    }


    /**
     * Update the specified resource in storage.
     */
    /*
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

    */

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $imagePaths = [];

        // Handle single images (featured_image, first_image, second_image, third_image)
        foreach (['featured_image', 'first_image', 'second_image', 'third_image'] as $image) {
            if ($request->hasFile($image)) {
                // Delete old image if it exists
                if ($product->{$image}) {
                    $this->deleteOldFile($product->{$image});
                }
                // Upload the new file
                $imagePaths[$image] = $this->uploadFile($request, $image);
            }
        }

        // Handle review images (merge new and existing ones)
        $existingReviewImages = json_decode($product->review_images, true) ?? [];
        $newReviewImages = [];

        if ($request->hasFile('review_images')) {
            foreach ($request->file('review_images') as $reviewImage) {
                $newReviewImages[] = $this->uploadFile($request, $reviewImage);
            }
        }

        // Merge existing and new review images
        $mergedReviewImages = array_merge($existingReviewImages, $newReviewImages);
        $validatedData['review_images'] = json_encode($mergedReviewImages);

        // Retain existing images if not replaced
        $validatedData['featured_image'] = $imagePaths['featured_image'] ?? $product->featured_image;
        $validatedData['first_image'] = $imagePaths['first_image'] ?? $product->first_image;
        $validatedData['second_image'] = $imagePaths['second_image'] ?? $product->second_image;
        $validatedData['third_image'] = $imagePaths['third_image'] ?? $product->third_image;

        // Convert FAQ questions and answers to JSON if updating
        $validatedData['faq_questions'] = json_encode($request->faq_questions);
        $validatedData['faq_answers'] = json_encode($request->faq_answers);

        // Update the product
        $product->update($validatedData);

        // Update attribute_options for the product
        if ($request->has('attribute_options')) {
            // Clear old options first
            $product->product_attribute_options()->delete();
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


    public function deleteReviewImage(Request $request, Product $product)
    {
        $imagePath = $request->input('image');

        // Decode current review images
        $reviewImages = json_decode($product->review_images, true) ?? [];

        // Check and remove the image
        if (($key = array_search($imagePath, $reviewImages)) !== false) {
            unset($reviewImages[$key]);
            // Optionally, delete the image file from storage
            if (file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
        }

        // Update the product's review_images column
        $product->update(['review_images' => json_encode(array_values($reviewImages))]);

        return response()->json(['success' => true, 'message' => 'Image removed successfully']);
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




    public function createProductTemplate(string $id)
    {
        $attributes = Attribute::with('attribute_options')->get();
        $templates = Template::find($id);

        return view("admin.product.create-product-template", compact('attributes', 'templates'));
    }
}
