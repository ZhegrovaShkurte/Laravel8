<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Events\PostLiked;
use App\Events\PostDisliked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class ReactionController extends Controller
{
    public function store(Request $request)
    {
        $userName = auth()->user()->name;

        $userId = auth()->user()->id;

        $postTitle = $request->input('post_title');

        $postId = $request->input('post_id');

        if ($request->input('reaction') == 'like') {

            Like::create([
                'post_id' => $postId,
                'user_id' => $userId,
                'reaction' => 'like',
            ]);

            Event::dispatch(
                new PostLiked(
                    $userName,
                    $postTitle,
                    'message',
                    'user@user.com'
                )
            );
        } else if ($request->input('reaction') == 'dislike') {

            Like::create([
                'post_id' => $postId,
                'user_id' => $userId,
                'reaction' => 'dislike',
            ]);

            Event::dispatch(
                new PostDisliked(
                    $userName,
                    $postTitle,
                    'message',
                    'user@user.com'
                )
            );

        }
        return redirect()->back();
    }
}
