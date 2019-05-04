@extends('layouts.blog')

@section('title')
{{ config('app.name') }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h6>Search</h6>
            <form action="{{ route('welcome') }}" method="GET" class="input-group">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search"
                    value="{{ request()->query('search') }}"
                    >
                <button class="btn btn-primary btn-sm" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Posts</h1>
            <hr>
        </div>
        @forelse($posts as $post)
        <div class="col-12">
            <a href="{{ route('blog.show', $post->id) }}">
                {{ $post->title }}
            </a>
            [{{ $post->category->name }}]
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">
                No results found for query <b>{{ request()->query('search') }}</b>
            </p>
        </div>
        @endforelse
        <div class="col-12">
            {{ $posts->appends(['search' => request()->query('search')])->links() }}
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Categories</h1>
            <hr>
        </div>
        <div class="col-12">
            <ul>
                @foreach($categories as $category)
                <li>
                    {{ $category->name }}
                </li>    
                @endforeach
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Tags</h1>
            <hr>
        </div>
        <div class="col-12">
            <ul>
                @foreach($tags as $tag)
                <li>
                    {{ $tag->name }}
                </li>    
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection