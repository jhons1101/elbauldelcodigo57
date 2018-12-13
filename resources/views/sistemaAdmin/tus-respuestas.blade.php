@extends('layout/admin')
<link rel="stylesheet" href="{{ asset('css/tus-respuestas.css') }}">
@section('seccion')
	Tus Respuestas
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
<?php $ultimaPos = array_pop($respuestas) ?>
{{ $ultimaPos->totPuntos }}
@stop
@section('sub-seccion')
Historial de Respuestas
@stop
@section('contenido')
<div id="TusRespuestas">
	<div class="danger">
		<i class="icon-notification"></i> &nbsp; &nbsp;
		<span>Aún no haz contestado ninguna pregunta, Intentalo.! le ayudas a alguien y ganas puntos.</span>
	</div>
	<section class="cuadroOpcion">
	      <div class="caja1">
	          <i class="icon-pushpin"></i>
	          <span class="cantRespuestas">125</span>
	          <span class="opcionRespuestas" title="Cantidad de Participaciones en elbauldelcodigo.com">Participaciones</span>
	      </div>
	      <div class="opcion">hygd s hgsddsggsfd</div>
	</section>
	<section class="cuadroOpcion">
          <div class="caja1">
              <i class="icon-star-half"></i>
              <span class="cantRespuestas">8</span>
              <span class="opcionRespuestas" title="Escogiste post de tu interés">Favoritos</span>
          </div>
          <div class="opcion">hygd s hgsddsggsfd</div>
    </section>
    <section class="cuadroOpcion">
        <div class="caja1">
            <i class="icon-heart"></i>  
            <span class="cantRespuestas">25</span>
            <span class="opcionRespuestas" title="Escogida como mejor calificación">Preferidas</span>
        </div>
        <div class="opcion">hygd s hgsddsggsfd</div>
    </section>
    <span class="MasPreguntas">
        <i class="icon-compass"></i> &nbsp; &nbsp;
        <span>Buscar mas preguntas....... <sup>**</sup> </span>
    </span>

	@foreach ($respuestas as $element)
		<div class="bloque-respuestas">
			<div class="nomPregunta">{{ $element->preguntas_txt}}</div>
			<div class="cadaResp">
	             <div class="img-R"><i class="icon-newspaper"></i></div>
	             <div class="name-post">{{ $element->respuestas_txt}}</div>
	        </div>
	        <div class="cant-point">
	        	Puntos Ganados:  <sup>{{ $element->respuestas_ptos}}</sup> &nbsp; 
	        	<span> Fecha : <span>{{ $element->respuestas_fecha}}</span></span>
	        </div>
        </div>
	@endforeach
</div>
@stop