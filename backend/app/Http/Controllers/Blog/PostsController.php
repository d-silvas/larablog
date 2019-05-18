<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('public.show')->with('post', $post);
    }

    public function category(Category $category)
    {
        return view('public.category')
            ->with('category', $category)
            ->with('posts', $category->posts()->searched()->paginate(10))
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function tag(Tag $tag)
    {
        return view('public.tag')
            ->with('tag', $tag)
            ->with('posts', $tag->posts()->searched()->paginate(10))
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }
}
