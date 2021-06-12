<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();

        $adminRoles = Roles::where('name','admin')->first();
        $authorRoles = Roles::where('name','author')->first();
        $userRoles = Roles::where('name','user')->first();

        $admin = Admin::create([
        	'admin_name' => 'Nguyễn Tuấn Ngọc',
        	'admin_email' => 'admin@gmail.com',
        	'admin_phone' => '123456789',
        	'admin_password' => md5('123456')
        ]);

        $author = Admin::create([
        	'admin_name' => 'NTN author',
        	'admin_email' => 'author@gmail.com',
        	'admin_phone' => '123456789',
        	'admin_password' => md5('123456')
        ]);

        $user = Admin::create([
        	'admin_name' => 'NTN user',
        	'admin_email' => 'user@gmail.com',
        	'admin_phone' => '123456789',
        	'admin_password' => md5('123456')
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);

    }
}
