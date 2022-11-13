<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserClass extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*User::create(["name" => "admin", "email" => "admin@admin.com", "password" => Hash::make("admin"), "role" => "1"]);*/
        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin@admin.com",
            'password' => Hash::make('admin'),
            'role' => "1",
        ]);
    }
}
