<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Movie;
use App\Models\replyComment;
class Comment extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
    public function movie(){
        return $this->belongsTo(Movie::class,'id_movie');
    }
    public function replyComments()
    {
        return $this->hasMany(replyComment::class, 'comment_id', 'id');
    }
}