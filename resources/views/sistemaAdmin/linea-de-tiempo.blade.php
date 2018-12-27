@extends('layouts/admin')
<link rel="stylesheet" href="{{ asset('css/linea-de-tiempo.css') }}">
<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
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
		<div class="lista-izq">	
			<ul class="lista">
				@foreach ($timeLine as $element)
					<li class="item">
						<div class="dia-info">
							<span class="info-dia">{{ date_format(date_create($element->line_fecha),"d")}}</span>
							<span class="info-mes-ano"><small>{{$mes = date_format(date_create($element->line_fecha),"F")}}</small><br>{{ date_format(date_create($element->line_fecha),"Y")}}</span>
							<span class="info-cantidad">{{ $element->totDia}} <sup style="font-size: 10px; color: #666;">Entradas</sup></span>
						</div>
					</li>	
				@endforeach
			</ul>
		</div>
		<div class="show-der">
			<div class="dia-detalle">
				<div class="detalle-top">
					<div id="detalle-cerrar"><i class="icon-arrow-left2"></i></div>
					<span class="detalle-dia">09</span>
				</div>
				<div class="detalle-bottom">
					<p class="detalle-tipo">Preguntaste.!</p>
					<p class="detalle-nombre">¿..Como se edita un alert() con css ..?</p>
					<p class="detalle-info">
						<i class="icon-bookmarks"></i> &nbsp; <span>20 Respuestas</span> &nbsp;
						<i class="icon-heart"></i> &nbsp; <span>Mejor Respuesta.!</span> &nbsp;
						<i class="icon-bookmarks"></i> &nbsp; <span>!..Calificar..!</span> &nbsp;						
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var Cards = (function() {
	
	var view 	= $('.view');
	var vw 		= view.innerWidth();   //alert(vw);
	var vh	 	= view.innerHeight();  //alert(vh);
	var vo 		= view.offset();
	var card 	= $('.item');
	var cardfull = $('.dia-detalle');
	var cardfulltop = cardfull.find('.detalle-top');
	var arrow = cardfulltop.find('#detalle-cerrar');
	var cardnum = cardfulltop.find('.detalle-dia');
	var cardtipo = cardfull.find('.detalle-tipo');
	var cardhandle = cardfull.find('.detalle-nombre');
	var cardinfo = cardfull.find('.detalle-info');
	var w = $(window);
	//alert(card);
	var data = [
		{
			num: 9,
			tipo: 'Tipo de entrada',
			handle: 'nombre de la entrada',
			info: 'Descripcion de la entrada...!'
		}
	];
	
	var moveCard = function() {
		var self = $(this);
		var selfIndex = self.index();
		var selfO = self.offset();
		var ty = w.innerHeight()/2 - selfO.top -4;
		
		var color = self.css('border-top-color');
		cardfulltop.css('background-color', color);
		cardhandle.css('color', color);
		
		updateData(selfIndex);
		
		self.css({
			'transform': 'translateY(' + ty + 'px)'
		});
				
		self.on('transitionend', function() {
			cardfull.addClass('active');
			self.off('transitionend');
		});
		
		return false;
	};
	
	var closeCard = function() {
		cardfull.removeClass('active');
		cardnum.hide();
		cardtipo.hide();
		cardinfo.hide();
		cardhandle.hide();
		cardfull.on('transitionend', function() {
			card.removeAttr('style');
			cardnum.show();
			cardtipo.show();
			cardinfo.show();
			cardhandle.show();
			cardfull.off('transitionend');
		});
	};
	
	var updateData = function(index) {
		cardnum.text(data[index].num);
		cardtipo.text(data[index].tipo);
		cardhandle.text(data[index].handle);
		cardinfo.text(data[index].info);
	};
	
	var bindActions = function() {
		card.on('click', moveCard);
		arrow.on('click', closeCard);
	};
	
	var init = function() {
		bindActions();
	};
	
	return {
		init: init
	};
	
}());

Cards.init();
</script>
@stop