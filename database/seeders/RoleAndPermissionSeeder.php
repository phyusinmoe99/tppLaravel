<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name'=>'admin']);
        $user = Role::create(['name'=>'user']);

        $dashboard = Permission::create(['name'=>'dashboard']);
        $productList = Permission::create(['name'=>'productList']);
        $productCreate = Permission::create(['name'=>'productCreate']);
        $productEdit = Permission::create(['name'=>'productEdit']);
        $productDelete = Permission::create(['name'=>'productDelete']);
        $categoryList = Permission::create(['name'=>'categoryList']);
        $categoryCreate = Permission::create(['name'=>'categoryCreate']);
        $categoryDelete = Permission::create(['name'=>'categoryDelete']);
        $categoryEdit = Permission::create(['name'=>'categoryEdit']);
        $roleList = Permission::create(['name'=>'roleList']);
        $roleCreate = Permission::create(['name'=>'roleCreate']);
        $roleEdit = Permission::create(['name'=>'roleEdit']);
        $roleDelete = Permission::create(['name'=>'roleDelete']);

        $admin->givePermissionTo([
            $dashboard,
            $productList,
            $productCreate,
            $productEdit,
            $productDelete,
            $categoryList,
            $categoryCreate,
            $categoryDelete,
            $categoryEdit,
            $roleList,
            $roleCreate,
            $roleEdit,
            $roleDelete
        ]);
        $user->givePermissionTo([
            $dashboard,
            $productList,
            $categoryList,
            $roleList

        ]);

    }
}
