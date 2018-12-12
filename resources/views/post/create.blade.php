@extends('layout/admin')
@extends('sistemaAdmin/footer')


<!-- sección de javascript propios del post -->
@section('javascript')
$(document).ready(function(){
    $('select').material_select();
});
@stop

<!-- secciónpara cargar la foto del usuario de la sessión del post -->
@section('img-usuario')

@stop


@section('contenido')
    <div class="row">
        <h2>Crear nuevo POST</h2>
        <hr />
    </div>
    <div class="row">
        <div class="col s12 m8 l8">
            <form class="" action="/post" method="POST">
                @csrf
                <div class="row">
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <label for="tit_post" data-error="wrong" data-success="right" class="labelbk">Título</label>
                            <input type="text" class="" id="tit_post" name="txtTitPost">
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <select id="tem_post" name="txtTemPost">
                                @foreach ($temaPost as $tema)
                                <option value="{{$tema->tema_id}}">{{$tema->tema_txt}}</option>
                                @endforeach
                            </select>
                            <label>Tema principal</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <label for="slug_post" data-error="wrong" data-success="right" class="labelbk">Slug</label>
                            <input type="text" class="" id="usu_post" name="txtUsuPost" value="1" style="display:none;">
                            <input type="text" class="" id="slug_post" name="txtSlugPost">
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <select multiple>
                                @foreach ($tagsPost as $tag)
                                <option value="{{$tag->tag_id}}">{{$tag->tag_txt}}</option>
                                @endforeach
                            </select>
                            <label>Tags</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <label for="key_post" data-error="wrong" data-success="right" class="labelbk">Keys</label>
                            <input type="text" class="" id="key_post" name="txtKeyPost">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <label for="des_post" data-error="wrong" data-success="right" class="labelbk">Describe</label>
                            <input type="text" class="" id="des_post" name="txtDesPost">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <label for="txtPubPost" data-error="wrong" data-success="right" class="labelbk">Publicar</label>
                        <div class="switch">
                            <label>
                                NO
                                <input type="checkbox" name="txtPubPost" id="txtPubPost">
                                <span class="lever"></span>
                                SI
                            </label>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <select id="tip_post" name="txtTipPost">
                                @foreach ($tipoPost as $tipo)
                                <option value="{{$tipo->tipo_id}}">{{$tipo->tipo_txt}}</option>
                                @endforeach
                            </select>
                            <label>Tipo de entrada</label>
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
        <div class="col s12 m8 l8">&nbsp;</div>
    </div>
@stop