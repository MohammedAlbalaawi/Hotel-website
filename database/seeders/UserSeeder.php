<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mohd Albalaawi',
            'email' => 'm.cip@live.com',
            'password' => Hash::make('password'),
            'phone_number' => '0599555559',
        ]);

        DB::table('users')->insert([
            'name' => 'System Admin',
            'email' => 'admin@live.com',
            'password' => Hash::make('password'),
            'phone_number' => '0599777777',
        ]);
    }
}
