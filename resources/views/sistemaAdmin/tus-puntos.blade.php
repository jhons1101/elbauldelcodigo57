@extends('layout/admin')
<link rel="stylesheet" href="{{ asset('css/tus-puntos.css') }}">
@section('seccion')
	Tus Puntos
@stop
@section('DescAdmin')
	Tienes tus puntos acumulados, puedes canjearlos por interesantes libros en formato pdf, asesorias en tus proyectos y démas premios interesantes
	para que mejores como desarrollador web y puedas emprender tu propia empresa.!
@stop
@section('AdminKeywords')
	tus, puntos, el, baul, del, codigo, desarrollo, web, programacion, javascript, php, laravel, flat, design,mysql, oracle, php5
@stop
@section('img-usuario')
1
@stop
@section('img-seccion')
icon-lifebuoy
@stop
@section('nom-usuario')
steven vargas
@stop
@section('cant-puntos')
<?php $ultimaPos = array_pop($puntos) ?>
{{ $ultimaPos->totPuntos }}
@stop
@section('sub-seccion')
Historial de Puntos
@stop
@section('contenido')
<div id="Puntos">
	@foreach ($puntos as $element)
		<section>
           <div class="txtTemaPostF">{{$element->respuestas_fecha}}</div>
           <div class="txtTemaPostC"><b>Ganaste : {{ $element->respuestas_ptos }}</b> <b><small>Pt</small></b></div>
           <div class="txtTemaPost">
                <a href="#" target="_blank">{{ $element->respuestas_txt }}</a>
           </div>
           <img src="{{ asset('img/BaulCode.png') }}" alt="Tema del Post" class="idTemaPost">
      </section>
	@endforeach
</div>
@stop