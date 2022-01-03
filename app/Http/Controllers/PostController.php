<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:posts',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if(!$request->has('user_id')) {
            $request->merge(['user_id' => Auth::user()->id]);
        }

        $post = Post::create($request->all());
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $post->addMedia($request->file('image'))->toMediaCollection();
        }

        if($request->has('categories')) {
            $post->categories()->sync($request->categories);
        }

        return redirect()->route('posts.index')->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => ['required', 'string', 'max:255', Rule::unique('posts')->ignore($post)],
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if(!$request->has('user_id')) {
            $request->merge(['user_id' => Auth::user()->id]);
        }
        
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $post->clearMediaCollection();
            $post->addMedia($request->file('image'))->toMediaCollection();
        }
        
        if($request->has('categories')) {
            $post->categories()->sync($request->categories);
        }
        
        if($request->has('tags')) {
            foreach($request->tags as $slug) {
                $tag = Tag::firstOrCreate([
                    'name' => trim($slug),
                    'slug' => trim($slug),
                ]);
                $post->tags()->sync($tag);
            }
        }

        $post->update($request->all());


        return redirect()->route('posts.index')->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
