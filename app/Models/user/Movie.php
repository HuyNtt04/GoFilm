<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
class Movie extends Model
{
    

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_movie');
    }

    
}