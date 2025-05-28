<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            [ 
                'title'=>'Avengers: Reassembled',
             'description'=>'A new team of heroes must rise after the fall of the original Avengers.',
             'thumbnail'=>'images/avengers.jpg',
             'cast'=>'Chris Evans, Robert Downey Jr.', 'director'=>'Joe Russo', 'release_year'=>2025, 'country'=>'USA',
             'views'=>1500000, 'film_duration'=>140, 
             'image'=>json_encode(['avengers_poster.jpg']), 
             'created_at'=>now(), 
             'updated_at'=>now()],
            [ 
                'title'=>'The Witch\'s Curse',
             'description'=>'A young woman discovers she is the last descendant of an ancient witch clan.', 
             'thumbnail'=>'images/witch_curse.jpg', 
             'cast'=>'Emma Watson, Timothée Chalamet', 'director'=>'Guillermo del Toro', 'release_year'=>2024, 'country'=>'UK', 
             'views'=>920000, 'film_duration'=>130, 
             'image'=>json_encode(['witch_poster.jpg']), 
             'created_at'=>now(), 
             'updated_at'=>now()],
            [ 
                'title'=>'Apartment 101', 'description'=>'A hilarious sitcom about the lives of quirky neighbors living in the same apartment.', 'thumbnail'=>'images/apartment_101.jpg', 'cast'=>'Jennifer Aniston, Steve Carell', 'director'=>'David Schwimmer', 'release_year'=>2023, 'country'=>'USA', 'views'=>800000, 'film_duration'=>25, 'image'=>json_encode(['sitcom_poster.jpg']), 'created_at'=>now(), 'updated_at'=>now()],
            [ 'title'=>'Dubbed Destiny', 'description'=>'An action-packed film featuring a hero who can only communicate through dubbed voices.', 'thumbnail'=>'images/dubbed_destiny.jpg', 'cast'=>'Ryan Reynolds, Margot Robbie', 'director'=>'Taika Waititi', 'release_year'=>2024, 'country'=>'Canada', 'views'=>640000, 'film_duration'=>110, 'image'=>json_encode(['dubbed_poster.jpg']), 'created_at'=>now(), 'updated_at'=>now()],
            [ 'title'=>'Timeless Escape', 'description'=>'A scientist accidentally travels to the past and must find a way to return.', 'thumbnail'=>'images/timeless_escape.jpg', 'cast'=>'Cillian Murphy, Zendaya', 'director'=>'Christopher Nolan', 'release_year'=>2025, 'country'=>'USA', 'views'=>1200000, 'film_duration'=>145, 'image'=>json_encode(['time_travel_poster.jpg']), 'created_at'=>now(), 'updated_at'=>now()],
            [ 'title'=>'Retro Vibes', 'description'=>'A nostalgic movie taking you back to the golden era of the 90s.', 'thumbnail'=>'images/retro_vibes.jpg', 'cast'=>'Leonardo DiCaprio, Julia Roberts', 'director'=>'Quentin Tarantino', 'release_year'=>2024, 'country'=>'USA', 'views'=>500000, 'film_duration'=>120, 'image'=>json_encode(['retro_poster.jpg']), 'created_at'=>now(), 'updated_at'=>now()],
            [ 'title'=>'Galactic Frontiers', 'description'=>'A group of astronauts embark on a mission beyond the Milky Way.', 'thumbnail'=>'images/galactic_frontiers.jpg', 'cast'=>'Tom Holland, Brie Larson', 'director'=>'Denis Villeneuve', 'release_year'=>2025, 'country'=>'USA', 'views'=>1300000, 'film_duration'=>150, 'image'=>json_encode(['sci_fi_poster.jpg']), 'created_at'=>now(), 'updated_at'=>now()],
            [ 'title'=>'Bullet Chase', 'description'=>'A top assassin must race against time to complete his final mission.', 'thumbnail'=>'images/bullet_chase.jpg', 'cast'=>'Keanu Reeves, Charlize Theron', 'director'=>'Chad Stahelski', 'release_year'=>2025, 'country'=>'USA', 'views'=>1400000, 'film_duration'=>130, 'image'=>json_encode(['action_poster.jpg']), 'created_at'=>now(), 'updated_at'=>now()],
            [ 'title'=>'Love in Paris', 'description'=>'A heartfelt romance unfolds between two strangers in the City of Love.', 'thumbnail'=>'images/love_in_paris.jpg', 'cast'=>'Timothée Chalamet, Lily Collins', 'director'=>'Greta Gerwig', 'release_year'=>2024, 'country'=>'France', 'views'=>850000, 'film_duration'=>125, 'image'=>json_encode(['romance_poster.jpg']), 'created_at'=>now(), 'updated_at'=>now()],
            [ 'title'=>'Family Ties', 'description'=>'A warm, comedic drama about three generations living under one roof.', 'thumbnail'=>'images/family_ties.jpg', 'cast'=>'Meryl Streep, Tom Hanks', 'director'=>'Ron Howard', 'release_year'=>2023, 'country'=>'USA', 'views'=>780000, 'film_duration'=>110, 'image'=>json_encode(['family_poster.jpg']), 'created_at'=>now(), 'updated_at'=>now()],
            [ 'title'=>'Haunted Shadows', 'description'=>'A haunted mansion holds dark secrets that a group of friends must uncover.', 'thumbnail'=>'images/haunted_shadows.jpg', 'cast'=>'Anya Taylor-Joy, Bill Skarsgård', 'director'=>'James Wan', 'release_year'=>2024, 'country'=>'Canada', 'views'=>1120000, 'film_duration'=>105, 'image'=>json_encode(['horror_poster.jpg']), 'created_at'=>now(), 'updated_at'=>now()],
            [ 'title'=>'The Comedy Club', 'description'=>'A struggling stand-up comedian finds unexpected success.', 'thumbnail'=>'images/the_comedy_club.jpg', 'cast'=>'Pete Davidson, Awkwafina', 'director'=>'Judd Apatow', 'release_year'=>2024, 'country'=>'USA', 'views'=>690000, 'film_duration'=>95, 'image'=>json_encode(['comedy_poster.jpg']), 'created_at'=>now(), 'updated_at'=>now()],
            [ 'title'=>'Dynasty of Kings', 'description'=>'A historical epic about power struggles in an ancient empire.', 'thumbnail'=>'images/dynasty_of_kings.jpg', 'cast'=>'Henry Cavill, Natalie Portman', 'director'=>'Ridley Scott', 'release_year'=>2025, 'country'=>'UK', 'views'=>920000, 'film_duration'=>155, 'image'=>json_encode(['historical_poster.jpg']), 'created_at'=>now(), 'updated_at'=>now()],
            [ 'title'=>'The New Avengers', 'description'=>'A fresh lineup of heroes takes the stage to defend Earth.', 'thumbnail'=>'images/the_new_avengers.jpg', 'cast'=>'Florence Pugh, Simu Liu', 'director'=>'Ryan Coogler', 'release_year'=>2026, 'country'=>'USA', 'views'=>1800000, 'film_duration'=>150, 'image'=>json_encode(['marvel_poster.jpg']), 'created_at'=>now(), 'updated_at'=>now()],
            [ 'title'=>'Echoes of the Past', 'description'=>'A young woman wakes up in medieval Japan with no memory.', 'thumbnail'=>'images/echoes_past.jpg', 'cast'=>'Rina Sawayama, Hiroyuki Sanada', 'director'=>'Takashi Miike', 'release_year'=>2025, 'country'=>'Japan', 'views'=>970000, 'film_duration'=>140, 'image'=>json_encode(['isekai_poster.jpg']), 'created_at'=>now(), 'updated_at'=>now()],
            [ 'title'=>'Shadow Ops', 'description'=>'An elite soldier uncovers a conspiracy that threatens the world.', 'thumbnail'=>'images/shadow_ops.jpg', 'cast'=>'Idris Elba, Gal Gadot', 'director'=>'Michael Bay', 'release_year'=>2026, 'country'=>'USA', 'views'=>1600000, 'film_duration'=>135, 'image'=>json_encode(['thriller_poster.jpg']), 'created_at'=>now(), 'updated_at'=>now()]
        ]);
    }
}