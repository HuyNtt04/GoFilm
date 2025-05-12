<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            ['id'=>1,'name' => 'delete permission', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>2,'name' => 'create permission', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>3,'name' => 'update permission', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>4,'name' => 'view permission', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>5,'name' => 'create role', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>6,'name' => 'update role', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>7,'name' => 'delete role', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>8,'name' => 'view role', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>9,'name' => 'create movie', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>10,'name' => 'update movie', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>11,'name' => 'delete movie', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>12,'name' => 'view movie', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>13,'name' => 'create category', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>14,'name' => 'update category', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>15,'name' => 'delete category', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>16,'name' => 'view category', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>17,'name' => 'create user', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>18,'name' => 'update user', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>19,'name' => 'delete user', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>20,'name' => 'view user', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>21,'name' => 'softDelete movie', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>22,'name' => 'restore movie', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>23,'name' => 'delete episode', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>24,'name' => 'update episode', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>25,'name' => 'create episode', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>26,'name' => 'view episode', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>27,'name' => 'view notification', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>28,'name' => 'delete notification', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>29,'name' => 'restore notification', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>30,'name' => 'softDelete notification', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>31,'name' => 'update subscription', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>32,'name' => 'delete subscription', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>33,'name' => 'view subscription', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>34,'name' => 'delete plan', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>35,'name' => 'update plan', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>36,'name' => 'view plan', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>37,'name' => 'create plan', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>38,'name' => 'delete url', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>39,'name' => 'create url', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>40,'name' => 'view url', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>41,'name' => 'update url', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>42,'name' => 'delete comment', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
            ['id'=>43,'name' => 'delete reply', 'guard_name'=>'web','created_at' => now(), 'updated_at' => now()],
        ]);
    }
    
}