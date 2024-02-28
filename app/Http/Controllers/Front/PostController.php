<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('category')->select('id', 'title', 'body', 'category_id', 'created_at', 'image')
        ->orderBy("created_at", "ASC")->paginate(20);
        return view('front.posts', compact('posts'));
    }
    
    public function post(){
        return view('front.single-post');
    }
}
