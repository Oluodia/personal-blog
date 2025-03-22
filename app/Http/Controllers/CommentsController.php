<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function show(Post $post)
    {
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

    public function destroy(Comment $comment)
    {
        $comment->first()->delete();
        return back();
    }
}
