<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class SeriesMoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::query()
        ->select('id', 'title', 'thumbnail')
        ->where('is_series', 1) 
        ->orderBy('updated_at', 'desc')
        ->paginate(12);
        return view('user.series', ['movies' => $movies]);
    }


}