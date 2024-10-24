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
            'code' => 'required|string|max:255|unique:products,code,' . $this->product->id,
            'price' => 'required|numeric',
            'previous_price' => 'nullable|numeric',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'first_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'second_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'third_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_information' => 'nullable|string',
            'product_description' => 'nullable|string',
            'template_id' => 'nullable|exists:templates,id',
            'quantity' => 'required|integer|min:1',

        ];
    }
}
