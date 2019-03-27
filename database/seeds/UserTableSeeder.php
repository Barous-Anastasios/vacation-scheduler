<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->first_name = 'Employee';
        $user->last_name = 'Employeeeeee';
        $user->email = 'employee@email.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('123456');
        $user->remember_token = Str::random(10);
        $user->role_id = \App\Enums\UserType::Employee;
        $user->save();

        $user = new User;
        $user->first_name = 'Admin';
        $user->last_name = 'Adminnnnn';
        $user->email = 'admin@email.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('123456');
        $user->remember_token = Str::random(10);
        $user->role_id = \App\Enums\UserType::Administrator;
        $user->save();
    }
}
