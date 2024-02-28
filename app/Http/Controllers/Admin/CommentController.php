<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::with('post')->paginate(100);
        return view('admin.comments.index', compact('comments'));
    }
    public function destroy(Comment $comment){
        $comment->delete();
        return back()->with('success', __('admin.deleted'));
    }
}
