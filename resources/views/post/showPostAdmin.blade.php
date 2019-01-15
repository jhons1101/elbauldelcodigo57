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
                            {{ trans('message.seccionListpost') }}
                        </td>
                        <td width="70%" class="right-align">
                            <a href="/post/create">
                                <button class="waves-effect grey darken-4 btn-small" name="action">{{ trans('message.newPost') }}
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
                            <th width="20%">{{ trans('message.titleRol') }}</th>
                            <th width="20%">{{ trans('message.theme') }}</th>
                            <th width="20%">{{ trans('message.describe') }}</th>
                            <th width="10%">{{ trans('message.published') }}</th>
                            <th width="10%">&nbsp;</th>
                            <th width="10%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allPost as $post)
                            <tr>
                                <td data-label="{{ trans('message.code') }}">{{ $post->id }}</td>
                                <td data-label="{{ trans('message.titleRol') }}">{{ $post->post_tit }}</td>
                                <td data-label="{{ trans('message.theme') }}">{{ $post->tema_txt }}</td>
                                <td data-label="{{ trans('message.describe') }}">{{ $post->post_desc }}</td>
                                <td data-label="{{ trans('message.published') }}">
                                    @if ( $post->flg_publicar == 0) {{trans('message.not')}} @else {{trans('message.yes')}} @endif
                                </td>
                                <td data-label="">
                                    <a href="/post/{{ $post->slug }}/edit">
                                        <button class="waves-effect grey darken-4 btn-small" name="action">{{ trans('message.edit') }}
                                            <i class="material-icons right"></i>
                                        </button>
                                    </a>
                                </td>
                                <td data-label="">
                                    <a href="/post/{{ $post->slug }}">
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