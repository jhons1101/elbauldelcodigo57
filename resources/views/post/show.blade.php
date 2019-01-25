@extends('layouts.plantilla_post')
@extends('layouts.plantilla_header')
@extends('layouts.plantilla_footer')


<!-- sección de imagenes para cada post -->
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


<!-- sección de javascript propios del post -->
@section('javascript')
<script type="text/javascript"></script>
@stop


<!-- sección de css propios de este post -->
@section('css')

@stop


<!-- sección para pintar el listado de las descriciones de los post -->
@section('TagsPost')
    @foreach($txtTags as $tag)
        <a href="/tags/{{ $tag }}" target="_blank"> {{ $tag }} </a>
    @endforeach
@stop

<!-- sección para el contenido introductorio del post -->
@section('PostContent')
{!! html_entity_decode($Posts[0]->desc_post, ENT_QUOTES, 'UTF-8') !!}
@stop


<!-- sección para definir el código fuente y los detalles del post -->
@section('CodigoFte')
{!! html_entity_decode($Posts[0]->desc_code, ENT_QUOTES, 'UTF-8') !!}
@stop
