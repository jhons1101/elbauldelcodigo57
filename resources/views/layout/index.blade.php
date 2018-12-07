<!DOCTYPE html>
<html lang="es">
    <head>
        <title>El baúl del código</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="/img/claves-elbauldelcodigo_ico.png" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="/materialize/css/materialize.min.css">
        <link rel="stylesheet" href="/css/index.css">
        <link rel="stylesheet" href="/fonts/style.css">
        <link rel="stylesheet" href="/css/print-index.css" type="text/css" media="print" />
        <link rel="image_src"  href="/resources/img/elbauldelcodigo.com_front_2.png" />
        <link rel="image_src"  href="https://fonts.googleapis.com/css?family=Poiret+One">
        <link rel="image_src"  href="https://fonts.googleapis.com/css?family=Kavivanar|Pacifico">
        
        <meta name="description" content="Sitio web de código web gratuito, preguntas, foros temas, novedades, actualidad tecnológica, que esperas suscríbete!">
        <meta name="keywords" content="el baul del codigo, elbauldelcodigo, jhons1101, www.elBaulDelCodigo.com">
        <meta name="copyright" content="Copyright © 2014 elbauldelcodigo.com">
        <meta name="author" content="jhons1101">
        <meta name="theme-color" content="#ffffff">
        
        <meta property="og:title" content="elbauldelcodigo">
        <meta property="og:site_name" content="elbauldelcodigo">
        <meta property="og:url" content="www.elbauldelcodigo.com">
        <meta property="og:description" content="Sitio web de código gratuito, preguntas, foros temas, novedades, actualidad tecnológica, que esperas suscríbete!">
        <meta property="og:image" content="/img/elbauldelcodigo.com_front_2.png" />
        <meta property="fb:app_id" content="1386964998221435">
        <meta property="og:type" content="website">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-1633769788245402",
                enable_page_level_ads: true
            });
        </script>
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
        @yield('header')
        <div class="container">
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col s12 m12 l9">
                    <div class="row bottomCero">
                        <div class="paginadorI">
                            <ul class="pagination">							
                                <li class="waves-effect"><a href="1') }}"><i class="icon-circle-left"></i></a></li>
                                @for ($i = 0; $i < $cantidadPag; $i++)
                                <li class="waves-effect"><a href="') }}{{intval($i)+1}}">{{ intval($i)+1 }}</a></li>
                                @endfor
                                <li class="waves-effect"><a href="') }}{{$cantidadPag}}"><i class="icon-circle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="s12 m12 l12">
                            @yield('post')
                            @if ($errores != '')
                            <div class="resaltadoRojo">{{$errores}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row bottomCero">
                        <div class="paginadorF">
                            <ul class="pagination">
                                <li class="waves-effect"><a href="1') }}"><i class="icon-circle-left"></i></a></li>
                                @for ($i = 0; $i < $cantidadPag; $i++)
                                <li class="waves-effect"><a href="') }}{{intval($i)+1}}">{{ intval($i)+1 }}</a></li>
                                @endfor
                                <li class="waves-effect"><a href="') }}{{$cantidadPag}}"><i class="icon-circle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col s12 m12 l3">
                    <div class="row">
                        @yield('autor')                        
                    </div>
                    <br />
                    <div class="row">
                        @yield('tematica')                        
                    </div>
                </div>
            </div>
        </div>
        <br /><br />
        @yield('footer2')
        <script src="/js/jquery-1.11.1.min.js"></script>
        <script src="/materialize/js/materialize.min.js"></script>
        <script src="/js/index.js"></script>
    </body>
</html>