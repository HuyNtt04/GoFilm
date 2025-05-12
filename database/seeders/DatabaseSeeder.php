<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            MovieSeeder::class,
            CategoryMovieSeeder::class,
            RolesSeeder::class,
            PermissionsTableSeeder::class,
            ModelHasRolesSeeder::class,
            UserSeeder::class,
            RoleHasPermissionsSeeder::class,
            EpisodeSeeder::class,
            NotificationSeeder::class,
            SubscriptionsPlansSeeder::class,
        ]);
    }
}