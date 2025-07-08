<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'image' => 'john.jpg',
                'phone' => '1234567890',
                'city' => 'New York',
                'address' => '123 Main Street, New York, NY',
                'role' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'image' => 'jane.jpg',
                'phone' => '0987654321',
                'city' => 'Los Angeles',
                'address' => '456 Maple Avenue, Los Angeles, CA',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'image' => 'alice.jpg',
                'phone' => '1122334455',
                'city' => 'Chicago',
                'address' => '789 Oak Street, Chicago, IL',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Robert Brown',
                'email' => 'robert@example.com',
                'image' => 'robert.jpg',
                'phone' => '5566778899',
                'city' => 'Houston',
                'address' => '101 Pine Street, Houston, TX',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily@example.com',
                'image' => 'emily.jpg',
                'phone' => '6677889900',
                'city' => 'Phoenix',
                'address' => '202 Birch Avenue, Phoenix, AZ',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chris Wilson',
                'email' => 'chris@example.com',
                'image' => 'chris.jpg',
                'phone' => '2233445566',
                'city' => 'Philadelphia',
                'address' => '303 Cedar Street, Philadelphia, PA',
                'role' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sarah Miller',
                'email' => 'sarah@example.com',
                'image' => 'sarah.jpg',
                'phone' => '7788990011',
                'city' => 'San Antonio',
                'address' => '404 Elm Avenue, San Antonio, TX',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Taylor',
                'email' => 'michael@example.com',
                'image' => 'michael.jpg',
                'phone' => '3344556677',
                'city' => 'San Diego',
                'address' => '505 Pine Avenue, San Diego, CA',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laura Anderson',
                'email' => 'laura@example.com',
                'image' => 'laura.jpg',
                'phone' => '8899001122',
                'city' => 'Dallas',
                'address' => '606 Walnut Street, Dallas, TX',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'David Lee',
                'email' => 'david@example.com',
                'image' => 'david.jpg',
                'phone' => '4455667788',
                'city' => 'San Jose',
                'address' => '707 Cedar Avenue, San Jose, CA',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
            if ($userData['role'] === 'admin') {
                $user->assignRole('Super Admin');
            } else {
                $user->assignRole('User');
            }
        }

    }
}
