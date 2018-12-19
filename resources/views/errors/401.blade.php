@extends('layouts.app')

@section('css')
<style>
body, #app, .py-4 {
	min-width:100%;
	min-height:100%;
}
.justify-center {
	text-align:center;
    vertical-align: middle;
    min-width: 100%;
    min-height: 100%;
    background-color: transparent;
}
.textError {
    font-size: 9rem;
	color:#22292f;
	font-weight:900;
	margin-bottom: 3rem;
	margin-top: 3rem;
}
.textErrorDesc {
    font-size: 1.87rem;
	color: #606f7b;
	margin-bottom: 2rem;
	line-height: 1.5;
	font-weight: 300;
}
.botonError {
	letter-spacing: 0.05em;
	text-transform: uppercase;
	color: #3d4852;
	padding-left: 1.5rem;
	padding-right: 1.5rem;
	padding-top: 0.75rem;
	padding-bottom: 0.75rem;
	font-weight: 700;
	border-width: 2px;
	border-radius: .5rem;
	border-color: #dae1e7;
	background-color: transparent;
	cursor: pointer;
	margin-bottom: 3rem;
}
.backDiv {
	background-image: url("/svg/403.svg");
	background-position: center;
    top: 0px;
    right: 0px;
    bottom: 0px;
    left: 0px;
	position: absolute;
	background-size: cover;
	background-repeat: no-repeat;
}
.padmarg {
	padding:0 !important;
	margin:0 !important;
}
.py-4 {
	padding:0 !important;
}
</style>
@endSection

@section('content')
<div class="row">
    <div class="col s12 m6 padmarg">
		<div class="justify-center">
			<div class="textError">
				401
			</div>
			<p class="textErrorDesc">
				{{ $exception->getMessage() }}
			</p>
			<a href="/">
				<button class="botonError">
					Ir al inicio
				</button>
			</a>
		</div>
    </div>
	<div class="col s12 m6 padmarg">
		<div class="backDiv"></div>
	</div>
</div>
@endSection