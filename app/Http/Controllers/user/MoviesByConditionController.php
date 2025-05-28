<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MoviesByConditionController extends Controller
{
    public function index($condition){
        
        switch ($condition) {

            case 'search':
                $keywords = request()->query('keywords');
                $keywords = '%'.$keywords.'%';
                $moviesBySearch = Movie::query()
                ->orWhere('title', 'LIKE', $keywords)
                ->orWhere('director', 'LIKE', $keywords)
                ->orderBy('updated_at', 'desc')
                ->paginate(12);

                return view('user.movies_by_condition', [
                    'moviesByCondition' => $moviesBySearch,
                    'nameSection' => 'phim tìm kiếm' 
                ]);
                
                break;

            case 'New':
                $newMovies = Movie::query()
                            ->select()
                            ->orderBy('updated_at', 'desc')
                            ->paginate(12);

                return view('user.movies_by_condition', [
                    'moviesByCondition' => $newMovies,
                    'nameSection' => "phim mới cóong"
                ]); 
                break;
            
            case 'UK':
            case 'USA':
            case 'Canada':
                $country = $condition;
                $moviesByKorea = Movie::query()
                ->select('id', 'title', 'thumbnail', 'country')
                ->where('country','LIKE', $country)
                ->orderBy('updated_at', 'desc')
                ->paginate(2);
                return view('user.movies_by_condition', [
                    'moviesByCondition' => $moviesByKorea,
                    'nameSection' => "phim $country mới"
                ]); 
                break;

            case 'ViewInWeek':
                
                $twoWeekAgo  = Carbon::now()->subWeek(2);
                $twoMonthAgo = Carbon::now()->subMonth(3);

                function recentHotMovies($time)
                {
                    return $recentHotMovies = Movie::query()
                        ->select('id', 'title', 'thumbnail')
                        ->where('updated_at', '>=', $time)
                        ->orderBy('views', 'desc')
                        ->paginate(12);
                }

                if (recentHotMovies($twoWeekAgo)->isNotEmpty()) {
                    $recentHotMovie = recentHotMovies($twoWeekAgo);
                } else {
                    $recentHotMovie = recentHotMovies($twoMonthAgo);
                }

                return view('user.movies_by_condition', [
                    'moviesByCondition' => $recentHotMovie,
                    'nameSection' => 'phim sôi nổi nhất'
                ]);
                
                break;
            
            case 'FavoriteInWeek':

                $twoWeekAgo = Carbon::now()->subWeek(2);
                $twoMonthAgo = Carbon::now()->subMonth(3);

                function recentFavoriteMovies($time){
                    return $recentFavoriteMovies = Movie::query()
                    ->select('id', 'title', 'thumbnail')
                    ->where('updated_at', '>=', $time)
                    ->orderBy('favorite', 'desc')
                    ->paginate(12);
                }
        
                if(recentFavoriteMovies($twoWeekAgo) -> isNotEmpty()){
                    $recentFavoriteMovies = recentFavoriteMovies($twoWeekAgo);
                }else{
                    $recentFavoriteMovies = recentFavoriteMovies($twoMonthAgo);
                }

                return view('user.movies_by_condition', [
                    'moviesByCondition' => $recentFavoriteMovies,
                    'nameSection' => 'phim yêu thích nhất'
                ]);

                break;

            default:
                # code...
                break;
        }
    }
}

