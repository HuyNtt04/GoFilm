<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CommentController extends Controller implements HasMiddleware
{
    public static function middleware():array{
        return [
            new Middleware('permission:delete comment',only:['destroy','hardDelete']),
        ];
    }
    public function index(){
        $comments = Comment::paginate(8);
        return view('admin.comments.index',compact('comments'));
    }
    public function destroy(Comment $comment){
        if($comment){
            $comment->delete();
        }
        return redirect()->route('admin.comments.index')->with('success', 'Comment deleted successfully!');
    }
    public function hardDelete(Request $request){
        $comments = $request->comments;
        Comment::whereIn('id',$comments)->delete();
        return response()->json(['status' => 'success']);
    }
}