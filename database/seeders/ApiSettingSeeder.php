<?php

namespace Database\Seeders;

use App\Models\ApiSetting;
use Illuminate\Database\Seeder;

class ApiSettingSeeder extends Seeder
{
    public function run(): void
    {
        ApiSetting::create([
            'pathau_client_id' => null,
            'pathau_client_secret' => null,
            'pathau_username' => null,
            'pathau_password' => null,
            'steadfast_client_id' => null,
            'steadfast_client_secret' => null,
            'redx_client_id' => null,
            'redx_client_secret' => null,
        ]);
    }
}