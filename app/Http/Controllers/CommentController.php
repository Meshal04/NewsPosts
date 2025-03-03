<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:500',
            'post_id' => 'nullable|exists:posts,id',
            'news_id' => 'nullable|exists:news,id',
        ]);

        Comment::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'news_id' => $request->news_id,
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

    public function destroy(Comment $comment)
    {
        if (Auth::id() === $comment->user_id) {
            $comment->delete();
            return back()->with('success', 'Comment deleted!');
        }
        
        return back()->with('error', 'Unauthorized action.');
    }
}
