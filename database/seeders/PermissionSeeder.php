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
                "name" => "Create",
                "guard_name" => "web",
                "group" => "Product",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 2,
                "name" => "Read",
                "guard_name" => "web",
                "group" => "Product",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 3,
                "name" => "Edit",
                "guard_name" => "web",
                "group" => "Product",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 4,
                "name" => "Update",
                "guard_name" => "web",
                "group" => "Product",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

            array(
                "id" => 5,
                "name" => "Delete",
                "guard_name" => "web",
                "group" => "Product",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),

        );


        Permission::insert($permissions);
    }
}
