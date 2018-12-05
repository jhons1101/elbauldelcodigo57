<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Crear nueva entrada</title><meta charset="UTF-8">
        <link rel="shortcut icon" href="{{ asset('/img/claves-elbauldelcodigo_ico.png') }}" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="{{ asset('/materialize/css/materialize.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
        <link rel="stylesheet" href="{{ asset('/fonts/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/print-index.css') }}" type="text/css" media="print" />
        <link rel="image_src"  href="https://fonts.googleapis.com/css?family=Poiret+One">
        <link rel="image_src"  href="https://fonts.googleapis.com/css?family=Kavivanar|Pacifico">
	</head>
	<body>
		<div class="container">
			@yield('content')
        </div>
        <script src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('/materialize/js/materialize.min.js') }}"></script>
        <script src="{{ asset('/js/index.js') }}"></script>
	</body>
</html>