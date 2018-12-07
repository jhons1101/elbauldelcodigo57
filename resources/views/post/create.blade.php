@extends('layout/plantilla-create-post')

@section('content')
    <div class="row">
        <div class="col s12 m12 l9">
            <form class="" action="/post" method="POST">
                @csrf
                <div class="row">
                    <div class="col s12 m12 l8">
                        <label for="tit_post" data-error="wrong" data-success="right" class="labelbk">Título</label>
                        <input type="text" class="" id="tit_post" name="txtTitPost">
                    </div>
                    <div class="col s12 m12 l4">
                        <label for="tem_post" data-error="wrong" data-success="right" class="labelbk">Tema ppal</label>
                        <select class="" id="tem_post" name="txtTemPost">
                            @foreach ($temaPost as $tema)
                            <option value="{{$tema->tema_id}}">{{$tema->tema_txt}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l8">
                        <label for="usu_post" data-error="wrong" data-success="right" class="labelbk">Usuario</label>
                        <input type="text" class="" id="usu_post" name="txtUsuPost">
                    </div>
                    <div class="col s12 m12 l4">
                        <label for="tags_post" data-error="wrong" data-success="right" class="labelbk">Tags</label>
                        <select class="" id="tags_post" name="txtTagsPost">
                            @foreach ($tagsPost as $tag)
                            <option value="{{$tag->tag_id}}">{{$tag->tag_txt}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l8">
                        <label for="key_post" data-error="wrong" data-success="right" class="labelbk">Keys</label>
                        <input type="text" class="" id="key_post" name="txtKeyPost">
                    </div>
                    <div class="col s12 m12 l4">
                        <label for="des_post" data-error="wrong" data-success="right" class="labelbk">Describe</label>
                        <input type="text" class="" id="des_post" name="txtDesPost">
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l8">
                        <label for="pub_post" data-error="wrong" data-success="right" class="labelbk">Publicar</label>
                        <input type="radio" value="1" class="" id="pub_post" name="txtPubPost"> Si &nbsp;
                        <input type="radio" value="0" class="" id="pub_post" name="txtPubPost"> NO
                    </div>
                    <div class="col s12 m12 l4">
                        <label for="tip_post" data-error="wrong" data-success="right" class="labelbk">Tipo de entrada</label>
                        <select class="" id="tip_post" name="txtTipPost">
                            @foreach ($tipoPost as $tipo)
                            <option value="{{$tipo->tipo_id}}">{{$tipo->tipo_txt}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l8">
                        <button type="submit">enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@stop