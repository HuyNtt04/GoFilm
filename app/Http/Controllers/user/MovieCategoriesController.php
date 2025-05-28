<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\Category;
use Illuminate\Http\Request;

class MovieCategoriesController extends Controller
{
    public function index()
    {

        $categories = Category::query()
        ->select('id','name')
        ->orderBy('created_at', 'desc')
        ->limit(12)
        ->get();

        $classColor = [
            'from-blue-500 to-purple-400',
            'from-pink-500 to-purple-400',
            'from-green-400 to-pink-300',
            'from-violet-400 to-pink-400',
            'from-orange-400 to-pink-400',
            'from-yellow-300 to-pink-400',
            'from-yellow-300 to-pink-400',
            'from-orange-400 to-pink-400',
            'from-violet-400 to-pink-400',
            'from-green-400 to-pink-300',
            'from-pink-500 to-purple-400',
            'from-blue-500 to-purple-400',
        ];

        for($i = 0; $i<count($categories); $i++){
            $categories[$i]['classColor'] = $classColor[$i];
        }

        return view('user.movie_categories', compact('categories'));
    }
}