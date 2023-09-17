<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $data = new Comment();
        $data->content = request()->content;
        $data->article_id = request()->article_id;
        $data->user_id = auth()->user()->id;
        $data->save();

        return back();
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        if( Gate::allows('comment-delete', $comment) ) {
            $comment->delete()->with('info', 'Comment deleted!');
            return back();
            } else {
            return back()->with('info', 'Unauthorize');
            }
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }
}
