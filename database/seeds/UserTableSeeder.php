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
        $employee = Role::where('name', 'employee')->first();
        $admin = Role::where('name', 'admin')->first();

        $user = new User;
        $user->name = 'Employee';
        $user->email = 'employee@email.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('123456');
        $user->remember_token = Str::random(10);
        $user->role_id = 2;
        $user->save();

        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@email.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('123456');
        $user->remember_token = Str::random(10);
        $user->role_id = 1;
        $user->save();
    }
}
