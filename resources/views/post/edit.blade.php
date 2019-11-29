@extends('layouts.admin')
@extends('sistemaAdmin.footer')

{{-- <!-- sección para poner el title del post --> --}}
@section('seccion')
{{ $seccion }} {{ $posts->post_tit }}
@stop

{{-- <!-- sección para poner el modulo de la pantalla --> --}}
@section('moduleSeccion')
{{ $moduleSeccion }}
@stop

@section('header')
<div style="padding:20px">&nbsp;</div>
@stop


{{-- <!-- sección de javascript propios del post --> --}}
@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        $('select').material_select();

        setTimeout(function(){
            $("[id^='mceu_8']").each(function(key, value){
                if($(value).hasClass('mce-notification-warning')){
                    $(value).css('display', 'none');
                }
            });
        }, 5000);
    });


    tinymce.init({
        selector: '.textareaTiny',
        theme: 'modern',
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        content_css: '../../css/tidy.css, ../../css/prism.css, ../../materialize/css/materialize.min.css, ../../css/tablas-responsive.css',
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor',
        height : "480"
    });
</script>
@stop

{{-- <!-- sección para cargar la foto del usuario de la sessión del post --> --}}
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
        <h5>{{ trans('message.editPost') }}: <i>{{ $posts->post_tit }}</i></h5>
        <hr />
        <br />
        <br />
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <form action="/post/{{ $posts->slug }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col s12 m6 l6">
                        <label>{{ trans('message.titlePost') }}</label>
                        <div class="input-field">
                            <input type="text" class="validate" id="tit_post" name="txtTitPost" @if (old('txtTitPost') != '') value="{{ old('txtTitPost') }}" @else value="{{ $posts->post_tit }}" @endif>
                            <input type="hidden" name="txtSlugPost" value="{{ $posts->slug }}">
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <label>{{ trans('message.topic') }}</label>
                        <div class="input-field">
                            <select id="tem_post" name="txtTemPost">
                                <option value="">{{ trans('message.select') }}</option>
                                @foreach ($temaPost as $tema)
                                <option value="{{$tema->tema_id}}" @if (old('txtTemPost') == $tema->tema_id) selected @elseif($posts->post_tema == $tema->tema_id) selected @endif>{{$tema->tema_txt}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <label>{{ trans('message.tags') }}</label>
                        <div class="input-field">
                            @foreach ($tagsPost as $tag)
                                <div class="col s6 m2 l2">
                                    <input type="checkbox" name="txtTagsPost[]" value="{{$tag->tema_id}}" id="txtTagsPost_{{$tag->tema_id}}" 
                                        @if (is_array(old('txtTagsPost'))) 
                                            @foreach (old('txtTagsPost') as $oldtag)
                                                @if ($oldtag == $tag->tema_id)
                                                    checked
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach (explode (',', $posts->post_tags) as $posttag)
                                                @if ($posttag == $tag->tema_id)
                                                    checked
                                                @endif
                                            @endforeach
                                        @endif
                                    />
                                    {{$tag->tema_txt}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <label>{{ trans('message.key') }}</label>
                        <div class="input-field">
                            <input type="text" id="key_post" name="txtKeyPost" @if (old('txtKeyPost') != '') value="{{ old('txtKeyPost') }}" @else value="{{ $posts->post_key }}" @endif>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <label>{{ trans('message.describe') }}</label>
                        <div class="input-field">
                            <input type="text" id="des_post" name="txtDesPost" @if (old('txtDesPost') != '') value="{{ old('txtDesPost') }}" @else value="{{ $posts->post_desc }}" @endif>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <textarea class="textareaTiny" name="textareaPost" >
                                @if (old('textareaPost') != '')
                                    {!! html_entity_decode(old('textareaPost'), ENT_QUOTES, 'UTF-8') !!}
                                @else
                                    {!! html_entity_decode($posts->desc_post, ENT_QUOTES, 'UTF-8') !!}
                                @endif
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <textarea class="textareaTiny" name="textareaCode" >
                                @if (old('textareaCode') != '')
                                    {!! html_entity_decode(old('textareaCode'), ENT_QUOTES, 'UTF-8') !!}
                                @else
                                    {!! html_entity_decode($posts->desc_code, ENT_QUOTES, 'UTF-8') !!}
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
                                <input type="checkbox" name="txtPubPost" id="txtPubPost" @if( $posts->flg_publicar == 1) checked @endif>
                                <span class="lever"></span>
                                {{ trans('message.yes') }}
                            </label>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <label>{{ trans('message.typePost') }}</label>
                        <div class="input-field">
                            <select id="tip_post" name="txtTipPost">
                                <option value="">{{ trans('message.select') }}</option>
                                @foreach ($tipoPost as $tipo)
                                    <option value="{{$tipo->tipo_id}}" @if (old('txtTipPost') == $tipo->tipo_id) selected @elseif($posts->post_tipo == $tipo->tipo_id) selected @endif >{{$tipo->tipo_txt}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <label>{{ trans('message.file') }}</label>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>{{ trans('message.file') }}</span>
                                <input type="file" name="imagePost">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">&nbsp;</div>
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