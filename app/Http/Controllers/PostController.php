<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function edit()
    {
        return view('posts.edit');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'unique:posts',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => auth()->user()->name,
        ]);

        $post->save();

        return route('home');
    }

    public function showUpdate()
    {
        $post = Post::where('title', $_GET['title'])->first();
        return view('posts.update-post', compact('post'));
    }

    public function update(Request $request)
    {
        Post::find($request->_id)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return route('home');
    }

    public function destroy(Request $request)
    {
        $post = Post::where('title', $request->title)->first();
        Comment::where('post_id', $post->id)->delete();
        $post->delete();

        return route('posts.edit');
    }
}
