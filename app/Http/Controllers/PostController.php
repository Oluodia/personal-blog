<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function edit()
    {
        return view('posts.edit');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'unique:posts',
        ]);

        $this->postRepository->createPost([
            'title' => $request->title,
            'content' => $request->content,
            'author' => auth()->user()->name,
        ]);

        return redirect()->route('home');
    }

    public function showUpdate()
    {
        $post = $this->postRepository->find('title', $_GET['title']);

        return view('posts.update-post', compact('post'));
    }

    public function update(Request $request)
    {
        $this->postRepository->updatePost($request->_id, [
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('home');
    }

    public function destroy(Request $request)
    {
        $this->postRepository->deletePost('title', $request->title);

        return redirect()->route('posts.edit');
    }
}
