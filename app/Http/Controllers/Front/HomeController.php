<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $posts = Post::with('category')->select('id','title','body','category_id','created_at')
        ->orderBy('created_at','asc')->take(10)->get();
        return view('front.home', compact('posts'));
    }
}
