<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

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
            'name' => 'SUPER ADMIN',
            'email' => 'jkpjulian@icreatedev.live',
            'password' => Hash::make('Gr34t@July'),
            'email_verified_at' => date("Y-m-d"),
            'admin' => true,
        ]);

        User::create([
            'name' => 'ADMIN',
            'email' => 'admin@icreate.live',
            'password' => Hash::make('Zxasqw12'),
            'email_verified_at' => date("Y-m-d"),
            'admin' => true,
        ]);
    }
}
