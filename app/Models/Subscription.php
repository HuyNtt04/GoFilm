<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = 'subscriptions';
    protected $fillable = [
        'id_plan',
        'id_user',
        'Start_date',
        'End_date',
        'Status',
        'Payment_status',
    ];

    // Quan hệ với bảng users
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Quan hệ với bảng subscriptions_plans
    public function plan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'id_plan');
    }
}