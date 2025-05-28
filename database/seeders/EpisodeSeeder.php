<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Episode;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Episode::create([
            'id_movie' => 1,
            'episode' => 1,
        ]);

        Episode::create([
            'id_movie' => 1,
            'episode' => 2,
        ]);

        Episode::create([
            'id_movie' => 1,
            'episode' => 3,
        ]);
    }
}