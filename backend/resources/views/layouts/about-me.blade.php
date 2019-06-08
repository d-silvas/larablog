<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        a.btn-info, button.btn-info {
            color: #fff;
        }
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
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
