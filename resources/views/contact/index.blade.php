@extends('layouts/index')
@extends('layouts.plantilla_header')
@extends('layouts.plantilla_autor')
@extends('layouts.plantilla_tematica')
@extends('layouts.plantilla_footer')

@section('css')
<style>

.ancho50 {
    width:50%;
}
.bgwhite {
    background-color: #fff !important;
}
.anchoauto {
    width:auto !important;
}
.fadeInUp {
    width: 80%;
}
.helper-text, .card-panel {
    font-size:70%;
}
</style>
@stop

@section('post')
    <div class="">
        <div class="wow fadeInUp">
            <div class="text-description">
                <form method="POST" action="/contacto" accept-charset="UTF-8" >
                    @csrf
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <br />
                            <span class="labelComentario">{{ trans('message.weCanyou') }}</span>
                            <br />
                            {{ trans('message.communicateContact') }}
                            <br /><br />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            @include('partials.errors')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <label>{{ trans('message.email') }}</label>
                            <div class="input-field">
                                <input type="email" id="tit_rol" name="email" value="{{ old('email') }}" maxlength="120">
                                @if ($errors->has('email'))
                                    <span class="helper-text red-text text-darken-4 text-darken-4">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <label>{{ ucfirst(trans('message.message')) }}</label>
                            <div class="input-field">
                                <textarea class="materialize-textarea" placeholder="{{ trans('message.contactTextarea') }}" maxlength="2000" name="comentario" cols="50" rows="10"></textarea>
                                @if ($errors->has('comentario'))
                                    <span class="helper-text red-text text-darken-4 text-darken-4">{{ $errors->first('comentario') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <button class="waves-effect grey darken-4 btn-large" type="submit" name="action">{{ trans('message.save') }}
                                <i class="material-icons right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop