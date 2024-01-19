<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'body'  => ['required', 'string', 'min:1'],
        ]);

        Post::query()->create($request->all());

        return redirect()->route('posts.index');
    }

    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }
}
