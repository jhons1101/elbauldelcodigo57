@section('header')
    <style>
        .liamobile {
            line-height: 1;
        }
        .inline-block {
            display: inline-block;
        }
    </style>
    <header class="header">
        @include('partials.lang')
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                <ul class="hide-on-med-and-down">
                    <li class="li-logo">
                        <a class="navbar-brand" href="{{ asset('/') }}">
                            <img src="/img/claves-elbauldelcodigo.png" alt="ElbauldelCodigo.com" title="Ir al inicio de ElbauldelCodigo.com" class="logo_TC" />
                        </a>
                    </li>
                    <li><h1><a href="{{ asset('/') }}" class="txtWhite"><b>{{ config('app.name') }}</b></a></h1></li>
                    <li>
                        <a href="https://www.facebook.com/groups/1820752601515497/" class="txtWhite" target="_blank">
                            {{ trans('message.groupFB') }}
                        </a>
                    </li>
                    @if (Auth::guest())
                        {{-- <li><a href="{{ asset('/login') }}" class="txtWhite">{{ trans('message.login') }}</a></li> --}}
                        {{-- <li><a href="{{ asset('/register') }}" class="txtWhite">{{ trans('message.register') }}</a></li> --}}
                        <li><a href="{{ asset('/contacto') }}" class="txtWhite">{{ trans('message.contact') }}</a></li>
                    @else
                        <li><a href="{{ asset('/home') }}" class="txtWhite">{{ trans('message.seccionHome') }}</a></li>
                    @endif
                    <li><a href="{{ asset('/blog') }}" class="txtWhite">{{ trans('message.blog') }}</a></li>
                    @if (!Auth::guest())
                    <li>
                        <a href="/logout" class="txtWhite" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ trans('message.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endif
                </ul>
                {{-- MOBILE --}}
                <ul class="side-nav" id="mobile-demo">
                    <li class="li-svg">
                        <a class="navbar-brand" href="{{ asset('/') }}">
                            <img src="{{ asset('/') }}img/claves-elbauldelcodigo.png" alt="ElbauldelCodigo.com" title="Ir al inicio de ElbauldelCodigo.com" class="logo_mb" />
                        </a>
                    </li>
                    <li class="aMovil liamobile inline-block">
                        <a href="https://www.facebook.com/groups/1820752601515497/" target="_blank">
                            {{ trans('message.groupFB') }}
                        </a>
                    </li>
                    <li class="liamobile"><a href="{{ asset('/blog') }}">{{ trans('message.blog') }}</a></li>
                    @if (Auth::guest())
                        {{-- <li class="liamobile"><a href="{{ asset('/login') }}">{{ trans('message.login') }}</a></li> --}}
                        {{-- <li class="liamobile"><a href="{{ asset('/register') }}">{{ trans('message.register') }}</a></li> --}}
                        <li class="liamobile"><a class="aMovil" href="{{ asset('/contacto') }}">{{ trans('message.contact') }}</a></li>
                    @else
                        {{-- <li class="liamobile"><a href="{{ asset('/home') }}">{{ trans('message.contact') }}</a></li> --}}
                    @endif
                    <li class="liamobile">
                        <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ trans('message.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
@stop
