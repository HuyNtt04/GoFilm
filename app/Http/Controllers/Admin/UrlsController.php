<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\UrlsRequest;
use App\Models\Episode;
use App\Models\Movie;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class UrlsController extends Controller implements HasMiddleware
{
    //
    public static function middleware():array{
        return [
            new Middleware('permission:delete url',only:['destroy','hardDelete']),
            new Middleware('permission:update url',only:['update','edit']),
            new Middleware('permission:create url',only:['store','create']),
            new Middleware('permission:view url',only:['index']),
        ];

    }
    public function index(Episode $episode)
    {
        $episodeID = $episode->id;
        $movie = $episode->movie;
        $urls = $episode->urls()->paginate(8);
        return view('admin.urls.index', compact('episodeID','urls','movie'));
    }

    public function create(Episode $episode )
    {   
        return view('admin.urls.create',compact('episode'));
    }

    public function store(UrlsRequest $UrlsRequest,Episode $episode) 
    {   
        $data = $UrlsRequest->validated();
        $data['id_episode'] = $episode->id; 
        $url = Url::create($data);
        return redirect()->route('admin.urls.index',$episode->id)->with('success', 'Url đã được thêm thành công!');
    }

    public function edit(Episode $episode, Url $url)
    {
        return view('admin.urls.edit', compact('episode','url'));
    }

    public function update(UrlsRequest $UrlsRequest, Episode $episode, Url $url)
    {
        $data = $UrlsRequest->validated();
        $url->update($data);

        return redirect()->route('admin.urls.index',$episode->id)->with('success', 'Url updated successfully!');
    }

    public function destroy(Episode $episode,Url $url)
    {
        $url->delete();
        return redirect()->route('admin.urls.index',$episode->id)->with('success', 'Url deleted successfully!');
    }
    public function hardDelete(Request $request){
        $urls = $request->urls;
        Url::whereIn('id',$urls)->delete();
        return response()->json(['status' => 'success']);
    }
}
