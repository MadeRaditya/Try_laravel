<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'anime_mal_id' => 'required|string',
            'user_email' => 'required|string',
            'username' => 'required|string',
            'comment' => 'required|string',
            'anime_title' => 'required|string',
        ]);

        if($validated){
            Comment::create($validated);
    
            return back()->with('success', 'Comment Posted Successfully');
        }else{
            return back()->with('error', 'Failed to post comment');
        }
    }
}
