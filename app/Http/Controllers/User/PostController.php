<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Traits\SaveMedias;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SavePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;


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
        return view('user.post-index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.post-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePostRequest $request, Post $post)
    {
        try {

            $result = DB::transaction(function () use ($request) {

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->image;
    
                $data = $request->safe([
                    'title',
                    'description',
                ]);
            
                $data['slug'] = SlugService::createSlug(Post::class, 'slug', $data['title']);
                $data['user_id'] = auth()->user()->id;
    
                $post = Post::create($data);
              
                $this->saveMedias($request, $file, $post->user_id, 'post', $post->id);
            }
        });

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    
        return redirect('/posts')->with('message', 'Your post has been added!');
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
        return view('user.post-show')->with('post', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('user.post-edit')->with('post', $post);
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
            $data = $request->safe([
                'title',
                'description',
            ]);

            $data['slug'] = SlugService::createSlug(Post::class, 'slug', $data['title']);
            $data['user_id'] = auth()->user()->id;

            $post->update($data);

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

}

