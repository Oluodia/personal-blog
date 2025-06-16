<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Repositories\Interface\CommentRepositoryInterface;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function __construct(private CommentRepositoryInterface $commentRepository)
    {
    }
    public function show(Post $post)
    {
        return view('posts.post', compact('post'));
    }

    public function store(Request $request, Post $post)
    {
        $this->commentRepository->createComment([
            'comment' => $request->content,
            'name' => $request->name,
        ], $post);

        return back();
    }

    public function destroy(Comment $comment)
    {
        $this->commentRepository->deleteComment($comment);
        return back();
    }
}
