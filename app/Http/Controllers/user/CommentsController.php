<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

     /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        Comment::query() -> create(request() -> all());
        return redirect()->route('MovieInfo.show', request('id_movie'));
    }
}
