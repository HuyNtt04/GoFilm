<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionsPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subscriptions_plans')->insert([
            [
                'name' => 'Gói miễn phí',
                'duration' => '7',
                'price' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gói 1 tháng',
                'duration' => '1',
                'price' => 49.000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gói 3 tháng',
                'duration' => '3',
                'price' => 119.000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gói 12 tháng',
                'duration' => '12',
                'price' => 399.000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}