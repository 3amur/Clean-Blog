<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required | min:3 | max:100',
            'body' => 'required | min:3 | max:1000',
            'category_id' => 'required | exists:categories,id',
            'image' => 'required | image | mimes:png,jpeg,gif,webp,jpg,jpng',
        ]);
        $image_name = $request->file('image')->store('public');
        $data['image'] = $image_name;
        Post::create($data);
        return back()->with('success', __("admin.added"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)  
    {
        $category = Category::all();
        return view('admin.posts.edit', compact('category','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Post $post, Request $request)
    {
        $data = $request->validate([
            'title' => 'required | min:3 | max:100',
            'body' => 'required | min:3 | max:1000',
            'category_id' => 'required | exists:categories,id',
            'image' => 'required | image | mimes:png,jpeg,gif,webp,jpg,jpng',
        ]);
        $image_name = $request->file('image')->store('public');
        File ::delete(public_path($post->image));
        $data['image'] = $image_name;
        Post::where('id',$post->id)->update($data);
        return back()->with('success', __("admin.added"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', __('admin.deleted'));
    }
}
