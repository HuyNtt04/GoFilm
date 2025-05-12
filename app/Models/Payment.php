<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = [
        'id_user',
        'id_noti',
        'amount',
        'date',
        'method',
        'status',
    ];

    // Quan hệ với bảng users
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Quan hệ với bảng notifications
    public function notification()
    {
        return $this->belongsTo(Notification::class, 'id_noti');
    }
}