<?php

namespace Database\Seeders;

use App\Models\Order;
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
                'customer_id' => '2',
                'date' => '2024-10-14',
                'product_id' => '2',
                'quantity' => 3,
                'amount' => 150,
                'status' => 'Pending'
            ],
            [
                'invoice_no' => '1402618335',
                'customer_id' => '2',
                'date' => '2024-10-15',
                'product_id' => '1',
                'quantity' => 2,
                'amount' => 200,
                'status' => 'Processing'
            ],
            [
                'invoice_no' => '1402618336',
                'customer_id' => '2',
                'date' => '2024-10-16',
                'product_id' => '1',
                'quantity' => 5,
                'amount' => 750,
                'status' => 'Delivered'
            ],
            [
                'invoice_no' => '1402618337',
                'customer_id' => '2',
                'date' => '2024-10-17',
                'product_id' => '2',
                'quantity' => 1,
                'amount' => 300,
                'status' => 'Cancelled'
            ],
            [
                'invoice_no' => '1402618338',
                'customer_id' => '2',
                'date' => '2024-10-18',
                'product_id' => '1',
                'quantity' => 4,
                'amount' => 400,
                'status' => 'Pending'
            ],
            [
                'invoice_no' => '1402618339',
                'customer_id' => '2',
                'date' => '2024-10-19',
                'product_id' => '2',
                'quantity' => 3,
                'amount' => 500,
                'status' => 'Returned'
            ],
            [
                'invoice_no' => '1402618340',
                'customer_id' => '2',
                'date' => '2024-10-20',
                'product_id' => '1',
                'quantity' => 6,
                'amount' => 750,
                'status' => 'Pending Delivery'
            ],
            [
                'invoice_no' => '1402618341',
                'customer_id' => '2',
                'date' => '2024-10-21',
                'product_id' => '2',
                'quantity' => 2,
                'amount' => 250,
                'status' => 'Processing'
            ],
            [
                'invoice_no' => '1402618342',
                'customer_id' => '2',
                'date' => '2024-10-22',
                'product_id' => '1',
                'quantity' => 7,
                'amount' => 1000,
                'status' => 'Delivered'
            ],
            [
                'invoice_no' => '1402618343',
                'customer_id' => '2',
                'date' => '2024-10-23',
                'product_id' => '1',
                'quantity' => 8,
                'amount' => 1250,
                'status' => 'Cancelled'
            ]
        ];

        // Insert data into the orders table
        foreach ($orders as $orderData) {
            Order::create($orderData);
        }
    }
}
