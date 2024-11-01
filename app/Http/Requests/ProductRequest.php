<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:products,code',
            'price' => 'required|numeric',
            'previous_price' => 'nullable|numeric',
            'product_information' => 'nullable|string',
            'product_description' => 'nullable|string',
            'template_id' => 'required|exists:templates,id',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'second_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'third_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required|integer',
            'attribute_options' => 'nullable|array',
            'status' => 'nullable|in:published,unpublished',
            'countdowndate' => 'nullable',
            'section_title' => 'nullable|string|max:255',

            'header_title' => 'nullable|string|max:255',
            'video_url' => 'nullable|url',
            'video' => 'nullable|mimes:mp4,avi,wmv|max:10240', // Limit video to 10MB

            'faq_questions' => 'nullable|array',
            'faq_questions.*' => 'nullable',
            'faq_answers' => 'nullable|array',
            'faq_answers.*' => 'nullable|string',
            'faq_section_title' => 'nullable|string',

            'review_images' => 'nullable|array',
            'review_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'The product name is required.',
            'name.max' => 'The product name cannot exceed 255 characters.',

            'code.required' => 'The product code is required.',
            'code.max' => 'The product code cannot exceed 255 characters.',
            'code.unique' => 'The product code must be unique. A product with this code already exists.',

            'price.required' => 'The product price is required.',
            'price.numeric' => 'The product price must be a number.',

            'previous_price.numeric' => 'The previous price must be a number.',

            'template_id.required' => 'You must select a template for the product.',
            'template_id.exists' => 'The selected template is invalid.',

            'quantity.required' => 'The quantity is required.',
            'quantity.numeric' => 'The quantity must be a number.',





            'featured_image.required' => 'Featured image is required',
            'featured_image.image' => 'The featured image must be an image file (jpeg, png, jpg, gif, svg).',
            'featured_image.mimes' => 'The featured image must be a file of type: jpeg, png, jpg, gif, svg.',
            'featured_image.max' => 'The featured image size cannot exceed 2MB.',

            'first_image.image' => 'The first image must be an image file (jpeg, png, jpg, gif, svg).',
            'first_image.mimes' => 'The first image must be a file of type: jpeg, png, jpg, gif, svg.',
            'first_image.max' => 'The first image size cannot exceed 2MB.',

            'second_image.image' => 'The second image must be an image file (jpeg, png, jpg, gif, svg).',
            'second_image.mimes' => 'The second image must be a file of type: jpeg, png, jpg, gif, svg.',
            'second_image.max' => 'The second image size cannot exceed 2MB.',

            'third_image.image' => 'The third image must be an image file (jpeg, png, jpg, gif, svg).',
            'third_image.mimes' => 'The third image must be a file of type: jpeg, png, jpg, gif, svg.',
            'third_image.max' => 'The third image size cannot exceed 2MB.',

            'attribute_options.array' => 'The attribute options must be an array of valid attribute IDs.',
            'section_title.max' => 'The Section Title  cannot exceed 255 characters.'
        ];
    }



}
