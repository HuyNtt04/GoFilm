<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dữ liệu mẫu cho category_movie
        DB::table('category_movie')->insert([
            ['id_category' => 1, 'id_movie' => 1], // Chủ đề với id = 1 liên kết với bộ phim id = 1
            ['id_category' => 2, 'id_movie' => 3], // Chủ đề với id = 2 liên kết với bộ phim id = 3
            ['id_category' => 3, 'id_movie' => 1], // Chủ đề với id = 3 liên kết với bộ phim id = 1
            ['id_category' => 4, 'id_movie' => 4], // Chủ đề với id = 4 liên kết với bộ phim id = 4
            ['id_category' => 5, 'id_movie' => 5], // Chủ đề với id = 5 liên kết với bộ phim id = 5 
            ['id_category' => 1, 'id_movie' => 2], // Chủ đề với id = 1 liên kết với bộ phim id = 2
            ['id_category' => 2, 'id_movie' => 1], // Chủ đề với id = 2 liên kết với bộ phim id = 1
            ['id_category' => 3, 'id_movie' => 3], // Chủ đề với id = 3 liên kết với bộ phim id = 3
            ['id_category' => 4, 'id_movie' => 2], // Chủ đề với id = 4 liên kết với bộ phim id = 2
            ['id_category' => 5, 'id_movie' => 3], // Chủ đề với id = 5 liên kết với bộ phim id = 3
        ]);
    }
}