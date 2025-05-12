<?php
namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Movie;
use App\Models\user\Comment;
use App\Models\user\Favorite;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MovieInfoController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // premium
        $movie = Movie::findOrFail($id);

        $isBlocked = $movie->isPremium && (! Auth::check() || ! Auth::user()->isPremium);

        $episodes        = Episode::where('id_movie', $id)->get();

        $idCategory = DB::table('movies')
                    ->select('category_movie.id_category')
                    ->join('category_movie', 'category_movie.id_movie', '=', 'movies.id')
                    ->where('movies.id', '=', $id)
                    ->first();

        $recommendations = DB::table('movies')
        ->join('category_movie', 'category_movie.id_movie', '=', 'movies.id')
        ->where('movies.id', '!=', $movie->id)
        ->where('category_movie.id_category', '=', $idCategory->id_category)
        ->limit(10)->get();

        //----------
        $movieInfo = Movie::query()
            ->findOrFail($id);

        if (Auth::check()) {
            $id_user = Auth::user()->id;
        } else {
            $id_user = '';
        }

        //bình luận
        $latestCommentsByMovie = Comment::query()
            ->select('comments.id', 'comments.content', 'users.id as idUser', 'users.name', 'users.image', 'comments.updated_at')
            ->join('users', 'users.id', '=', 'comments.id_user')
            ->where('comments.id_movie', $id)
            ->orderBy('comments.updated_at', 'desc')
            ->get();

        //diff
        function customerFomatted($second)
        {
            if ($second < 60) {
                $second = round($second);
               return $second .= ' giây trước';
            } elseif ($second >= 60 && $second < 3600) {
                $second = round($second /= 60);
                return $second .= ' phút trước';

            } elseif ($second >= 3600 && $second < 86400) {
                $second = round($second /= 3600);
                return $second .= ' giờ trước';

            } elseif ($second >= 86400) {
                $second = round($second/= 86400);
                return $second .= ' ngày trước';
            }
        }

        
        for ($i = 0; $i < count($latestCommentsByMovie); $i++) {

            $dateTimeAgo = Carbon::now()->diffInSeconds($latestCommentsByMovie[$i]->updated_at, true);

            $latestCommentsByMovie[$i]['dateTimeAgo'] = customerFomatted($dateTimeAgo);

            //thêm replies
            $latestCommentsByMovie[$i]['replies'] = $latestCommentsByMovie[$i]->replies()->orderBy('updated_at', 'desc')->get();

            //thêm ảnh và tên
            foreach($latestCommentsByMovie[$i]['replies'] as $reply){
                $reply['image'] = $reply->user->image;
                $reply['name'] = $reply->user->name;

                $diffTimeAgoOrigin = Carbon::now() -> diffInSeconds($reply['updated_at'], true);
                
                $reply['diffTimeAgoFormatted'] = customerFomatted($diffTimeAgoOrigin);
            }

        }

        //favorite movie
        $favoriteMovie = Favorite::query()
                        ->select()
                        ->where('id_user', '=', $id_user)
                        ->where('id_movie', '=', $movieInfo->id)
                        ->first();


        // Truyền biến isBlocked xuống view
        return view('user.movie_info', compact([
            'movie',
            'episodes',
            'recommendations',
            'isBlocked',
            'movieInfo',
            'latestCommentsByMovie',
            'id_user',
            'favoriteMovie'
        ]));
    }

}
