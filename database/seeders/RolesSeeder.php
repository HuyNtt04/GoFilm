<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id'=>1,'name' => 'admin','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
            ['id'=>2,'name' => 'employee','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
            ['id'=>3,'name' => 'user','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
