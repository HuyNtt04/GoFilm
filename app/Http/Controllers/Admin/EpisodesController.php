<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Movie;
use App\Http\Requests\EpisodesRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class EpisodesController extends Controller implements HasMiddleware
{
    public static function middleware():array{
        return [
            new Middleware('permission:delete episode',only:['destroy','hardDelete']),
            new Middleware('permission:update episode',only:['update','edit']),
            new Middleware('permission:create episode',only:['store','create']),
            new Middleware('permission:view episode',only:['index']),

        ];

    }
    public function index(Movie $movie)
    {
        $episodes = $movie->episodes()->paginate(8);
        $movieID = $movie->id;
        return view('admin.episodes.index', compact('episodes','movieID'));
    }

    public function create(Movie $movie)
    {
        return view('admin.episodes.create',compact('movie'));
    }

    public function store(EpisodesRequest $episodesRequest,Movie $movie) 
    {   
        $data = $episodesRequest->validated();
        $data['id_movie'] = $movie->id; 
        $episode = Episode::create($data);
        return redirect()->route('admin.episodes.index',$movie->id)->with('success', 'Tập đã được thêm thành công!');
    }

    public function edit(Movie $movie,Episode $episode)
    {
        return view('admin.episodes.edit', compact('movie','episode'));
    }

    public function update(EpisodesRequest $episodesRequest,Movie $movie, Episode $episode)
    {
        $data = $episodesRequest->validated();
        $episode->update($data);

        return redirect()->route('admin.episodes.index',$movie->id)->with('success', 'Episode updated successfully!');
    }

    public function destroy(Movie $movie,Episode $episode)
    {
        $episode->delete();
        return redirect()->route('admin.episodes.index',$movie->id)->with('success', 'Movie deleted successfully!');
    }
    public function hardDelete(Request $request){
        $episodes = $request->episodes;
        Episode::whereIn('id',$episodes)->delete();
        return response()->json(['status' => 'success']);
    }
}
