@section('header')
<style>
    .liamobile {
        line-height: 1;
    }
    .inline-block {
        display: inline-block;
    }
</style>
<nav>
    <div class="nav-wrapper">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        <a class="navbar-brand hide-on-med-and-down" href="{{ asset('/') }}">
            <img src="{{ asset('img/claves-elbauldelcodigo-color.png') }}" class="logo-blog" alt="elbauldelCodigo.com" title="Inicio de ElbauldelCodigo.com" class="logo_TC" />
        </a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/post">{{ ucfirst(trans('message.post')) }}</a></li>
            @if (Auth::guest())
                {{-- <li><a href="{{ asset('/login') }}">{{ trans('message.login') }}</a></li> --}}
                {{-- <li><a href="{{ asset('/register') }}">{{ trans('message.register') }}</a></li> --}}
            @else
                <li><a href="/home">{{ trans('message.seccionHome') }}</a></li>
            @endif
            <li><a href="/contacto">{{ trans('message.contact') }}</a></li>
        </ul>
        {{-- MOBILE --}}
        <ul class="side-nav" id="mobile-demo">
            <li class="li-svg">
                <a class="navbar-brand" href="{{ asset('/') }}">
                    <img src="{{ asset('/') }}img/claves-elbauldelcodigo.png" alt="ElbauldelCodigo.com" title="Ir al inicio de ElbauldelCodigo.com" class="logo_mb" />
                </a>
            </li>
            <li class="aMovil liamobile inline-block">
                <a href="https://chat.whatsapp.com/IzwFOc8BbqpKcgEA9i3p33" target="_blank">
                    {{ trans('message.groupWS') }} {{ trans('message.celWS') }}
                </a>
            </li>
            <li class="aMovil liamobile inline-block">
                <a href="https://www.facebook.com/groups/1820752601515497/" target="_blank">
                    {{ trans('message.groupFB') }}
                </a>
            </li>
            {{-- <li class="liamobile"><a href="{{ asset('/foro') }}">{{ trans('message.foro') }}</a></li> --}}
            <li class="liamobile"><a href="{{ asset('/blog') }}">{{ trans('message.blog') }}</a></li>
            @if (Auth::guest())
            {{-- <li class="liamobile"><a href="{{ asset('/login') }}">{{ trans('message.login') }}</a></li> --}}
            {{-- <li class="liamobile"><a href="{{ asset('/register') }}">{{ trans('message.register') }}</a></li> --}}
            @else
            {{-- <li class="liamobile"><a href="{{ asset('/home') }}">{{ trans('message.contact') }}</a></li> --}}
            @endif
            <li class="liamobile"><a class="aMovil" href="{{ asset('/contacto') }}">{{ trans('message.contact') }}</a></li>
            {{-- <li class="liamobile">
                <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ trans('message.logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li> --}}
        </ul>
    </div>
</nav>
@endsection
