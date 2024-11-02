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
        $permissions = array(
            array(
                "id" => 1,
                "name" => "Product Create",
                "guard_name" => "web",
                "group" => "Product",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 2,
                "name" => "Product View",
                "guard_name" => "web",
                "group" => "Product",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 3,
                "name" => "Product Edit",
                "guard_name" => "web",
                "group" => "Product",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 4,
                "name" => "Product Update",
                "guard_name" => "web",
                "group" => "Product",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 5,
                "name" => "Product Delete",
                "guard_name" => "web",
                "group" => "Product",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 6,
                "name" => "Dashboard View",
                "guard_name" => "web",
                "group" => "Dashboard",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 7,
                "name" => "Pos View",
                "guard_name" => "web",
                "group" => "Pos",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 8,
                "name" => "Template Create",
                "guard_name" => "web",
                "group" => "Template",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 9,
                "name" => "Template View",
                "guard_name" => "web",
                "group" => "Template",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 10,
                "name" => "Template Update",
                "guard_name" => "web",
                "group" => "Template",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 11,
                "name" => "Template Edit",
                "guard_name" => "web",
                "group" => "Template",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 12,
                "name" => "Template Delete",
                "guard_name" => "web",
                "group" => "Template",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),


            array(
                "id" => 13,
                "name" => "Attribute Create",
                "guard_name" => "web",
                "group" => "Attribute",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 14,
                "name" => "Attribute View",
                "guard_name" => "web",
                "group" => "Attribute",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 15,
                "name" => "Attribute Update",
                "guard_name" => "web",
                "group" => "Attribute",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 16,
                "name" => "Attribute Edit",
                "guard_name" => "web",
                "group" => "Attribute",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 17,
                "name" => "Attribute Delete",
                "guard_name" => "web",
                "group" => "Attribute",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 18,
                "name" => "Order Report",
                "guard_name" => "web",
                "group" => "Report",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 19,
                "name" => "Sale Report",
                "guard_name" => "web",
                "group" => "Report",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 20,
                "name" => "Stock",
                "guard_name" => "web",
                "group" => "Inventory",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 21,
                "name" => "Stock Out Products",
                "guard_name" => "web",
                "group" => "Inventory",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 22,
                "name" => "Upcoming Stock Out Products",
                "guard_name" => "web",
                "group" => "Inventory",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 23,
                "name" => "Customer View",
                "guard_name" => "web",
                "group" => "Customer",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 24,
                "name" => "Marketing View",
                "guard_name" => "web",
                "group" => "Marketing",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 25,
                "name" => "General Setting",
                "guard_name" => "web",
                "group" => "Setting",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 26,
                "name" => "Media",
                "guard_name" => "web",
                "group" => "Setting",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 27,
                "name" => "Administration",
                "guard_name" => "web",
                "group" => "Administration",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 28,
                "name" => "Order View",
                "guard_name" => "web",
                "group" => "Order",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),





        );


        Permission::insert($permissions);
    }
}
