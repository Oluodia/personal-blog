<?php

namespace App\Repositories\Interface;


interface PostRepositoryInterface {
	public function createPost(array $data);
	public function find($column, $operator);
	public function updatePost($id, array $data);
	public function deletePost($column, $operator);
}