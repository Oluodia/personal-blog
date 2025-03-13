<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.post', compact('post'));
    }

    public function store(Request $request, Post $post)
    {
        $post->comments()->create([
            'comment' => $request->content,
            'name' => $request->name,
        ]);

        return back();
    }

    public function destroy($id)
    {
        Comment::find($id)->first()->delete();
        return back();
    }
}
