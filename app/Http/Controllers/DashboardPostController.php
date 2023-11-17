<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    public function index()
    
    {   
        $posts = Post::latest()->with('user', 'comments', 'likes')->withCount('comments', 'likes')->get();
        return view('admin.posts',compact('posts'));
    }
}
