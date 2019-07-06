<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('public.welcome')
            ->with('categories', Category::take(20)->get())
            ->with('tags', Tag::take(20)->get())
            ->with('posts', Post::published()->searched()->orderBy('published_at', 'desc')->paginate(6));
    }
}
