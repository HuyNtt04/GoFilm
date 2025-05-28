<?php

namespace App\Models\user;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'sender_id',
        'comment_id',
        'received_id',
        'content',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
