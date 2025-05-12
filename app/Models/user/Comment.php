<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id_user',
        'id_movie',
        'content'
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
