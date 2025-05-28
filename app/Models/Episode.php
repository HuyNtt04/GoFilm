<?php
// app/Models/Episode.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = ['id_movie', 'episode'];
    
    
        public function movie()
        {
            return $this->belongsTo(Movie::class, 'id_movie');
        }
    
        public function urls()
        {
            return $this->hasMany(Url::class, 'id_episode');
        }
}