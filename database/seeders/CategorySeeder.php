<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' =>'Marvel','created_at'=>now()],
            ['name' =>'Phù Thủy','created_at'=>now()],
            ['name' =>'Sitcom','created_at'=>now()],
            ['name' =>'Lồng Tiếng','created_at'=>now()],
            ['name' =>'Xuyên Không','created_at'=>now()],
            ['name' =>'Phim 9x','created_at'=>now()],
            ['name' => 'Khoa Học Viễn Tưởng','created_at'=>now()],
            ['name' => 'Hành Động','created_at'=>now()],
            ['name' => 'Tình Cảm','created_at'=>now()],
            ['name' => 'Gia Đình','created_at'=>now()],
            ['name' => 'Kinh Dị','created_at'=>now()],
            ['name' => 'Hài Hước','created_at'=>now()],
            ['name' => 'Cổ Trang','created_at'=>now()]
        ]);
    }
}