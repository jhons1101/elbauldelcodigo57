<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/admin.png') }}" type="image/png" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('seccionApp') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('materialize/css/materialize.min.css') }}" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Nunito,sans-serif;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background: #c3ede9 url(/img/fondo_sesion.jpg) repeat-x scroll center center !important;
        }
        .ancho100 {
            width:100%;
        }
        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: #00adb5;
            color: white;
            font-size: 19px;
            border-bottom: 1px solid rgba(0,0,0,.125);
        }
        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;
        }
        .btn {
            padding:10px !important;
        }
        .padding10 {
            padding: 10px;
        }
    </style>
    @yield('css')

    <!-- Scripts -->
    <script src="{{ asset('materialize/js/materialize.min.js') }}" defer></script>
</head>
<body>
    {{-- <div id="app"> --}}
        @yield('content')
    {{-- </div> --}}
</body>
</html>
