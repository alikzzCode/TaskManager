<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'Admin'])->givePermissionTo(Permission::all());
        Role::create(['name' => 'Manager'])->givePermissionTo(['Edit Tasks','Delete Tasks','Assign Tasks','Update Tasks','Create Tasks']);;
        Role::create(['name' => 'User'])->givePermissionTo(['Create own Tasks','Delete own Tasks','Edit own Tasks']);;

    }
}
