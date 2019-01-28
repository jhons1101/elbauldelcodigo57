@extends('layouts.admin')
@extends('sistemaAdmin.footer')

<!-- sección para poner el title del rol -->
@section('seccion')
{{ $seccion }}
@stop

<!-- sección para poner el modulo de la pantalla -->
@section('moduleSeccion')
{{ $moduleSeccion }}
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
[type=checkbox]:not(:checked), [type=checkbox]:checked {
    opacity:1 !important;
    position: unset !important;
    pointer-events: initial !important;
}
.textarea-default {
    height: unset !important;
    max-width: 100% !important;
    min-width: 100% !important;
}
</style>
@stop

@section('contenido')
    <div class="row">
        <h5>{{ trans('message.newRole') }}</h5>
        <hr />
        <br />
        <br />
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <form action="/rol" method="post">
                @csrf
                <div class="row">
                    <div class="col s12 m6 l6">
                        <div  class="labeltxt">{{ trans('message.titleRol') }}</div>
                        <div class="input-field">
                            <input type="text" class="" id="tit_rol" name="txtTitrol" value="{{ old('txtTitrol') }}" maxlength="21">
                            @if ($errors->has('txtTitrol'))
                                <span class="helper-text red-text text-darken-4 text-darken-4">{{ $errors->first('txtTitrol') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col m6 l6">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="labeltxt">{{ trans('message.descRol') }}</div>
                        <div class="input-field">
                            <textarea class="textarea-default" id="desc_rol" name="txtdescrol" rows="5" maxlength="201">{{ old('txtdescrol') }}</textarea>
                            @if ($errors->has('txtdescrol'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('txtdescrol') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr />
                    <div class="col s12 m6 l6">
                        <div class="labeltxt">{{ trans('message.descRolUser') }}</div>
                        <label>{{ trans('message.optional') }}</label>
                        <div class="input-field">
                            <select id="idUsersList" name="txtUsersList" value="{{ old('txtUsersList') }}">
                                <option value="" selected>{{ trans('message.select') }}</option>
                                @foreach ($usuarios as $usuario)
                                <option value="{{$usuario->id}}" @if (old('txtUsersList') == $usuario->id) selected @endif>{{$usuario->name}} - {{$usuario->email}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('txtUsersList'))
                                <span class="helper-text select-helper-text red-text text-darken-4">{{ $errors->first('txtUsersList') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col m6 l6">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <button class="waves-effect grey darken-4 btn-large" type="submit" name="action">{{ trans('message.save') }}
                                <i class="material-icons right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop