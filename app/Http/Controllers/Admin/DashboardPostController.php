<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardPostController extends Controller
{
    public function index()
    {   
        $posts = Post::latest()->with('user', 'comments', 'likes', 'dislikes')->withCount('comments', 'likes','dislikes')->get();
        return view('admin.posts',compact('posts'));
    }
}
