<?php

namespace App\Http\Controllers;

use App\Models\Post;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }
    
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([

        'name' => 'required',

        'Description' => 'required',

        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')->with('success','Post created successfully.');

    }

    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
        'name' => 'required',
        'Description' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        // SEM AJAX return redirect()->route('posts.index')->with('success','Post deleted successfully');
        $destroy['success'] = true;
        $destroy['Message'] = 'Post deleted successfully';
        echo json_encode($destroy);
        return;
    }
}
