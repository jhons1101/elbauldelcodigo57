@extends('layouts.admin')
@extends('sistemaAdmin.footer')

<!-- sección para poner el title del rol -->
@section('seccion')
{{ $seccion }}
@stop

@section('header')
<div style="padding:20px">&nbsp;</div>
@stop

<!-- sección de javascript propios del rol -->
@section('javascript')

@stop

@section('css')
<style>

</style>
@stop

@section('contenido')
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="row">
                <div class="col s12 m6 l6">
                    <div class="labeltxt">{{ trans('message.titleRol') }}</div>
                    <div class="input-field">{{ $objRol->id }} - {{ $objRol->rol_nombre }}</div>
                </div>
                <div class="col m6 l6">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col s12 m6 l6">
                    <div class="labeltxt">{{ trans('message.descRol') }}</div>
                    <div class="input-field"><i>{{ $objRol->rol_descrip }}</i></div>
                </div>
                <div class="col m6 l6">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col s12 m6 l6">
                    <div class="labeltxt">{{ trans('message.dateCreated') }}</div>
                    <div class="input-field">{{ $objRol->created_at }}</div>
                </div>
                <div class="col m6 l6">&nbsp;</div>
            </div>
            @if (count($userRoles))
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="labeltxt">{{ trans('message.listUserRole') }} <i>'{{ $objRol->rol_nombre }}'</i></div>
                    <div class="input-field">
                        @foreach ($userRoles as $userRol)
                            <table>
                                <thead>
                                    <tr>
                                        <th>{{ trans('message.labelCodUser') }}</th>
                                        <th>{{ trans('message.labelNomUser') }}</th>
                                        <th>{{ trans('message.email') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="Nombre">{{ $userRol->user_id }}</td>
                                        <td data-label="Valores permitidos">{{ $userRol->name }}</td>
                                        <td data-label="Valores permitidos">{{ $userRol->email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="input-field">
                        <button class="waves-effect grey darken-4 btn-large" type="submit" name="action">{{ trans('message.edit') }}
                            <i class="material-icons right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop