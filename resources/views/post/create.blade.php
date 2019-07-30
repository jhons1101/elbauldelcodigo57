@extends('layouts.admin')
@extends('sistemaAdmin.footer')

<!-- sección para poner el title del post -->
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

<!-- sección de javascript propios del post -->
@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        $('select').material_select();

        setTimeout(function(){
            $("#mceu_88, #mceu_90").css('display', 'none');
        }, 3000);
    });


    tinymce.init({
        selector: '.textareaTiny',
        theme: 'modern',
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        content_css: '../css/tidy.css',
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor',
        height : "480"
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
</style>
@stop

@section('contenido')
    <div class="row">
        <h5>{{ trans('message.newPost') }}</h5>
        <hr />
        <br />
        <br />
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <form class="" action="/post" method="POST">
                @csrf
                <div class="row">
                    <div class="col s12 m6 l6">
                        <label>{{ trans('message.title') }}</label>
                        <div class="input-field">
                            <input type="text" class="" id="tit_post" name="txtTitPost" @if (old('txtTitPost') != '') value="{{ old('txtTitPost') }}" @endif>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <label>{{ trans('message.topic') }}</label>
                        <div class="input-field">
                            <select id="tem_post" name="txtTemPost" value="{{ old('txtTemPost') }}">
                                <option value="" selected>{{ trans('message.select') }}</option>
                                @foreach ($temaPost as $tema)
                                <option value="{{$tema->tema_id}}" @if (old('txtTemPost') == $tema->tema_id) selected @endif>{{$tema->tema_txt}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('txtTemPost'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('txtTemPost') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <label>{{ trans('message.slug') }}</label>
                        <div class="input-field">
                            <input type="text" class="" id="slug_post" name="txtSlugPost" value="{{ old('txtSlugPost') }}">
                            @if ($errors->has('txtSlugPost'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('txtSlugPost') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <label>{{ trans('message.tags') }}</label>
                        <div class="input-field">
                            @foreach ($tagsPost as $tag)
                                <div class="col s6 m2 l2">
                                    <input type="checkbox" name="txtTagsPost[]" value="{{$tag->tag_id}}" id="txtTagsPost_{{$tag->tag_id}}" />
                                    {{$tag->tag_txt}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <label>{{ trans('message.key') }}</label>
                        <div class="input-field">
                            <input type="text" class="" id="key_post" name="txtKeyPost" value="{{ old('txtKeyPost') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <label>{{ trans('message.describe') }}</label>
                        <div class="input-field">
                            <input type="text" class="" id="des_post" name="txtDesPost" value="{{ old('txtDesPost') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <textarea class="textareaTiny" name="textareaPost">
                                @if (old('textareaCode') != '')
                                    {!! html_entity_decode(old('textareaPost'), ENT_QUOTES, 'UTF-8') !!}
                                @else
                                    {{ trans('message.textareaPost') }}
                                @endif
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <textarea class="textareaTiny" name="textareaCode">
                                @if (old('textareaCode') != '')
                                    {!! html_entity_decode(old('textareaCode'), ENT_QUOTES, 'UTF-8') !!}
                                @else
                                    {{ trans('message.textareaCode') }}
                                @endif
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <label>{{ trans('message.publish') }}</label>
                        <div class="switch">
                            <label>
                                {{ trans('message.not') }}
                                <input type="checkbox" name="txtPubPost" id="txtPubPost">
                                <span class="lever"></span>
                                {{ trans('message.yes') }}
                            </label>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <label>{{ trans('message.typePost') }}</label>
                        <div class="input-field">
                            <select id="tip_post" name="txtTipPost" value="{{ old('txtTipPost') }}">
                                <option value="" selected>{{ trans('message.select') }}</option>
                                @foreach ($tipoPost as $tipo)
                                <option value="{{$tipo->tipo_id}}" @if (old('txtTipPost') == $tipo->tipo_id) selected @endif>{{$tipo->tipo_txt}}</option>
                                @endforeach
                            </select>
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