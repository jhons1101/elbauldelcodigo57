<!DOCTYPE html> 
<html lang="es"> 
    <head>
        <title>@yield('seccion')/ El baúl del código</title>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="{{ asset('/') }}img/BaulCode.png" type="image/png" />
        <meta content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes" name="viewport">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('/fonts/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/nav.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/materialize.css') }}">
    </head>   
    <body>
        <input type="checkbox" id="nav-toggle" />
        <nav class="nav">
            <div class="nav-div">
                <label for="nav-toggle" class="nav-toggle" onclick>☰</label>
                <ul class="ul">
                    <li class="nav-ul-li"><a class="nav-ul-a" href=""><span class="nav-ul-li-span">El baúl del código</span></a></li>
                    <li class="nav-ul-li"><a class="nav-ul-a" href="tus-puntos"><i class="icon-lifebuoy"></i>&nbsp; Tus Puntos</a></li>
                    <li class="nav-ul-li"><a class="nav-ul-a" href="tus-preguntas"><i class="icon-notification"></i>&nbsp; Tus Preguntas</a></li>
                    <li class="nav-ul-li"><a class="nav-ul-a" href="tus-respuestas"><i class="icon-compass"></i>&nbsp; Tus Respuestas</a></li>
                    <li class="nav-ul-li"><a class="nav-ul-a" href="dudas"><i class="icon-question"></i>&nbsp; ¿ Alguna Pregunta.?</a></li>
                    <li class="nav-ul-li"><a class="nav-ul-a" href="reponde"><i class="icon-checkmark2"></i>&nbsp; Responder</a></li>
                    <li class="nav-ul-li"><a class="nav-ul-a" href="estadisticas"><i class="icon-stats-dots"></i>&nbsp; Estadisticas</a></li>
                    <li class="nav-ul-li"><a class="nav-ul-a" href="linea-de-tiempo"><i class="icon-hour-glass"></i>&nbsp; linea de Tiempo</a></li>
                    <li class="nav-ul-li"><a class="nav-ul-a" href="favoritos"><i class="icon-star-half"></i>&nbsp; Favoritos</a></li>
                    <li class="nav-ul-li"><a class="nav-ul-a" href="configuracion"><i class="icon-cogs"></i>&nbsp; Configuración</a></li>
                </ul>
                <div class="nav-div-footer">
                    <img src="{{ asset('/') }}img/usuarios/@yield('img-usuario').jpg" alt="usuario nombre" class="nav-div-img">
                    <span class="nav-div-span">Usuario</span>
                </div>
            </div>
        </nav>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Logo</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
            </div>
        </nav>
        <div class="contenedor">
        {{-- <header>
            <img src="{{ asset('/img/cielo3.jpg') }}" alt="Fondo del laboratorio web" class="header-fondo">
            <div class="header-estado">&nbsp;</div>
            <div class="header-seccion">@yield('seccion')</div>
            <img src="{{ asset('/') }}img/usuarios/img_default.png" alt="Nombre de usuario" class="header-img-user">
            <div class="header-imagen" title="Sección Actual"><i class="@yield('seccion')"></i></div>
            <div class="header-usuario" style="color:#212929;">usuario desconocido</div>
            <button class="header-puntos">Puntos Acumulados : 12</button>
        </header>
            <div class="conexion">
                <button class="modo-aleatorio">@yield('sub-seccion')</button>
            </div> --}}
            @yield('contenido')
            {{-- <br /><br /><br /><br /><br /> --}}
        </div>
        @yield('footer')
        <script type="text/javascript" src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('/js/admin.js') }}"></script>
        <script src="{{ asset('/js/modernizr.js') }}"></script>
        <script src="{{ asset('/materialize/js/materialize.min.js') }}"></script>
        <script type="text/javascript">
            @yield('javascript')
        </script>
    </body>
</html>