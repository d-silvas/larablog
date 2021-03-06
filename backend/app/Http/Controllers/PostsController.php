<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostsRequest;
use App\Post;
use App\Category;
use App\Tag;

use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index')
            ->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create')
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostsRequest $request)
    {
        // Upload the image
        $image = $request->image->store('posts');

        // Create new slug
        $slug = str_slug($request->title, '-');

        // Create the post
        $newPost = Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id
        ]);

        if ($request->tags) {
            // Does the job automatically because of the belongs-to-many relationship
            $newPost->tags()->attach($request->tags);
        }

        // Flash a message and redirect
        session()->flash('success', 'Post created successfully');
        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Post $post)
    {
        return view('admin.posts.create')
            ->with('post', $post)
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdatePostsRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'content', 'published_at', 'category_id']);

        // Recalculate slug
        $data['slug'] = str_slug($data['title'], '-');

        // Check if new image
        if ($request->hasFile('image')) {
            // Upload it
            $image = $request->image->store('posts');
            // Delete old one
            $post->deleteImage();

            $data['image'] = $image;
        }

        // Update tags
        if ($request->tags) {
            // Does the job automatically because of the many-to-many relationship
            $post->tags()->sync($request->tags);
        }

        // Update attributes
        $post->update($data);

        // Flash message and redirect
        session()->flash('success', 'Post updated successfully');
        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // NOTE: route model binding won't find the post if it is soft-deleted in the DB!
        // So we fall back to using the id instead
        // firstOrFail(): automatically shows 404 if the post doesn't exist
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        if ($post->trashed()) {
            $post->deleteImage();
            $post->forceDelete();
            $successMsg = 'Post deleted successfully';
        } else {
            $post->delete();
            $successMsg = 'Post trashed successfully';
        }
        session()->flash('success', $successMsg);
        return redirect(route('admin.posts.index'));
    }

    /**
     * Display a list of trashed posts
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();
        // dynamic method, same as ->with('posts', $trashed)
        return view('admin.posts.index')->withPosts($trashed);
    }

    /**
     * Restore a trashed post
     */
    public function restore($id)
    {
        // Can't use route model binding (as with destroy)
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();
        session()->flash('success', 'Post restored successfully');
        return redirect()->back();
    }
}
