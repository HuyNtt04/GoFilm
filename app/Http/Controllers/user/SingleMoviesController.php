<?php
namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\Category;
use App\Models\user\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class SingleMoviesController extends Controller
{
    public function index()
    {
        $countries = Movie::query()
            ->select('country')
            ->distinct()
            ->get();

        $categories = Category::query()
            ->select('id', 'name')
            ->orderBy('updated_at', 'desc')
            ->get();

        $years = Movie::query()
            ->select('release_year')
            ->distinct()
            ->get();

        // Bắt đầu với truy vấn cơ bản
        $moviesQuery = DB::table('movies')
            ->select('movies.id', 'movies.title', 'movies.thumbnail')
            ->distinct(); // Thêm distinct() để tránh dữ liệu trùng lặp
        
        
        if(request()->has('categories')){
            $categories = request()->query('categories');
            $moviesQuery->whereExists(function ($query) use ($categories) {
                $query->select(DB::raw(1))
                    ->from('category_movie')
                    ->whereRaw('category_movie.id_movie = movies.id')
                    ->whereIn('category_movie.id_category', $categories);
            });
        }

        // Các điều kiện lọc khác
        if(request()->has('countries')){
            $moviesQuery->whereIn('movies.country', request()->query('countries'));
        }

        if(request()->has('years')){
            $moviesQuery->whereIn('movies.release_year', request()->query('years'));
        }

        
        if(request()->has('sort')){
            if(request()->query('sort') == 'desc'){
                $moviesQuery->orderBy('movies.updated_at', 'desc');
            }elseif(request()->query('sort') == 'asc'){
                $moviesQuery->orderBy('movies.updated_at', 'asc');
            }elseif(request()->query('sort') == 'az'){
                $moviesQuery->orderBy('movies.title', 'asc');
            }elseif(request()->query('sort') == 'za'){
                $moviesQuery->orderBy('movies.title', 'desc');
            }
        }

        // Phân trang kết quả
        $movies = $moviesQuery->paginate(12);
     
        return view('user.single_movies', [
            'movies'     => $movies,
            'countries'  => $countries,
            'categories' => $categories,
            'years'      => $years
        ]);
    }
}