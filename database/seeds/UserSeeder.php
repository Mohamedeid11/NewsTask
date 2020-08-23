<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();



        $adminRole = Role::where('name' , 'admin')->first();
        $dataEntryRole = Role::where('name' , 'dataEntry')->first();
        $userRole = Role::where('name' , 'user')->first();



        $admin = User::create([
            'name'  => 'Admin User',
            'email' => 'admin@news.com',
            'password' => Hash::make('123456789')
        ]);

        $dataEntry = User::create([
            'name'  => 'Data Entry',
            'email' => 'dataEntry@news.com',
            'password' => Hash::make('123456789')
        ]);

        $user = User::create([
            'name'  => 'User',
            'email' => 'user@news.com',
            'password' => Hash::make('123456789')
        ]);

        $admin->roles()->attach($adminRole);
        $dataEntry->roles()->attach($dataEntryRole);
        $user->roles()->attach($userRole);
    }
}
