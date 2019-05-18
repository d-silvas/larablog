@extends('layouts.public')

@section('title')
Category: {{ $category->name }}
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-12">
                    <h1>{{ $category->name }}</h1>
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
    
        <div class="col-3">
            @include('public.partials.sidebar')
        </div>
    </div>
</div>

@endsection