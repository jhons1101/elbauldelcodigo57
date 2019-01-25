@extends('layouts.admin')
@extends('sistemaAdmin.footer')

<!-- sección para poner el title del post -->
@section('seccion')
{{ $seccion }} {{ $posts->post_tit }}
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
        }, 2000);
    });


    tinymce.init({
        selector: '.textareaTiny',
        theme: 'modern',
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        content_css: 'css/tidy.css',
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor'
    });
</script>
@stop

<!-- secciónpara cargar la foto del usuario de la sessión del post -->
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
        <form action="/post/{{ $posts->slug }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col s12 m6 l6">
                        <label>{{ trans('message.titlePost') }}</label>
                        <div class="input-field">
                            <input type="text" class="validate" id="tit_post" name="txtTitPost" @if (old('txtTitPost') != '') value="{{ old('txtTitPost') }}" @else value="{{ $posts->post_tit }}" @endif>
                            @if ($errors->has('txtTitPost'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('txtTitPost') }}</span>
                            @endif
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
                            {{ $posts->slug }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <label>{{ trans('message.tags') }}</label>
                        <div class="input-field">
                            @foreach ($tagsPost as $tag)
                                <div class="col s6 m2 l2">
                                    <input type="checkbox" name="txtTagsPost[]" value="{{$tag->tag_id}}" id="txtTagsPost_{{$tag->tag_id}}" 
                                        @if (is_array(old('txtTagsPost'))) 
                                            @foreach (old('txtTagsPost') as $oldtag)
                                                @if ($oldtag == $tag->tag_id)
                                                    checked
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach (explode (',', $posts->post_tags) as $posttag)
                                                @if ($posttag == $tag->tag_id)
                                                    checked
                                                @endif
                                            @endforeach
                                        @endif
                                    />
                                    {{$tag->tag_txt}}
                                </div>
                            @endforeach
                            <br />
                            @if ($errors->has('txtTagsPost'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('txtTagsPost') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <label>{{ trans('message.key') }}</label>
                        <div class="input-field">
                            <input type="text" id="key_post" name="txtKeyPost" @if (old('txtKeyPost') != '') value="{{ old('txtKeyPost') }}" @else value="{{ $posts->post_key }}" @endif>
                            @if ($errors->has('txtKeyPost'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('txtKeyPost') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <label>{{ trans('message.describe') }}</label>
                        <div class="input-field">
                            <input type="text" id="des_post" name="txtDesPost" @if (old('txtDesPost') != '') value="{{ old('txtDesPost') }}" @else value="{{ $posts->post_desc }}" @endif>
                            @if ($errors->has('txtDesPost'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('txtDesPost') }}</span>
                            @endif
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
                            @if ($errors->has('textareaPost'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('textareaPost') }}</span>
                            @endif
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
                            @if ($errors->has('textareaCode'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('textareaCode') }}</span>
                            @endif
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
                            @if ($errors->has('yes'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('txtPubPost') }}</span>
                            @endif
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
                            @if ($errors->has('txtTipPost'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('txtTipPost') }}</span>
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