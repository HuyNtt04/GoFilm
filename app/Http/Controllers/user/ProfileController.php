<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    function index(){
        $user = Auth::user();

        $userFavoriteMovies = Movie::query()
                            ->select('movies.*', 'favorites.id as favoriteID')
                            ->join('favorites', 'favorites.id_movie', '=', 'movies.id')
                            ->where('favorites.id_user', '=', Auth::user()->id)
                            ->get();

        return view('user.profile', compact('user', 'userFavoriteMovies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if($request->file('image') == null){
           
            User::query()->where('id', $id)->update([
                'name' => $request->get('name'),
                'gender' => $request->get('gender'),
            ]);
            return redirect()->route('profile.index');
        }elseif($request->file('image') != null){
            
            $imageDir = base_path('../public_html/images');

            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move($imageDir, $fileName);
            
            User::query()->where('id', $id)->update([
                'name' => $request->get('name'),
                'gender' => $request->get('gender'),
                'image' => $fileName,
            ]);
            return redirect()->route('profile.index');
        }


        
    }
}