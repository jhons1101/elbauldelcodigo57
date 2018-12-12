@extends('layout/admin')
	<link rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@section('seccion')
Admin
@stop
@section('img-usuario')
img_Jhons1101
@stop
@section('img-seccion')
icon-lifebuoy
@stop
@section('nom-usuario')
steven vargas
@stop
@section('cant-puntos')
100
@stop
@section('sub-seccion')
Panel de Usuario
@stop
@section('contenido')
<div id="Admin">	
    @foreach($entradas as $entrada)
		<div class="row">
			<div class="col s3 m2 l2">
				<div class="entrada">
					{{ucfirst ($entrada->tema_txt)}}
				</div>
			</div>
			<div class="col s9 m10 l10">
				<div class="txt-entrada">{{$entrada->post_tit}}</div>
			</div>
		</div>
    @endforeach
</div>
@stop