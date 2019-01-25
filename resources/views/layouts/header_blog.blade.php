@section('header')
<nav>
    <div class="nav-wrapper">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        <a class="navbar-brand hide-on-med-and-down" href="{{ asset('/') }}">
            <img src="{{ asset('img/claves-elbauldelcodigo-color.png') }}" class="logo-blog" alt="elbauldelCodigo.com" title="Inicio de ElbauldelCodigo.com" class="logo_TC" />
        </a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/post">{{ ucfirst(trans('message.post')) }}</a></li>
            @if (Auth::guest())
                <li><a href="{{ asset('/login') }}">{{ trans('message.login') }}</a></li>
                <li><a href="{{ asset('/register') }}">{{ trans('message.register') }}</a></li>
            @else
                <li><a href="/home">{{ trans('message.seccionHome') }}</a></li>
            @endif
            <li><a href="/contacto">{{ trans('message.contact') }}</a></li>
        </ul>
    </div>
</nav>
@endsection
