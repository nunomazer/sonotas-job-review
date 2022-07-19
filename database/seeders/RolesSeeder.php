<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSystemAdmin = Role::create(['name' => Role::SYSADMIN]);
        $roleOwner = Role::create(['name' => Role::OWNER]);
        $roleManager = Role::create(['name' => Role::MANAGER]);
    }
}
