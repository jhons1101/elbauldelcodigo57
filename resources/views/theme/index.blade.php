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
.table {
    border-collapse: unset !important;
    border: 0;
}
.pagination li.active {
    background-color: #00adb5 !important;
}
</style>
@stop

@section('contenido')
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="labeltxt">
                <table class="table">
                    <tr>
                        <td width="30%" class="left-align">
                            {{ trans('message.seccionListTheme') }}
                        </td>
                        <td width="70%" class="right-align">
                            <a href="/tema/create">
                                <button class="waves-effect grey darken-4 btn-small" name="action">{{ trans('message.newTheme') }}
                                    <i class="material-icons right"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="input-field">
                <table>
                    <thead>
                        <tr>
                            <th width="10%">{{ trans('message.code') }}</th>
                            <th width="20%">{{ trans('message.theme') }}</th>
                            <th width="20%">{{ trans('message.themeImg') }}</th>
                            <th width="20%">{{ trans('message.themeTag') }}</th>
                            <th width="10%">&nbsp;</th>
                            <th width="10%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alltheme as $theme)
                            <tr>
                                <td data-label="{{ trans('message.code') }}">{{ $theme->tema_id }}</td>
                                <td data-label="{{ trans('message.theme') }}">{{ $theme->tema_txt }}</td>
                                <td data-label="{{ trans('message.themeImg') }}">{{ $theme->tema_img }}</td>
                                <td data-label="{{ trans('message.themeTag') }}">{{ $theme->tema_tag }}</td>
                                <td data-label="">
                                    <a href="/tema/{{ $theme->tema_txt }}/edit">
                                        <button class="waves-effect grey darken-4 btn-small" name="action">{{ trans('message.edit') }}
                                            <i class="material-icons right"></i>
                                        </button>
                                    </a>
                                </td>
                                <td data-label="">
                                    <a href="/tema/{{ $theme->tema_txt }}">
                                        <button class="waves-effect grey darken-4 btn-small" name="action">{{ trans('message.show') }}
                                            <i class="material-icons right"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('partials.paginate')
            </div>
        </div>
    </div>
@stop