<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'id_user',
        'id_movie'
    ];
}
