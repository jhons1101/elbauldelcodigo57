<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ asset('img/claves-elbauldelcodigo_ico.png') }}" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/materialize/css/materialize.min.css">
    <link rel="image_src"  href="/resources/img/elbauldelcodigo.com_front_2.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/fonts/style.css">
    <link rel="stylesheet" href="{{{ asset('/css/index.css')   }}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog elbauldelcodigo</title>
    <style>
        .logo-blog {
            width: 140px;
            max-height: 55px;
            position: relative;
            top: 5px;
        }
        .social-feed {
            font-size: 35px;
        }
        .border-bottom {
            border-bottom: 1px solid #3a3939;
        }
        footer.page-footer {
            background-color: #313131 !important;
        }
        footer.page-footer .footer-copyright {
            background-color: #2f2e2e !important;
        }
        body {
            background-color: #FCFCFC;
        }
        nav {
            background-color: #fff;
        }
        nav ul a, nav .button-collapse {
            color: #2f2e2e;
        }
        nav img {
            filter: grayscale(42);
            -webkit-filter: grayscale(42);
        }
        .blog img {
            border-radius: 4px;
        }
        .blog-title {
            color: #53575A;
            margin: 0;
            font-size: 20px;
            font-weight: 600;
            word-break: break-all;
        }
        .blog-option {
            color: #BABDBF;
            font-size: 17px;
            word-break: break-all;
        }
        .blog-desc {
            font-size: 15px;
            font-weight: 300;
            color: #53575A;
            word-break: break-all;
            text-align: justify;
            word-break: break-all;
        }
        .lomasleido {
            border-bottom: 1px solid #e4dfdf;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: 600;
            word-break: break-all;
        }
        .blog-option.user {
            font-style: italic;
        }
        .topImage img {
            padding-top: 10px;
        }
        .blog-option.fecha {
            padding: 5px;
        }
        .top-blog-title {
            color: #53575A;
            margin: 0;
            font-size: 14px;
            font-weight: 600;
            text-align: justify;
        }
        .top-blog-desc {
            font-size: 13px;
            font-weight: 300;
            color: #53575A;
            word-break: break-all;
            text-align: justify;
        }
        .card-panel{
            padding: 24px;
        }
        .ancho100 {
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2'; fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
    @yield('header')
    <div class="container">
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col s12 m12 l12">
                {!! $errors->first('msg', '<div class="card-panel red-text red lighten-5 red text-darken-4">:message</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                @include('partials.errors')
            </div>
        </div>
        <div class="row">
            @yield('content')
        </div>
    </div>
    @yield('footer')
    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/materialize/js/materialize.min.js"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>