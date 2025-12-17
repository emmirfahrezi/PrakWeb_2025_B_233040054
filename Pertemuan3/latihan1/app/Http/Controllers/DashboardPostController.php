<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id);

        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');      
        }
        return view('dashboard.posts.index', [
            'posts' => $posts->paginate(5)->withQueryString()  
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('dashboard.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dengan custom messages
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id', // Memastikan ID ada di tabel categories
            'excerpt' => 'required',
            'body' => 'required',
            // Aturan untuk Image: Opsional (nullable), harus gambar, format tertentu, max 2MB
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            // Custom Messages
            'title.required' => 'Field Title wajib diisi',
            'title.max' => 'Field Title tidak boleh lebih dari 255 karakter',
            'category_id.required' => 'Field Category wajib dipilih',
            'category_id.exists' => 'Category yang dipilih tidak valid',
            'excerpt.required' => 'Field Excerpt wajib diisi',
            'body.required' => 'Field Content wajib diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        // Failure handling
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        }

        $validated = $validator->validated();

        $slug = Str::slug($request->title);

        $originalSlug = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post-images', 'public');
        }

        Post::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $validated['category_id'],
            'excerpt' => $validated['excerpt'],
            'body' => $validated['body'],
            'image' => $imagePath,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Post created successfully');

        
        
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if ($post->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }
        $categories = \App\Models\Category::all();
        return view('dashboard.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }
        
        // Validasi input dengan custom messages
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id', // Memastikan ID ada di tabel categories
            'excerpt' => 'required',
            'body' => 'required',
            // Aturan untuk Image: Opsional (nullable), harus gambar, format tertentu, max 2MB
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            // Custom Messages
            'title.required' => 'Field Title wajib diisi',
            'title.max' => 'Field Title tidak boleh lebih dari 255 karakter',
            'category_id.required' => 'Field Category wajib dipilih',
            'category_id.exists' => 'Category yang dipilih tidak valid',
            'excerpt.required' => 'Field Excerpt wajib diisi',
            'body.required' => 'Field Content wajib diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        // Failure handling
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        }

        $validated = $validator->validated();

        // Regenerate slug if title changed, ensuring uniqueness across posts
        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $validated['slug'] = $slug;

        

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image) {
                \Storage::disk('public')->delete($post->image);
            }
            $validated['image'] = $request->file('image')->store('post-images', 'public');
        }

        $post->update($validated);
        
        return redirect()->route('dashboard.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }
        
        // Delete image file if exists
        if ($post->image) {
            \Storage::disk('public')->delete($post->image);
        }
        
        $post->delete();
        
        return redirect()->route('dashboard.index')->with('success', 'Post deleted successfully');
    }




}
