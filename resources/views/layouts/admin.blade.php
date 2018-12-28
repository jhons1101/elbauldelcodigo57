<!DOCTYPE html> 
<html lang="{{ config('app.locale') }}"> 
    <head>
        <title>@yield('seccion') / {{ config('app.name') }}</title>
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
        <link rel="stylesheet" href="{{ asset('/css/tablas-responsive.css') }}">
        <style>
        .nav-navigation {
            overflow-y: auto;
            height: 84%;
        }
        .nav-ul-li-span {
            display: inline-block !important; 
            line-height: 56px !important;
            font-size: 1rem !important;
        }
        .labeltxt {
            font-weight:700;
            color:rgba(0,0,0,.87);
            text-transform: uppercase;
        }
        textarea {
            padding:20px;
            color:#909090;
        }
        </style>
        @yield('css')
    </head>   
    <body>
        <input type="checkbox" id="nav-toggle" class="hide"/>
        <nav class="nav">
            <div class="nav-div nav-navigation">
                <label for="nav-toggle" class="nav-toggle" onclick>☰</label>
                <ul class="ul">
                    <li>
                        <a href="">
                            <span class="nav-ul-li-span">{{ trans('message.appName') }}</span>
                        </a>
                    </li>
                    @if ($roles->rol_user_id == 1 || $roles->rol_user_id == 2)
                    <li>
                        <a href="tus-puntos">
                            <i class="icon-lifebuoy nav-ul-li-span"></i>&nbsp; {{ trans('message.points') }}
                        </a>
                    </li>
                    <li>
                        <a href="tus-preguntas">
                            <i class="icon-notification nav-ul-li-span"></i>&nbsp; {{ trans('message.questions') }}
                        </a>
                    </li>
                    <li>
                        <a href="tus-respuestas">
                            <i class="icon-compass nav-ul-li-span"></i>&nbsp; {{ trans('message.answers') }}
                        </a>
                    </li>
                    <li>
                        <a href="dudas">
                            <i class="icon-question nav-ul-li-span"></i>&nbsp; {{ trans('message.needHelp') }}
                        </a>
                    </li>
                    <li>
                        <a href="reponde">
                            <i class="icon-checkmark2 nav-ul-li-span"></i>&nbsp; {{ trans('message.reply') }}
                        </a>
                    </li>
                    <li>
                        <a href="estadisticas">
                            <i class="icon-stats-dots nav-ul-li-span"></i>&nbsp; {{ trans('message.statistics') }}
                        </a>
                    </li>
                    <li>
                        <a href="linea-de-tiempo">
                            <i class="icon-hour-glass nav-ul-li-span"></i>&nbsp; {{ trans('message.timeline') }}
                        </a>
                    </li>
                    <li>
                        <a href="favoritos">
                            <i class="icon-star-half nav-ul-li-span"></i>&nbsp; {{ trans('message.favorites') }}
                        </a>
                    </li>
                    @endif
                    @if ($roles->rol_user_id == 1)
                    <li>
                        <a href="configuracion">
                            <i class="icon-cogs nav-ul-li-span"></i>&nbsp; {{ trans('message.configuration') }}
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="nav-div-footer">
                <img src="{{ asset('/') }}img/usuarios/{{$user->img}}" alt="{{ Auth::user()->name }}" class="nav-div-img">
                <span class="nav-div-span">{{ Auth::user()->name }}</span>
            </div>
        </nav>
        <nav>
            <div class="nav-wrapper">
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                @if (Auth::guest())
                    <li><a href="/login">{{ trans('message.login') }}</a></li>
                    <li><a href="/register">{{ trans('message.register') }}</a></li>
                @else
                    @if ($roles->rol_user_id == 1)
                    <li><a href="/home/">{{ trans('message.seccionHome') }}</a></li>
                    <li><a href="/post/create">{{ trans('message.publish') }}</a></li>
                    <li><a href="/rol/create">{{ trans('message.roles') }}</a></li>
                    <li><a href="/post/showUser">{{ trans('message.publications') }}</a></li>
                    @endif
                    <li>
                        <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ trans('message.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
                </ul>
            </div>
        </nav>
        <div class="contenedor">
            <header>
                <div class="header-estado">&nbsp;</div>
                <div class="header-seccion">@yield('seccion')</div>
                @yield('header')
            </header>
            {!! $errors->first('msg', '<div class="card-panel red-text red lighten-5 red text-darken-4">:message</div>') !!}
            @include('partials.errors')
            @yield('contenido')
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