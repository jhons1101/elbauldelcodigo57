<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>Temas | {{ config('app.name') }}</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="{{ asset('/img/claves-elbauldelcodigo_ico.png') }}" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="{{ asset('/materialize/css/materialize.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
        <link rel="stylesheet" href="{{ asset('/fonts/style.css') }}">

        <meta name="description" content="El baúl del código es un sitio web gratuito de programación, preguntas, foros temas, novedades, actualidad tecnológica, que esperas suscríbete!">
        <meta name="keywords" content="el baul del codigo, elbauldelcodigo, jhons1101, www.elBaulDelCodigo.com">

        <meta property="og:title" content="elbauldelcodigo">
        <meta property="og:site_name" content="elbauldelcodigo">
        <meta property="og:url" content="www.elbauldelcodigo.com">
        <meta property="og:description" content="El baúl del código es un sitio web gratuito de programación, preguntas, foros temas, novedades, actualidad tecnológica, que esperas suscríbete!">
        <meta property="og:image" content="{{ asset('/img/elbauldelcodigo.com_front_2.png') }}" />
        <meta property="fb:app_id" content="1386964998221435">
        <meta property="og:type" content="website">

        <meta name="copyright" content="Copyright © 2014 elbauldelcodigo.com">
        <meta name="author" content="jhons1101">
        <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="{{ asset('/img/elbauldelcodigo.com_front_2.png') }}" rel="image_src" />
        <link href='https://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>

        <style>
            .resaltadoRojo {
                color: #E83333;
                background: rgb(254, 246, 246) none repeat scroll 0% 0%;
                border: 1px solid #F9DFE5;
                padding:10px 15px;
            }
        </style>
    </head>
    <body>
        <script type="text/javascript">
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-81299925-1', 'auto');
            ga('send', 'pageview');
        </script>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-1633769788245402",
                enable_page_level_ads: true
            });
        </script>
                @yield('header')
        <div class="container">
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col s12 m12 l9">
                    <div class="row">
                        <div class="s12 m12 l12">
                            @yield('post')
                        </div>
                    </div>
                </div>
                <div class="col s12 m12 l3"><!-- aqui en contenido derecho o contenido de menús -->
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="card-panel grey lighten-5 z-depth-2">
                                <div class="row">
                                    @yield('autor')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br /><br />
        @yield('footer')
        <script src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('/materialize/js/materialize.min.js') }}"></script>
        <script src="{{ asset('/js/index.js') }}"></script>
    </body>
</html>