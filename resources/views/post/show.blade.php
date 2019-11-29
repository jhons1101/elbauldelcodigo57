@extends('layouts.plantilla_post')
@extends('layouts.plantilla_header')
@extends('layouts.plantilla_footer')

{{-- <!-- sección de imagenes para cada post --> --}}
@section('img-for-share')
    <meta property="og:image" content="{{ asset('img/post') }}/{{ slugify($post->post_tit) }}.jpg" />
    <link href="{{ asset('img/post') }}/{{ slugify($post->post_tit) }}.jpg" rel="image_src" />
    <link href="{{ asset('img/post') }}/{{ slugify($post->post_tit) }}.jpg" rel="image_src" />
    <meta name="twitter:image" content="{{ asset('img/post') }}/{{ slugify($post->post_tit) }}.jpg">
    <meta name="twitter:image" content="{{ asset('img/post') }}/{{ slugify($post->post_tit) }}.jpg">
    {{-- <!-- Resumen de la tarjeta de Twitter con la imagen grande debe ser al menos 280x150px --> --}}
    <meta name="twitter:image:src" content="{{ asset('img/post') }}/{{ slugify($post->post_tit) }}.jpg">
    <meta name="twitter:image:src" content="{{ asset('img/post') }}/{{ slugify($post->post_tit) }}.jpg">
    <meta itemprop="image" content="{{ asset('img/post') }}/{{ slugify($post->post_tit) }}.jpg">
    <meta itemprop="image" content="{{ asset('img/post') }}/{{ slugify($post->post_tit) }}.jpg">
@stop


{{-- <!-- sección de javascript propios del post --> --}}
@section('javascript')
<script type="text/javascript"></script>
@stop


{{-- <!-- sección de css propios de este post --> --}}
@section('css')
<style>
    img{cursor: pointer;} #txtPrueba {
        max-width: 90%;
        max-height : 100px;
    }

    #noResize {
    resize:none;
    }
</style>
@stop


{{-- <!-- sección para pintar el listado de las descriciones de los post --> --}}
@section('TagsPost')
    @foreach($txtTags as $tag)
        <a href="{{ asset('tema/'.$tag.'') }}" target="_blank"><span class="icon-price-tag"></span> {{ $tag }}</a> &nbsp;  &nbsp;
    @endforeach
@stop

{{-- <!-- sección para el contenido introductorio del post --> --}}
@section('PostContent')
{!! html_entity_decode($post->desc_post, ENT_QUOTES, 'UTF-8') !!}
@stop


{{-- <!-- sección para definir el código fuente y los detalles del post --> --}}
@section('CodigoFte')
{!! html_entity_decode($post->desc_code, ENT_QUOTES, 'UTF-8') !!}
@stop
