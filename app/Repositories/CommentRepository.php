<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Models\Post;
use App\Repositories\Interface\CommentRepositoryInterface;
use Exception;

class CommentRepository implements CommentRepositoryInterface
{
	public function createComment(array $data, Post $post)
	{
		try {
			$post->comments()->create($data);
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}

	public function deleteComment(Comment $comment)
	{
		try {
			$comment->delete();
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
}