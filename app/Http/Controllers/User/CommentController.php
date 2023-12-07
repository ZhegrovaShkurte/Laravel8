<?php

namespace App\Http\Controllers\User;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $validated = $request->validated();
        
        $validated['user_id'] = auth()->user()->id;

        Comment::create($validated);
       
        return back()->with('success', 'Comment added successfully');
  
    }
}
