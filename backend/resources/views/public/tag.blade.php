@extends('layouts.public')

@section('title')
Tag: {{ $tag->name }}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <h3>Tag: {{ $tag->name }}</h3>
        <hr>
    </div>
    <div class="col-12 col-md-9">
        @include('public.partials.posts-list', ['posts' => $posts])
    </div>

    <div class="col-12 col-md-3">
        @include('public.partials.sidebar')
    </div>
</div>
@endsection