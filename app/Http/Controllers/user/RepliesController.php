<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Reply::query()->create($request->all());
        return redirect()->route('MovieInfo.show', request('idMovie'));
    }

  
}
