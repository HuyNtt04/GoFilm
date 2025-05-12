<?php
namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $twoLastestMovies = Movie::query()
        ->select('id', 'title', 'thumbnail', 'image', 'description', 'is_series')
        ->orderBy('updated_at', 'desc')
        ->limit(2)
        ->get(); 

//-------------------

        $hotCategories = Category::query()
        ->select('id', 'name')
        ->where('is_hot', true)
        ->orderBy('created_at', 'desc')
        ->limit(6)
        ->get();

        $arrayClassColor = [
            'from-pink-600 to-rose-400',
            'from-purple-600 to-pink-400',
            'from-emerald-400 to-rose-300',
            'from-violet-400 to-pink-400',
            'from-yellow-600 to-rose-300',
            'from-yellow-300 to-pink-400',
        ];

        for($i = 0; $i < count($hotCategories); $i++){
            $hotCategories[$i]['classColor'] = $arrayClassColor[$i];
        };

//----------------

        $top5HotCategories = Category::query()
            ->select('id', 'name')
            ->where('is_hot', true)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $arrayClassColor = [
            'bg-pink-800',
            'bg-blue-500',
            'bg-purple-500',
            'bg-lime-500',
            'bg-yellow-700',

        ];

        for ($i = 0; $i < count($top5HotCategories); $i++) {
            $top5HotCategories[$i]['classColor'] = $arrayClassColor[$i];
        }

//----------------

        $top9HotCategories = Category::query()
            ->select('id', 'name')
            ->where('is_hot', true)
            ->orderBy('created_at', 'desc')
            ->limit(9)
            ->get();

        $arrayClassColor = [
            'bg-pink-800',
            'bg-blue-500',
            'bg-purple-500',
            'bg-lime-500',
            'bg-yellow-700',
            'bg-red-600',
            'bg-green-500',
            'bg-orange-400',
            'bg-teal-600',
        ];

        for ($i = 0; $i < count($top9HotCategories); $i++) {
            $top9HotCategories[$i]['classColor'] = $arrayClassColor[$i];
        }

//----------------------

        $koreaMovies = Movie::query()
            ->select('id', 'title', 'thumbnail')
            ->where('country', 'USA')
            ->orderBy('updated_at', 'DESC')
            ->limit(5)
            ->get();

        $chinaMovies = Movie::query()
            ->select('id', 'title', 'thumbnail')
            ->where('country', 'UK')
            ->limit(5)
            ->get();

        $animeMovies = Movie::query()
            ->select('id', 'title', 'thumbnail')
            ->where('country', 'Canada')
            ->limit(5)
            ->get();
//-------------------
        $twoWeekAgo = Carbon::now()->subWeek(2);
        $twoMonthAgo = Carbon::now()->subMonth(3);
    
        function recentHotMovies($time, $limit){
            return $recentHotMovies = Movie::query()
            ->select('id', 'title', 'thumbnail')
            ->where('updated_at', '>=', $time)
            ->orderBy('views', 'desc')
            ->limit($limit)
            ->get();
        }

        if(recentHotMovies($twoWeekAgo, 5)->isNotEmpty()){
            $recentHotMovie5 = recentHotMovies($twoWeekAgo, 5);
        }else{
            $recentHotMovie5 = recentHotMovies($twoMonthAgo, 5);
        }

        if(recentHotMovies($twoWeekAgo, 10)->isNotEmpty()){
            $recentHotMovie10 = recentHotMovies($twoWeekAgo, 10);
        }else{
            $recentHotMovie10 = recentHotMovies($twoMonthAgo, 10);
        }


        function recentFavoriteMovies($time, $limit){
            return $recentFavoriteMovies = Movie::query()
            ->select('id', 'title', 'thumbnail')
            ->where('updated_at', '>=', $time)
            ->orderBy('favorite', 'desc')
            ->limit($limit)
            ->get();
        }

        if(recentFavoriteMovies($twoWeekAgo, 5) -> isNotEmpty()){
            $recentFavoriteMovie5 = recentFavoriteMovies($twoWeekAgo, 5);
        }else{
            $recentFavoriteMovie5 = recentFavoriteMovies($twoMonthAgo, 5);
        }

        if(recentFavoriteMovies($twoWeekAgo, 10) -> isNotEmpty()){
            $recentFavoriteMovie10 = recentFavoriteMovies($twoWeekAgo, 10);
        }else{
            $recentFavoriteMovie10 = recentFavoriteMovies($twoMonthAgo, 10);
        }
        
//----------------------    
        $moviesByNew = Movie::query()
            ->select('id', 'title', 'thumbnail')
            ->orderBy('updated_at', 'desc')
            ->limit(15)
            ->get();

        $moviesByTop10 = Movie::query()
            ->select('id', 'title', 'thumbnail')
            ->orderBy('views', 'desc')
            ->limit(10)
            ->get();

        return view('user.home', compact([
            'hotCategories',
            'koreaMovies',
            'chinaMovies',
            'animeMovies',
            'recentHotMovie5',
            'recentHotMovie10',
            'recentFavoriteMovie5',
            'recentFavoriteMovie10',
            'moviesByNew',
            'moviesByTop10',
            'twoLastestMovies',
            'top9HotCategories',
            'top5HotCategories',
        ]));
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function about()
    {
        return view('user.about');
    }
}
