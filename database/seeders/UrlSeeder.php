<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrlSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('urls')->insert([
            [
                'id_episode' => 1,
                'url' => 'https://RoPhim.b-cdn.net/movie/Xem%20phim%20X%C3%AC%20Trum_%20Ng%C3%B4i%20L%C3%A0ng%20K%E1%BB%B3%20B%C3%AD%20-%20T%E1%BA%ADp%20full%20_%20Smurfs_%20The%20Lost%20Village%20(2017).mp4',
                'server_name' => 'Server 1',
                'resolution' => '1080p',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_episode' => 2,
                'url' => 'https://RoPhim.b-cdn.net/movie/Xem%20phim%20X%C3%AC%20Trum_%20Ng%C3%B4i%20L%C3%A0ng%20K%E1%BB%B3%20B%C3%AD%20-%20T%E1%BA%ADp%20full%20_%20Smurfs_%20The%20Lost%20Village%20(2017).mp4',
                'server_name' => 'Server 2',
                'resolution' => '720p',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_episode' => 3,
                'url' => 'https://RoPhim.b-cdn.net/movie/Xem%20phim%20X%C3%AC%20Trum_%20Ng%C3%B4i%20L%C3%A0ng%20K%E1%BB%B3%20B%C3%AD%20-%20T%E1%BA%ADp%20full%20_%20Smurfs_%20The%20Lost%20Village%20(2017).mp4',
                'server_name' => 'Server 3',
                'resolution' => '480p',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}