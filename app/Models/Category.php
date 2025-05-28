<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; 

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false; // Tắt tự động cập nhật timestamps
    protected $primaryKey = 'id';
    public function movies(){
        return $this->belongsToMany(Movie::class,'category_movie','id_category','id_movie');
    }
}