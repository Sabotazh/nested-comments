<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(): View
    {
        return view('comments.show')
            ->with('post', Post::query()->first())
            ->with('comments', Comment::all());
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['body' => ['required', 'string']]);

        $input = $request->all();
        $input['user_id'] = Auth::id();

        Comment::query()->create($input);

        return back();
    }
}
