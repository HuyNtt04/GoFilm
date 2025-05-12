<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id'=>1,
                'name' => 'demo',
                'email' => 'admin@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('12345678'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'=>2,
                'name' => 'King',
                'email' => 'king@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('12345678'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'=>3,
                'name' => 'Phuc',
                'email' => 'phuc@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('12345678'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'=>4,
                'name' => 'Huy',
                'email' => 'huy@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('12345678'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'=>5,
                'name' => 'Duy',
                'email' => 'duy@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('12345678'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}