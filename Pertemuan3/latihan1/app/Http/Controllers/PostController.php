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

    public function show($post)
    {
       $post->load (['author', 'category']);
       return view('Post', compact('post'));
    }
}
