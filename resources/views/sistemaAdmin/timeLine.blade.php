@extends('layouts/admin')
<link rel="stylesheet" href="{{ asset('css/tus-respuestas.css') }}">
@section('seccion')
	Linea de Tiempo
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
icon-clock
@stop
@section('nom-usuario')
steven vargas
@stop
@section('cant-puntos')
<?php $ultimaPos = array_pop($respuestas) ?>
{{ $ultimaPos->totPuntos }}
@stop
@section('sub-seccion')
Linea de Tiempo
@stop
@section('contenido')
<div id="TimeLine">
	
	<div class="view">
	<div class="card__full">
		<div class="card__full-top">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
					<path d="M16.59 8.59l-4.59 4.58-4.59-4.58-1.41 1.41 6 6 6-6z"/>
					<path d="M0 0h24v24h-24z" fill="none"/>
			</svg>
			<span class="card__full-num"></span>
		</div>
		<div class="card__full-bottom">
			<p class="card__full-handle"></p>
			<p class="card__full-info"></p>
		</div>
	</div>
	<ul class="card__list">
		<li class="card__item card__item--blue">
			<div class="card__info">
				<div class="info-player">
					<p class="info-player__num">9</p>
					<p class="info-player__name"><small>Tony</small><br>Romo</p>
				</div>
				<div class="info-place">1<sup>st</sup></div>
			</div>
		</li>
		<li class="card__item card__item--purple">
			<div class="card__info">
				<div class="info-player">
					<p class="info-player__num">18</p>
					<p class="info-player__name"><small>Tom</small><br>Brady</p>
				</div>
				<div class="info-place">2<sup>nd</sup></div>
			</div>
		</li>
		<li class="card__item card__item--green">
			<div class="card__info">
				<div class="info-player">
					<p class="info-player__num">12</p>
					<p class="info-player__name"><small>Aaron</small><br>Rogers</p>
				</div>
				<div class="info-place">3<sup>rd</sup></div>
			</div>
		</li>
		<li class="card__item card__item--yellow">
			<div class="card__info">
				<div class="info-player">
					<p class="info-player__num">7</p>
					<p class="info-player__name"><small>Ben</small><br>Roethlisberger</p>
				</div>
				<div class="info-place">4<sup>th</sup></div>
			</div>
		</li>
		<li class="card__item card__item--tan">
			<div class="card__info">
				<div class="info-player">
					<p class="info-player__num">9</p>
					<p class="info-player__name"><small>Drew</small><br>Brees</p>
				</div>
				<div class="info-place">5<sup>th</sup></div>
			</div>
		</li>
		<li class="card__item card__item--orange">
			<div class="card__info">
				<div class="info-player">
					<p class="info-player__num">18</p>
					<p class="info-player__name"><small>Peyton</small><br>Manning</p>
				</div>
				<div class="info-place">6<sup>th</sup></div>
			</div>
		</li>
	</ul>
	<!--@foreach ($respuestas as $element)
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
	@endforeach-->
</div>
@stop