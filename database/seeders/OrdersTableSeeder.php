<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $orders = [
            [
                'invoice_no' => '1402618334',
                'date' => '2024-10-14',
                'product_id' => '2',
                'quantity' => 3,
                'amount' => 150,
            ],
            [
                'invoice_no' => '1402618335',
                'date' => '2024-10-15',
                'product_id' => '2',
                'quantity' => 2,
                'amount' => 200,
            ],
            [
                'invoice_no' => '1402618336',
                'date' => '2024-10-16',
                'product_id' => '2',
                'quantity' => 5,
                'amount' => 750,
            ],
            // Add more sample data as needed
        ];

        // Insert data into the orders table
        foreach ($orders as $orderData) {
            Order::create($orderData);
        }


    }
}
