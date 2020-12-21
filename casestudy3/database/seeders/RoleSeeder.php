<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleConstant;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->id = RoleConstant::ROLE_ADMIN;
        $role->name = "ADMIN";
        $role->save();
        $role = new Role();
        $role->id = RoleConstant::ROLE_STAFF;
        $role->name = "STAFF";
        $role->save();
    }
}
