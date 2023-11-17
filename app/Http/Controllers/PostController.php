<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Like;
use App\Models\Post;
use App\Models\Media;
use App\Traits\SaveMedias;
use Illuminate\Http\Request;
use App\Http\Requests\SavePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Comment;


class PostController extends Controller
{


    use SaveMedias;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->with('comments', 'media', 'user', 'comments.replies')->get();
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePostRequest $request)
    {
        try {

            $file = $request->image;

            $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

            $post = Post::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => $slug,
                'user_id' => auth()->user()->id
            ]);

            $this->saveMedias($request, $file, $post->user_id, 'post', $post->id);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect('/posts')->with('message', 'Your post has been added! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        $posts = Post::with('comments', 'media', 'user', 'comments.replies')->find($post->id);
        return view('blog.show')->with('post', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('blog.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            $post->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                'user_id' => auth()->user()->id
            ]);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect('/posts')->with('message', 'Your post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts')->with('message', 'Your post has been deleted');
    }

    public function like(Request $request, $postId)
    {
        $userId = auth()->user()->id;

        Like::create([
            'post_id' => $postId,
            'user_id' => $userId,
            'reaction' => 'like',
        ]);

        return redirect()->back();
    }

    public function dislike(Request $request, $postId)
    {
        $userId = auth()->user()->id;

        Like::create([
            'post_id' => $postId,
            'user_id' => $userId,
            'reaction' => 'dislike',
        ]);

        return redirect()->back();
    }
}

