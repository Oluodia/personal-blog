<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Repositories\Interface\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct(private PostRepositoryInterface $postRepository)
    {
    }

    public function edit()
    {
        return view('posts.edit');
    }

    public function create(PostRequest $request)
    {

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

        if(!$post) {
            return back();
        }

        return view('posts.update-post', compact('post'));
    }

    public function update(PostRequest $request)
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
