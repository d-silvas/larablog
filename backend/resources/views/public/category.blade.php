@extends('layouts.public')

@section('title')
Category: {{ $category->name }}
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-9">
        <h3>Category: {{ $category->name }}</h3>
        <hr>
        @include('public.partials.posts-list', ['posts' => $posts])
    </div>

    <div class="col-12 col-md-3">
        @include('public.partials.sidebar')
    </div>
</div>
@endsection