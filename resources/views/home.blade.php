@extends('layouts.admin')
@extends('sistemaAdmin.footer')

@section('seccion')
{{ $seccion }}
@stop

@section('img-usuario')
{{$user->img}}
@stop

@section('nom-usuario')
{{ Auth::user()->name }}
@stop

@section('cant-puntos')
{{ $idUser }}
@stop

@section('css')
<style>
.welcomeAdmin {
    margin-top: 3rem;
}
.textWelcome {
    color: rgba(59, 59, 59, 1);
}
</style>
@stop

@section('header')
    <img src="{{ asset('/') }}img/usuarios/@yield('img-usuario')" alt="Nombre de usuario" class="header-img-user">
    <div class="header-usuario" style="color:#212929;">{{ Auth::user()->name }}</div>
    <button class="header-puntos">{{ trans('message.accumPoints') }} : @yield('cant-puntos')</button>
@stop

@section('contenido')
<div class="row">
    <div class="col s12 m12 l12">
        <div class="">
            <div class="conexion">
                <button class="modo-aleatorio">{{ trans('message.userPanel') }}</button>
            </div>
            <div>{{$user->desc_user}}</div>
            <div class="welcomeAdmin textWelcome">
                <h5>
                    {{ trans('message.welcome') }} {{ Auth::user()->name }}
                    <small>{{ trans('message.versionApp') }}</small>
                    <br/>
                    <small>{{ Auth::user()->email }}</small>
                </h5>
                <hr />
            </div>
            <div class="textWelcome">
                <b>{{ trans('message.roleUser') }}:</b>
                <br>
                {{$roles->rol_nombre }}
            </div>
        </div>
    </div>
</div>
@endsection
