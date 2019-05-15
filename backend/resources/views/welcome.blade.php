@extends('layouts.blog')

@section('title')
{{ config('app.name') }}
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-12">
                    {{-- <h1>Posts</h1> --}}
                    <hr>
                </div>
                @forelse($posts as $post)
                <div class="col-12">
                    @include('partials.post-card', ['post' => $post])
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
            @include('partials.sidebar')
        </div>
    </div>
</div>

@endsection