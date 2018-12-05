<!DOCTYPE html> 
<html lang="es"> 
    <head>
        <title>@yield('seccion')/ El baúl del código</title>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="{{ asset('/') }}img/BaulCode.png" type="image/png" />
        <meta name="description" content="Panel de administración de tu perfil en el bauldelcodigo.com">
        <meta name="keywords" content="tus, puntos, el, baul, del, codigo, desarrollo, web, programacion, javascript, php, laravel, flat, design,mysql, oracle, php5">
        <meta name="copyright" content="Copyright © 2014 elbauldelcodigo.com">
        <meta name="author" content="jhons1101">
        <meta name="theme-color" content="#ffffff">
        <meta content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes" name="viewport">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('/fonts/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/nav.css') }}">
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
        <header>
            <img src="{{ asset('/img/cielo3.jpg') }}" alt="Fondo del laboratorio web" class="header-fondo">
            <div class="header-estado">&nbsp;</div>
            <div class="header-seccion">@yield('seccion')</div>
            <img src="{{ asset('/') }}img/usuarios/@yield('img-usuario').jpg" alt="Nombre de usuario" class="header-img-user">
            <div class="header-imagen" title="Sección Actual"><i class="@yield('seccion')"></i></div>
            <div class="header-usuario" style="color:#212929;">@yield('nom-usuario')</div>
            <button class="header-puntos">Puntos Acumulados : @yield('cant-puntos')</button>
        </header>
        <div class="conexion">
            <button class="modo-aleatorio">@yield('sub-seccion')</button>
        </div>
        <div class="contenedor">
            @yield('contenido')
            <br /><br /><br /><br /><br />

        </div>
        @yield('footer')
        <script type="text/javascript" src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('/js/admin.js') }}"></script>
        <script src="{{ asset('/js/modernizr.js') }}"></script>
        <script src="{{ asset('/materialize/js/materialize.min.js') }}"></script>
    </body>
</html>