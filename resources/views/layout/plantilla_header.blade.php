@section('header')
    <header class="header">
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                <ul class="hide-on-med-and-down">
                    <li class="li-logo">
                        <a class="navbar-brand" href="{{ asset('/') }}">
                            <img src="/img/claves-elbauldelcodigo.png" alt="ElbauldelCodigo.com" title="Ir al inicio de ElbauldelCodigo.com" class="logo_TC" />
                        </a>
                    </li>
                    <li><h1><a href="{{ asset('/') }}" class="txtWhite"><b>Elbauldelcodigo</b></a></h1></li>
                    <!--<li><a href="{{ asset('/foro') }}" class="txtWhite">Foro</a></li>
                    <li><a href="{{ asset('/admin') }}" class="txtWhite">Inicia Sesión</a></li>-->
                    <li><a href="{{ asset('/contacto') }}" class="txtWhite">Contacto</a></li>
                    <li class="txtWhite">Unete al grupo de whatsApp +57 316 392 6456</li>
                    <li>
                        <a href="https://www.facebook.com/groups/1820752601515497/" class="txtWhite" target="_blank">
                            Sigue el grupo en facebook
                        </a>
                    </li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li class="li-svg">
                        <a class="navbar-brand" href="{{ asset('/') }}">
                            <img src="/img/claves-elbauldelcodigo.png" alt="ElbauldelCodigo.com" title="Ir al inicio de ElbauldelCodigo.com" class="logo_mb" />
                        </a>
                    </li>
                    <!--<li><a href="{{ asset('/foro') }}">Foro</a></li>
                    <li><a href="{{ asset('/admin') }}">Inicia Sesion</a></li>-->
                    <li><a class="aMovil" href="{{ asset('/contacto') }}">Contacto</a></li>
                    <li class="aMovil">WhatsApp +57 316 392 6456</li>
                    <li>
                        <a href="https://www.facebook.com/groups/1820752601515497/" class="aMovil" target="_blank">
                            Sigue el grupo en facebook
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
@stop
