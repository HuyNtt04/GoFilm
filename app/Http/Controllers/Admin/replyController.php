<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\replyComment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class replyController extends Controller implements HasMiddleware
{
    public static function middleware():array{
        return [
            new Middleware('permission:delete reply',only:['destroy','hardDelete']),
        ];
    }
    public function index(Comment $comment){
        $replies = replyComment::where('comment_id',$comment->id)->paginate(8);
        return view('admin.replies.index',compact('replies','comment'));
    }
    public function destroy(Comment $comment, replyComment $replyComment){
        if($replyComment){
            $replyComment->delete();
        }
        return redirect()->route('admin.replyComments.index',$comment->id)->with('success', 'Reply Comment deleted successfully!');
    }
    public function hardDelete(Request $request){
        $replies = $request->replies;
        replyComment::whereIn('id',$replies)->delete();
        return response()->json(['status' => 'success']);
    }
    
}