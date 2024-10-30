<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingsRequest extends FormRequest
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
            
            'site_title' => 'required|string|max:255',
            'home_page_title' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'store_email' => 'required|email|max:255',
            'facebook_iframe' => 'nullable|string',
            'shop_address' => 'nullable|string|max:255',
            'site_meta_keyword' => 'nullable|string|max:255',
            'site_meta_description' => 'nullable|string|max:255',
            'facebook_pixel' => 'nullable|string',
            'tag_manager' => 'nullable|string',
            'google_analytics' => 'nullable|string',
            'domain_verification' => 'nullable|string',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'primary_color' => 'required|string|max:7',
            'stock_alert' => 'required|integer',
            'delivery_charge_inside' => 'required|numeric',
            'delivery_charge_outside' => 'required|numeric',

        ];
    }

    public function messages()
    {
        return [
            'site_title.required' => 'The site title is required.',
            'store_email.email' => 'Please provide a valid email address.',
            // Add other custom messages as needed
        ];
    }

    
}
