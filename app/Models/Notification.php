<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'content',
        'id_send_user',
        'id_receive_user',
        'status',
        'isDeleted',
    ];

    // Quan hệ với bảng users (người gửi)
    public function sender()
    {
        return $this->belongsTo(User::class, 'id_send_user');
    }

    // Quan hệ với bảng users (người nhận)
    public function receiver()
    {
        return $this->belongsTo(User::class, 'id_receive_user');
    }
}