@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('posts.create') }}" class="btn btn-success">
        Add Post
    </a>
</div>


<div class="card card-default">
    <div class="card-header">
        Posts
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>Name</th>
                <th></th>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>

@endsection