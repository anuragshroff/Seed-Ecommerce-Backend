<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission; // Use the correct model

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'Product Create', 'Product View', 'Product Edit', 'Product Update', 'Product Delete',
            'Dashboard View', 'Pos View',
            'Template Create', 'Template View', 'Template Update', 'Template Edit', 'Template Delete',
            'Attribute Create', 'Attribute View', 'Attribute Update', 'Attribute Edit', 'Attribute Delete',
            'Order Report', 'Sale Report',
            'Stock', 'Stock Out Products', 'Upcoming Stock Out Products',
            'Customer View', 'Marketing View',
            'General Setting', 'Media', 'Administration', 'Order View'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles
        $adminRole = \Spatie\Permission\Models\Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);
        $userRole = \Spatie\Permission\Models\Role::create(['name' => 'User', 'guard_name' => 'web']);
        
        // Assign all permissions to Super Admin
        $adminRole->givePermissionTo($permissions);
    }
}
