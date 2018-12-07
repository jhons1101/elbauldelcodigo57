@extends('layout.plantilla_post')
@extends('layout.plantilla_header')
@extends('layout.plantilla_footer')

@section('img-for-share')
    <!--<meta property="og:image" content="{{ asset('/img/curso-de-plsql-elbauldelcodigo.jpg') }}" />
    <link href="{{ asset('/img/curso-de-plsql-elbauldelcodigo.jpg') }}" rel="image_src" />
    <link href="{{ asset('/img/curso-de-plsql-elbauldelcodigo.jpg') }}" rel="image_src" />
    <meta name="twitter:image" content="{{ asset('/img/curso-de-plsql-elbauldelcodigo.jpg') }}">
    <meta name="twitter:image" content="{{ asset('/img/curso-de-plsql-elbauldelcodigo.jpg') }}">-->
    <!-- Resumen de la tarjeta de Twitter con la imagen grande debe ser al menos 280x150px -->
    <!--<meta name="twitter:image:src" content="{{ asset('/img/curso-de-plsql-elbauldelcodigo.jpg') }}">
    <meta name="twitter:image:src" content="{{ asset('/img/curso-de-plsql-elbauldelcodigo.jpg') }}">
    <meta itemprop="image" content="{{ asset('/img/curso-de-plsql-elbauldelcodigo.jpg') }}">
    <meta itemprop="image" content="{{ asset('/img/curso-de-plsql-elbauldelcodigo.jpg') }}">-->
@stop

@section('PostContent')
<h2>Que es PL / SQL</h2>
<div class="justificado">
Es una extensión de OracleSQL, es un lenguaje de programación de cuarta generación avanzada(4GL) muy poderoso lenguaje orientado a conjuntos. Ofrece funciones de ingeniería de software, tales como la encapsulación de datos, la sobre carga de información, tipos de colección de datos, excepciones, y la ocultación de información. soporta la creación de prototipos. Cuyo único propósito es manipular el contenido de bases de datos.
</div>
<br />
<h2>A quien va dirigido este curso</h2>
<div class="justificado">
	Este curso está dirigido a programadores, analistas de sistemas, administradores de proyectos, administradores de bases de datos y otras personas que necesitan automatizar las operaciones de base de datos, personas que desarrollan aplicaciones en otros idiomas.
</div>
@stop

@section('CodigoFte')
<p></p>
@stop
