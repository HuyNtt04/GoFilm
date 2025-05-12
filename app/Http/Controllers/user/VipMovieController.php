<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VipMovieController extends Controller
{
    public function index(Request $request)
    {
        // Lấy danh sách lọc
        $countries = Movie::select('country')->distinct()->get();
        $categories = Category::select('id', 'name')->orderBy('updated_at', 'desc')->get();
        $years = Movie::select('release_year')->distinct()->get();

        // Bắt đầu truy vấn phim VIP
        $moviesQuery = Movie::query()
            ->where('ispremium', 1)
            ->with('categories') // nếu cần
            ->select('id', 'title', 'thumbnail', 'release_year', 'country', 'updated_at');

        // Lọc theo thể loại
        if ($request->has('categories')) {
            $categoryIds = $request->query('categories');
            $moviesQuery->whereHas('categories', function ($q) use ($categoryIds) {
                $q->whereIn('id', $categoryIds);
            });
        }

        // Lọc theo quốc gia
        if ($request->has('countries')) {
            $moviesQuery->whereIn('country', $request->query('countries'));
        }

        // Lọc theo năm
        if ($request->has('years')) {
            $moviesQuery->whereIn('release_year', $request->query('years'));
        }

        // Sắp xếp
        if ($request->has('sort')) {
            switch ($request->query('sort')) {
                case 'desc':
                    $moviesQuery->orderBy('updated_at', 'desc');
                    break;
                case 'asc':
                    $moviesQuery->orderBy('updated_at', 'asc');
                    break;
                case 'az':
                    $moviesQuery->orderBy('title', 'asc');
                    break;
                case 'za':
                    $moviesQuery->orderBy('title', 'desc');
                    break;
            }
        }

        // Phân trang
        $movies = $moviesQuery->paginate(12)->withQueryString();

        return view('user.vip_movies', compact('movies', 'categories', 'countries', 'years'));
    }
}