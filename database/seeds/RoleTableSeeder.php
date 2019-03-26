<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->name = 'admin';
        $role->description = 'Platform administrator and company supervisor';
        $role->save();

        $role = new Role;
        $role->name = 'employee';
        $role->description = 'Company employee';
        $role->save();
    }
}
