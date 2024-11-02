<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'code' => 'required|string|max:255',
            'price' => 'required|numeric',
            'previous_price' => 'nullable|numeric',
            'product_information' => 'nullable|string',
            'product_description' => 'nullable|string',
            'template_id' => 'required|exists:templates,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

            'slug' => 'nullable|string',

        ];
    }
}
