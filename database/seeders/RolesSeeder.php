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
        $roleSystemAdmin = Role::updateOrCreate(['name' => Role::SYSADMIN]);
        $roleOwner = Role::updateOrCreate(['name' => Role::OWNER]);
        $roleManager = Role::updateOrCreate(['name' => Role::MANAGER]);
        $roleAffiliate = Role::updateOrCreate(['name' => Role::AFFILIATE]);
    }
}
