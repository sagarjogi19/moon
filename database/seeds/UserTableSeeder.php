<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => "Admin",
            'last_name' => "Admin",
            'email' => "admin@admin.com",
            'password' => bcrypt('admin123'),
            'is_admin' =>'1',
        ]);
        
        User::create([
            'first_name' => "Front",
            'last_name' => "User",
            'email' => "front@front.com",
            'password' => bcrypt('admin123'),
            'is_admin' =>'0',
        ]);
    }
}
