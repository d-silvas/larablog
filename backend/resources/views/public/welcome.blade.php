@extends('layouts.public')

@section('title')
{{ config('app.name') }}
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-9">
        <h3>Latest posts</h3>
        <hr>
        @include('public.partials.posts-list', ['posts' => $posts])
    </div>

    <div class="col-12 col-md-3">
        @include('public.partials.sidebar')
    </div>
</div>
@endsection