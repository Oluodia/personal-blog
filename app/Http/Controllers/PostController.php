<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Repositories\Interface\PostRepositoryInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{

    public function __construct(private PostRepositoryInterface $postRepository)
    {
    }

    public function edit()
    {

        return Inertia::render('Posts/Edit', [
            'posts' => Post::select('id', 'title')->get()->toArray()
        ]);
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

    public function showUpdate(Request $request)
    {
        $post = $this->postRepository->find('title', $request->title);

        if(!$post) {
            return back();
        }

        return Inertia::render('Posts/UpdatePost', [
            'post' => $post
        ]);
    }

    public function update(UpdatePostRequest $request)
    {
        $this->postRepository->updatePost($request->id, [
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
