<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Repositories\Interface\CommentRepositoryInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommentsController extends Controller
{

    public function __construct(private CommentRepositoryInterface $commentRepository)
    {
    }
    public function show(Post $post)
    {
        return Inertia::render('Posts/Post', [
            'post' => $post,
            'comments' => Comment::where('post_id', $post->id)->latest()->get(),
            'isAuth' => auth()->user() ? true : false
        ]);
    }

    public function store(Post $post, Request $request)
    {
        $this->commentRepository->createComment([
            'comment' => $request->content,
            'name' => $request->name,
        ], $post);

        return redirect()->route('posts.post', $post->id);
    }

    public function destroy(Comment $comment, Post $post)
    {
        $this->commentRepository->deleteComment($comment);
        return redirect()->route('posts.post', $post->id);
    }
}
