<?php
namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\user\Comment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MovieDetailController extends Controller
{
    public function show($id, $episode_id = null, $server = null)
    {
        $movie = Movie::findOrFail($id);
        $movieDetail = Movie::with('episodes.urls')->findOrFail($id);

        // Kiểm tra quyền truy cập Premium
        if ($movieDetail->isPremium == 1 && (!Auth::check() || Auth::user()->isPremium == 0)) {
            return redirect()->route('home.index')->with('error', 'Bạn cần nâng cấp tài khoản Premium để xem phim này.');
        }

        // Danh sách tất cả tập phim
        $episodes = Episode::where('id_movie', $id)->get();

        // Lấy tập hiện tại (nếu không có thì lấy tập đầu tiên)
        $currentEpisode = $episode_id
            ? $episodes->where('id', $episode_id)->first()
            : $episodes->first();

        // Lấy danh sách server (urls) từ tập hiện tại
        $servers = $currentEpisode ? $currentEpisode->urls : collect();

        // Xác định URL đang xem (theo server nếu có)
        $selectedUrl = $server
            ? $servers->where('server_name', $server)->first()
            : $servers->first();

        $videoData = $selectedUrl
            ? [
                'url' => $selectedUrl->url,
                'server_name' => $selectedUrl->server_name,
            ]
            : null;

        // Phim gợi ý (khác phim hiện tại)
        $recommendations = Movie::where('id', '!=', $movieDetail->id)->limit(5)->get();

        // Thông tin phim
        $movieInfo = $movieDetail;

        // ID người dùng (nếu có)
        $id_user = Auth::check() ? Auth::user()->id : null;

        // Lấy bình luận
        $latestCommentsByMovie = Comment::query()
            ->select('comments.id', 'comments.content', 'users.id as idUser', 'users.name', 'users.image', 'comments.updated_at')
            ->join('users', 'users.id', '=', 'comments.id_user')
            ->where('comments.id_movie', $id)
            ->orderBy('comments.updated_at', 'desc')
            ->get();

        // Hàm định dạng thời gian
        function customerFomatted($second)
        {
            if ($second < 60) return $second . ' giây trước';
            if ($second < 3600) return round($second / 60) . ' phút trước';
            if ($second < 86400) return round($second / 3600) . ' giờ trước';
            return round($second / 86400) . ' ngày trước';
        }

        foreach ($latestCommentsByMovie as $comment) {
            $comment['dateTimeAgo'] = customerFomatted(Carbon::now()->diffInSeconds($comment->updated_at, true));
            $comment['replies'] = $comment->replies()->orderBy('updated_at', 'desc')->get();

            foreach ($comment['replies'] as $reply) {
                $reply['image'] = $reply->user->image;
                $reply['name']  = $reply->user->name;
                $reply['diffTimeAgoFormatted'] = customerFomatted(Carbon::now()->diffInSeconds($reply['updated_at'], true));
            }
        }

        return view('user.movie_detail', compact(
            'movie',
            'movieDetail',
            'currentEpisode',
            'videoData',
            'episodes',
            'recommendations',
            'movieInfo',
            'latestCommentsByMovie',
            'id_user',
            'servers',
        ));
    }
}
