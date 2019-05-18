<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        a.btn-info, button.btn-info {
            color: #fff;
        }
        /* Posts cards */
        .title-row a {
            font-weight: 600;
        }
        .description-row {
            color: grey;
        }
        .card-footer {
            color: rgba(0, 0, 0, 0.54);
            font-size: 14px;
        }
        .card-footer a.badge {
            font-size: 12px;
        }
        .middot-divider {
            padding-right: .3em;
            padding-left: .3em;
            font-size: 16px;
            color: rgba(0, 0, 0, 0.54);
        }
        .middot-divider::after {
            content: '\00B7';
        }
    </style>
    @yield('css')
</head>
<body>
    <div id="app">
        @include('layouts.partials.navbar')

        <main class="py-4">
            @auth
            <div class="main-content px-4 w-100 mx-auto">
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
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>
            </div>
            @else
            <div class="main-content px-4 w-100 mx-auto">
                @yield('content')
            </div>
            @endauth
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
