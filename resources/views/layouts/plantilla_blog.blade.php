<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/img/claves-elbauldelcodigo_ico.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/materialize/css/materialize.min.css">
    <link rel="image_src"  href="/resources/img/elbauldelcodigo.com_front_2.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/fonts/style.css">
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
        }
        .blog-option {
            color: #BABDBF;
            font-size: 17px;
        }
        .blog-desc {
            font-size: 15px;
            font-weight: 300;
            color: #53575A;
            word-break: break-all;
            text-align: justify;
        }
        .lomasleido {
            border-bottom: 1px solid #e4dfdf;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: 600;
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
    </style>
</head>
<body>
    @yield('header')
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
    @yield('footer')
    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/materialize/js/materialize.min.js"></script>
</body>
</html>