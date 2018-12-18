@extends('layout.admin')
@extends('sistemaAdmin.footer')

<!-- sección para poner el title del post -->
@section('seccion')
Editar post
@stop


<!-- sección de javascript propios del post -->
@section('javascript')

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
@stop

<!-- secciónpara cargar la foto del usuario de la sessión del post -->
@section('img-usuario')

@stop


@section('contenido')
    <div class="row">
        <h2>Editar POST: {{ $posts->post_tit }}</h2>
        <hr />
        @include('partials.errors')
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
        <form class="" action="/post/{{ $posts->slug }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <input type="text" class="validate" id="tit_post" name="txtTitPost" value="{{ $posts->post_tit }}">
                            <label>Título</label>
                            @if ($errors->has('txtTitPost'))
                                <span class="helper-text red-text text-darken-4 red lighten-5">{{ $errors->first('txtTitPost') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <select id="tem_post" name="txtTemPost">
                                <option value="">Seleccione</option>
                                @foreach ($temaPost as $tema)
                                <option value="{{$tema->tema_id}}" @if($posts->post_tema == $tema->tema_id) selected @endif>{{$tema->tema_txt}}</option>
                                @endforeach
                            </select>
                            <label>Tema principal</label>
                            @if ($errors->has('txtTemPost'))
                                <span class="helper-text red-text text-darken-4 red lighten-5">{{ $errors->first('txtTemPost') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <input type="text" class="" id="usu_post" name="txtUsuPost" value="{{ $posts->post_usu }}" style="display:none;">
                            <input type="text" class="" id="slug_post" name="txtSlugPost" value="{{ $posts->slug }}">
                            <label>Slug</label>
                            @if ($errors->has('txtSlugPost'))
                                <span class="helper-text red-text text-darken-4 red lighten-5">{{ $errors->first('txtSlugPost') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <select multiple name="txtTagsPost">
                                <option value="">Seleccione</option>
                                @foreach ($tagsPost as $tag)
                                <option value="{{$tag->tag_id}}" @if($posts->post_tags == $tag->tag_id) selected @endif>{{$tag->tag_txt}}</option>
                                @endforeach
                            </select>
                            <label>Tags</label>
                            @if ($errors->has('txtTagsPost'))
                                <span class="helper-text red-text text-darken-4 red lighten-5">{{ $errors->first('txtTagsPost') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <input type="text" class="" id="key_post" name="txtKeyPost" value="{{ $posts->slug }}">
                            <label>Keys</label>
                            @if ($errors->has('txtKeyPost'))
                                <span class="helper-text red-text text-darken-4 red lighten-5">{{ $errors->first('txtKeyPost') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <input type="text" class="" id="des_post" name="txtDesPost" value="{{ $posts->slug }}">
                            <label>Describe</label>
                            @if ($errors->has('txtDesPost'))
                                <span class="helper-text red-text text-darken-4 red lighten-5">{{ $errors->first('txtDesPost') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <textarea class="textareaTiny" name="textareaPost" value="{{ $posts->slug }}">
                                Ingrese la descripcion del post
                            </textarea>
                            @if ($errors->has('textareaPost'))
                                <span class="helper-text red-text text-darken-4 red lighten-5">{{ $errors->first('textareaPost') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <textarea class="textareaTiny" name="textareaCode" value="{{ $posts->slug }}">
                                Ingrese la información complementaria, código fuente y evidencias del código que se está probando
                            </textarea>
                            @if ($errors->has('textareaCode'))
                                <span class="helper-text red-text text-darken-4 red lighten-5">{{ $errors->first('textareaCode') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <label for="txtPubPost" data-error="wrong" data-success="right" class="labelbk">Publicar</label>
                        <div class="switch">
                            <label>
                                NO
                                <input type="checkbox" name="txtPubPost" id="txtPubPost" @if( $posts->flg_publicar == 1) checked @endif>
                                <span class="lever"></span>
                                SI
                            </label>
                            @if ($errors->has('txtPubPost'))
                                <span class="helper-text red-text text-darken-4 red lighten-5">{{ $errors->first('txtPubPost') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <select id="tip_post" name="txtTipPost">
                                <option value="">Seleccione</option>
                                @foreach ($tipoPost as $tipo)
                                <option value="{{$tipo->tipo_id}}" @if($posts->post_tipo == $tipo->tipo_id) selected @endif>{{$tipo->tipo_txt}}</option>
                                @endforeach
                            </select>
                            <label>Tipo de entrada</label>
                            @if ($errors->has('txtTipPost'))
                                <span class="helper-text red-text text-darken-4 red lighten-5">{{ $errors->first('txtTipPost') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <button class="waves-effect waves-light btn-large" type="submit" name="action">Guardar
                                <i class="material-icons right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop