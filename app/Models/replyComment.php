<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\User;
use App\Models\Comment;
class replyComment extends Model
{
    protected $table = 'replies'; // Tên bảng trong cơ sở dữ liệu
    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'received_id', 'id');
    }
    public function userReply()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }
}