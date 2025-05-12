<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Episode;
use App\Models\Comment;
class Movie extends Model
{
    //
    protected $table='movies';
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'cast',
        'director',
        'release_year',
        'country',
        'views',
        'film_duration',
        'isDeleted',
        'image',
    ];
    protected $primaryKey = 'id';
    public function categories(){
        return $this->belongsToMany(Category::class,'category_movie','id_movie','id_category');
    }
    public function episodes()
    {
        return $this->hasMany(Episode::class, 'id_movie');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_movie');
    }
}