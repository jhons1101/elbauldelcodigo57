<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<title>Crear nueva entrada | {{ config('app.name') }}</title><meta charset="UTF-8">
        <link rel="shortcut icon" href="{{ asset('/img/claves-elbauldelcodigo_ico.png') }}" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="{{ asset('/css/materialize.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
        <link rel="stylesheet" href="{{ asset('/fonts/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/print-index.css') }}" type="text/css" media="print" />
        <link rel="image_src"  href="https://fonts.googleapis.com/css?family=Poiret+One">
        <link rel="image_src"  href="https://fonts.googleapis.com/css?family=Kavivanar|Pacifico">
	</head>
	<body>
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
		<div class="container">
            <div class="row">&nbsp;</div>
			@yield('content')
        </div>
        <script src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('/materialize/js/bin/materialize.min.js') }}"></script>
        <script src="{{ asset('/js/index.js') }}"></script>
        <script type="text/javascript">
            @yield('javascript')
        </script>
	</body>
</html>