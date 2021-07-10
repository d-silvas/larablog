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
        width: 240px;
        height: 240px;
        border-radius: 50%;
    }
    #about-me-name {
        color: white;
        text-shadow: 1px 1px #000000;
    }
    i.fab {
        font-size: 2.5rem;
        margin: 0 1rem;
        width: 40px;
    }
    .fa-linkedin {
        color: #0077B5;
    }
    .fa-github, .fa-medium {
        color: black;
    }
    .fa-stack-overflow {
        color: white;
        background: #FAC113;
        border: 0;
        border-radius: 3px;
        text-align: center;
    }
</style>
@endsection

@section('content')
<div class="jumbotron mb-3">
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
    <div class="row mt-3 my-2">
        <div class="col-12 text-center">
                <a target="_blank" href="{{ config('services.social.linkedin') }}"><i class="fab fa-linkedin"></i></a>
                <a target="_blank" href="{{ config('services.social.github') }}"><i class="fab fa-github"></i></a>
                <a target="_blank" href="{{ config('services.social.stack-overflow') }}"><i class="fab fa-stack-overflow"></i></a>
                <a target="_blank" href="{{ config('services.social.medium') }}"><i class="fab fa-medium"></i></a>
        </div>
    </div>
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
