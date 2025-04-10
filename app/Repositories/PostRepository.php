<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Models\Post;
use Exception;

class PostRepository
{
	public function createPost(array $data)
	{
		try {
			$post = Post::create($data);
			$post->save();
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}

	public function find($column, $operator)
	{
		try {
			$post = Post::where($column, $operator)->first();
			return $post;
		} catch (Exception $e) {
			throw new Exception($e);
		}

	}

	public function updatePost($id, array $data)
	{
		try {
			$post = Post::find($id)->update($data);
			return $post;
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}

	public function deletePost($column, $operator)
	{

		try {
			$post = $this->find($column, $operator);

			Comment::where('post_id', $post->id)->delete();

			$post->delete();
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
}