<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $table = 'urls';

    protected $fillable = [
        'id_movie',
        'url',
        'server_name',
        'resolution',
        'id_episode',
    ];

    // Quan hệ với Movie
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'id_movie');
    }
    public function episdode()
    {
        return $this->belongsTo(Episode::class,'id_episode');
    }
    
}