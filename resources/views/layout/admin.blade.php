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
        <nav class="nav" style="overflow-y: autoo;">
            <div class="nav-div">
                <label for="nav-toggle" class="nav-toggle" onclick>☰</label>
                <ul class="ul">
                    <li>
                        <a href="">
                            <span class="nav-ul-li-span" style="display: unset;">El baúl del código</span>
                        </a>
                    </li>
                    <li>
                        <a href="tus-puntos">
                            <i class="icon-lifebuoy" style="display: unset;"></i>&nbsp; Tus Puntos
                        </a>
                    </li>
                    <li>
                        <a href="tus-preguntas">
                            <i class="icon-notification" style="display: unset;"></i>&nbsp; Tus Preguntas
                        </a>
                    </li>
                    <li>
                        <a href="tus-respuestas">
                            <i class="icon-compass" style="display: unset;"></i>&nbsp; Tus Respuestas
                        </a>
                    </li>
                    <li>
                        <a href="dudas">
                            <i class="icon-question" style="display: unset;"></i>&nbsp; ¿ Necesitas ayuda.? Pregunta ahora!
                        </a>
                    </li>
                    <li>
                        <a href="reponde">
                            <i class="icon-checkmark2" style="display: unset;"></i>&nbsp; Responder
                        </a>
                    </li>
                    {{-- <li>
                        <a href="estadisticas">
                            <i class="icon-stats-dots" style="display: unset;"></i>&nbsp; Estadisticas
                        </a>
                    </li>
                    <li>
                        <a href="linea-de-tiempo">
                            <i class="icon-hour-glass" style="display: unset;"></i>&nbsp; linea de Tiempo
                        </a>
                    </li> --}}
                    <li>
                        <a href="favoritos">
                            <i class="icon-star-half" style="display: unset;"></i>&nbsp; Favoritos
                        </a>
                    </li>
                    <li>
                        <a href="configuracion">
                            <i class="icon-cogs" style="display: unset;"></i>&nbsp; Configuración
                        </a>
                    </li>
                </ul>
                <div class="nav-div-footer">
                    <img src="{{ asset('/') }}img/usuarios/img_default.png" alt="usuario nombre" class="nav-div-img">
                    <span class="nav-div-span">Usuario</span>
                </div>
            </div>
        </nav>
        <nav>
            <div class="nav-wrapper">
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/admin/">Administrar</a></li>
                    <li><a href="/post/create">Publicar</a></li>
                    <li><a href="/post/showUser">Mis publicaciones</a></li>
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
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script type="text/javascript">
            @yield('javascript')
        </script>
    </body>
</html>