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
<script type="text/javascript">
    $(document).ready(function(){
        $('select').material_select();
    });
</script>
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
                        <table>
                            <thead>
                                <tr>
                                    <th width="20%">{{ trans('message.labelCodUser') }}</th>
                                    <th width="30%">{{ trans('message.labelNomUser') }}</th>
                                    <th width="35%">{{ trans('message.email') }}</th>
                                    <th width="15%">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($userRoles as $userRol)
                                <tr>
                                    <td data-label="{{ trans('message.labelCodUser') }}">{{ $userRol->user_id }}</td>
                                    <td data-label="{{ trans('message.labelNomUser') }}">{{ $userRol->name }}</td>
                                    <td data-label="{{ trans('message.email') }}">{{ $userRol->email }}</td>
                                    <td data-label="{{ trans('message.email') }}">
                                        <form action="/rol/{{ $userRol->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a href="/rol/{{ $userRol->id }}">
                                                <button class="waves-effect grey darken-4 btn-small" name="action">{{ trans('message.disass') }}
                                                    <i class="material-icons right"></i>
                                                </button>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col s12 m12 l12">
                    <br />
                    <br />
                    <br />
                </div>
            </div>
            @endif
        </div>
    </div>
@stop