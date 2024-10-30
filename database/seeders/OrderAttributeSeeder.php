<?php

namespace Database\Seeders;

use App\Models\OrderAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $orderAttributes = [
            [
                'order_id' => 22,            
                'attribute_id' => 1,          
                'attribute_option_id' => 1,   
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 23,              
                'attribute_id' => 2,          
                'attribute_option_id' => 5,   
                'created_at' => now(),
                'updated_at' => now(),
            ],
          
        ];

        OrderAttribute::insert($orderAttributes);

    }
}
