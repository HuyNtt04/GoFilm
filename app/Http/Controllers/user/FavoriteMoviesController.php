<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\Favorite;
use Illuminate\Http\Request;

class FavoriteMoviesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        Favorite::query()->create($request->all());
        return redirect()->route('MovieInfo.show', $request->get('id_movie'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        
        Favorite::query()->find($request->get('id'))-> delete();
        return redirect()->route('MovieInfo.show', $request->get('id_movie'));
    }

    public function destroyFavoriteInProfile(Request $request)
    {

        Favorite::query()->find($request->get('id'))->delete();
        return redirect()->route('profile.index');
    }
}