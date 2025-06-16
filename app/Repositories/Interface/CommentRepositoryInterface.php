<?php

namespace App\Repositories\Interface;

use App\Models\Comment;
use App\Models\Post;

interface CommentRepositoryInterface {
	public function createComment(array $data, Post $post);

	public function deleteComment(Comment $comment);
}