<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author', 'category')->get();
        return view('Posts', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load(['author', 'category']);
        return view('show', compact('post'));
    }
}
