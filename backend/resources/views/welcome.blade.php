@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Posts</h1>
            <hr>
        </div>
        @foreach($posts as $post)
        <div class="col-12">
            {{ $post->title }}
            [{{ $post->category->name }}]
        </div>
        @endforeach
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