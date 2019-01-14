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
            <div class="labeltxt">{{ trans('message.listRole') }}</div>
            <div class="input-field">
                <table>
                    <thead>
                        <tr>
                            <th width="10%">{{ trans('message.codeRole') }}</th>
                            <th width="20%">{{ trans('message.titleRol') }}</th>
                            <th width="30%">{{ trans('message.descRol') }}</th>
                            <th width="20%">{{ trans('message.slug') }}</th>
                            <th width="10%">&nbsp;</th>
                            <th width="10%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($allRole as $rol)
                        <tr>
                            <td data-label="{{ trans('message.codeRole') }}">{{ $rol->id }}</td>
                            <td data-label="{{ trans('message.titleRol') }}">{{ $rol->rol_nombre }}</td>
                            <td data-label="{{ trans('message.descRol') }}">{{ $rol->rol_descrip }}</td>
                            <td data-label="{{ trans('message.slug') }}">{{ $rol->slug }}</td>
                            <td data-label="">
                                <a href="/rol/{{ $rol->slug }}/edit">
                                    <button class="waves-effect grey darken-4 btn-small" name="action">{{ trans('message.edit') }}
                                        <i class="material-icons right"></i>
                                    </button>
                                </a>
                            </td>
                            <td data-label="">
                                <a href="/rol/{{ $rol->slug }}">
                                    <button class="waves-effect grey darken-4 btn-small" name="action">{{ trans('message.show') }}
                                        <i class="material-icons right"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop