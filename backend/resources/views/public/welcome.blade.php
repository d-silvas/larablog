@extends('layouts.public')

@section('title')
{{ config('app.name') }}
@endsection

@section('content')
<div class="row mx-0">
    <div class="col-12 col-md-9 px-0 px-md-1 px-lg-3">
        <h3>Latest posts</h3>
        <hr>
        @include('public.partials.posts-list', ['posts' => $posts])
    </div>
    
    <div class="col-12 col-md-3 px-0 px-md-1 px-lg-3">
        @include('public.partials.sidebar')
    </div>
</div>
@endsection