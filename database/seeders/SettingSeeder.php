<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([
            'site_title' => 'Seed Ecommerce',
            'home_page_title' => 'Welcome to Seed Ecommerce',
            'facebook_iframe' => null,
            'shop_address' => null,
            'facebook_pixel' => null,
            'tag_manager' => null,
            'google_analytics' => null,
            'domain_verification' => null,
            'primary_color' => '#007bff',
            'stock_alert' => '10',
            'delivery_charge_inside' => 60,
            'delivery_charge_outside' => 120,
            'whatsapp' => null,
            'store_email' => null,
            'site_meta_keyword' => null,
            'site_meta_description' => null,
            'facebook' => null,
            'instagram' => null,
            'youtube' => null,
            'tiktok' => null,
            'twitter' => null,
            'logo' => null,
            'favicon' => null,
        ]);
    }
}