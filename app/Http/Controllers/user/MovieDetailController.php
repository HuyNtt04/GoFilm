<?php
namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Url;
use App\Models\user\Comment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MovieDetailController extends Controller
{

    public function show($id)
    {
        $movieDetail = Movie::with('episodes.urls')->findOrFail($id);

        // Mặc định lấy tập đầu tiên (nếu có)
        $currentEpisode  = $movieDetail->episodes->first();
        $recommendations = Movie::where('id', '!=', $movieDetail->id) // Lấy những bộ phim khác với phim hiện tại
            ->limit(5)                                                    // Giới hạn số lượng phim đề xuất
            ->get();

        // Lấy link url đầu tiên nếu có
        $videoUrl = $currentEpisode && $currentEpisode->urls->isNotEmpty()
        ? $currentEpisode->urls->first()->url
        : null;

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
                $second = round($second /= 86400);
                return $second .= ' ngày trước';
            }
        }

        for ($i = 0; $i < count($latestCommentsByMovie); $i++) {

            $dateTimeAgo = Carbon::now()->diffInSeconds($latestCommentsByMovie[$i]->updated_at, true);

            $latestCommentsByMovie[$i]['dateTimeAgo'] = customerFomatted($dateTimeAgo);

            //thêm replies
            $latestCommentsByMovie[$i]['replies'] = $latestCommentsByMovie[$i]->replies()->orderBy('updated_at', 'desc')->get();

            //thêm ảnh và tên
            foreach ($latestCommentsByMovie[$i]['replies'] as $reply) {
                $reply['image'] = $reply->user->image;
                $reply['name']  = $reply->user->name;

                $diffTimeAgoOrigin = Carbon::now()->diffInSeconds($reply['updated_at'], true);

                $reply['diffTimeAgoFormatted'] = customerFomatted($diffTimeAgoOrigin);
            }

        }

        return view('user.movie_detail', compact(
            'movieDetail', 
            'currentEpisode', 
            'videoUrl', 
            'recommendations',
            'movieInfo',
            'latestCommentsByMovie',
            'id_user',
            ));
    }
}
