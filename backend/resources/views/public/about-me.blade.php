@extends('layouts.about-me')

@section('css')
<style>
    .jumbotron {
        background-image: url("{{ asset('storage/bg.jpeg') }}");
        height: 350px;
        border-radius: 0;
        background-size: cover;
        padding: 1rem;
    }
    .jumbotron > .container, .jumbotron > .container > div.row {
        height: 100%;
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
    <div class="container">
        <div class="row d-sm-flex flex-row">
            <div class="d-flex flex-column">
                <div class="flex-grow-1"></div>
                <img id="about-me-face-img" class="align-self-end" src="{{ asset('storage/face.jpg') }}">
            </div>
            <div id="about-me-name" class="align-self-end">
                <h1>David Silva <span class="d-none d-sm-inline">Sanmartin</span></h1>
            </div>
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