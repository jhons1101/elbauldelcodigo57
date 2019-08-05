@extends('layouts.admin')
@extends('sistemaAdmin.footer')

<!-- sección para poner el title del Theme -->
@section('seccion')
{{ $seccion }} | {{ $themes->tema_txt }}
@stop

@section('moduleSeccion')
{{ $moduleSeccion }}
@stop

@section('header')
<div style="padding:20px">&nbsp;</div>
@stop

<!-- sección de javascript propios del Theme -->
@section('javascript')
<script type="text/javascript"></script>
@stop

@section('css')
<style>

</style>
@stop

@section('contenido')
    <div class="row">
        <h5>{{ trans('message.editTheme') }}: <i>{{ $themes->tema_txt }}</i></h5>
        <hr />
        <br />
        <br />
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <form action="/tema/{{ $themes->tema_txt }}/edit" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col s12 m6 l6">
                        <div  class="labeltxt">{{ trans('message.theme') }}</div>
                        <div class="input-field">
                            <input type="text" class="" id="tit_theme" name="txtTitTheme" @if (old('txtTitTheme') != '') value="{{ old('txtTitTheme') }}" @else value="{{ $themes->tema_txt }}" @endif maxlength="31">
                            @if ($errors->has('txtTitTheme'))
                                <span class="helper-text red-text text-darken-4 text-darken-4">{{ $errors->first('txtTitTheme') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col m6 l6">
                        <div  class="labeltxt">{{ trans('message.themeImg') }}</div>
                        <div class="input-field">
                            <input type="text" class="" id="img_Theme" name="txtImgTheme" @if (old('txtImgTheme') != '') value="{{ old('txtImgTheme') }}" @else value="{{ $themes->tema_img }}" @endif maxlength="31">
                            @if ($errors->has('txtImgTheme'))
                                <span class="helper-text red-text text-darken-4 text-darken-4">{{ $errors->first('txtImgTheme') }}</span>
                            @endif
                        </div>
                    </div>
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