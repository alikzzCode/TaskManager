<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'Edit Tasks']);
        Permission::create(['name' => 'Create Tasks']);
        Permission::create(['name' => 'Delete Tasks']);
        Permission::create(['name' => 'Assign Tasks']);
        Permission::create(['name' => 'Update Tasks']);
        Permission::create(['name' => 'Update Users']);
        Permission::create(['name' => 'Create Users']);
        Permission::create(['name' => 'Delete Users']);
        Permission::create(['name' => 'Create own Tasks']);
        Permission::create(['name' => 'Delete own Tasks']);
        Permission::create(['name' => 'Edit own Tasks']);
        Permission::create(['name' => 'Change Settings']);


    }
}
