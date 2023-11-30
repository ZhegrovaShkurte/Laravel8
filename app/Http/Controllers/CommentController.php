<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $validated = $request->validate([
            'body' => 'required', 
            'post_id' => 'required'
        ]);
  
        $validated['user_id'] = auth()->user()->id;

        Comment::create($validated);
       
        return back()->with('success', 'Comment added successfully');
  
    }
}
