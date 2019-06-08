@extends('layouts.about-me')

@section('css')
<style>
    .jumbotron {
        background-image: url("{{ asset('storage/bg.jpeg') }}");
        height: 350px;
    }
    #about-me-face-img {
        border-radius: 50%;
    }
    #about-me-name {
        color: white;
        text-shadow: 1px 1px #000000;
    }
</style>
@endsection

@section('content')
<div class="jumbotron">
    <div class="row d-flex flex-row px-4">
        <div>
            <img id="about-me-face-img" src="{{ asset('storage/face.jpg') }}">
        </div>
        <div id="about-me-name" class="align-self-end">
            <h1>David Silva Sanmartin</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Projects</h2>
            <div class="card" style="width: 18rem;">
                <a target="_blank" href="{{ url('/') }}">
                    <img class="card-img-top" src="{{ asset('storage/projects/blog.png') }}">
                </a>
                <div class="card-body">
                    <h5 class="card-title">This Blog!</h5>
                    <p class="card-text">What you are watching now is a CMS written in Laravel.</p>
                    <a target="_blank" href="https://github.com/d-silvas/larablog" class="btn btn-primary">Code</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection