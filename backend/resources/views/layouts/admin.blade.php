<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/general.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        @include('layouts.partials.navbar')
 
        <main>
            @auth
            <div class="container">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group mb-4">
                            @if(auth()->user()->isAdmin())
                            <li class="list-group-item">
                                <a href="{{ route('admin.users.index') }}">
                                    Users
                                </a>
                            </li>
                            @endif
                            <li class="list-group-item">
                                <a href="{{ route('admin.posts.index')}}">Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('admin.categories.index')}}">Categories</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('admin.tags.index')}}">Tags</a>
                            </li>
                        </ul>

                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('admin.trashed-posts.index')}}">Trashed Posts</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                </div>
            </div>
            @else
                @yield('content')
            @endauth
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
