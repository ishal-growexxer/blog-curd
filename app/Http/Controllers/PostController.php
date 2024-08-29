<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use  Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard', [
            'posts' => Post::latest()->with('user', 'comments')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'title' => 'required|string|unique:posts|min:5|max:100',
            'body' => 'required|string|min:5|max:2000',
        ]);
        
        $validated['user_id'] = auth()->user()->id;
        $validated['slug'] = Str::slug($validated['title'], '-');
        $post = Post::create($validated);
    
        return redirect(route('posts.show', [$post->slug]))->with('notification', 'Post created!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post)
    {
        $post = Post::where('slug', $post)->first();
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|unique:posts|min:5|max:100',
            'body' => 'required|string|min:5|max:2000',
        ]);
    
        $validated['slug'] = Str::slug($validated['title'], '-');
        $post = Post::where('slug', $post)->first();
        $post->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
        ]);
    
        return redirect(route('posts.show', [$post->slug]))->with('notification', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post)
    {
        $post = Post::where('id', $post)->first();
        $post->delete();

    // Redirect user with a deleted notification
    return response()->json(['message' => 'Post deleted!'], 200);
    }
}
