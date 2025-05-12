<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MoviesByCategoryController extends Controller
{
    public function index($idCategory)
    {
       
        $moviesByCategory = DB::table('movies') 
        ->select('movies.id', 'movies.title', 'movies.thumbnail', 'categories.name')
        ->join('category_movie', 'category_movie.id_movie', '=', 'movies.id')
        ->join('categories', 'categories.id', '=', 'category_movie.id_category')
        ->where('categories.id', $idCategory)
        ->paginate(12);

        $nameCategory = Category::query()->find($idCategory);
        $nameCategory = "Phim theo chủ đề: ".$nameCategory->name;
       
        return view('user.movies_by_condition', [
            'moviesByCondition' => $moviesByCategory,
            'nameSection' => $nameCategory
        ]);
    }
}