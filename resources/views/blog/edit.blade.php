@extends('layouts.admin')
@extends('sistemaAdmin.footer')

<!-- sección para poner el title del post -->
@section('seccion')
{{ $seccion }} | {{ $blog->title }}
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
<script type="text/javascript"></script>
@stop

@section('css')
<style></style>
@stop

@section('contenido')
    <div class="row">
        <h5>{{ $blog->title }}</h5>
        <hr />
        <br />
        <br />
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <form action="/blog/{{ $blog->slug }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col s12 m9 l9">
                        <label>{{ trans('message.title') }}</label>
                        <div class="input-field">
                            <input type="text" id="tit_blog" name="txtTitblog" @if (old('txtTitblog') != '') value="{{ old('txtTitblog') }}" @else value="{{ $blog->title }}" @endif maxlength="201">
                            @if ($errors->has('txtTitblog'))
                                <span class="helper-text red-text text-darken-4 text-darken-4">{{ $errors->first('txtTitblog') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col s12 m3 l3">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <label>{{ trans('message.tags') }}</label>
                        <div class="input-field">
                            @foreach ($tagsBlog as $tag)
                                <div class="col s6 m2 l2">
                                    <input type="checkbox" name="txtTagsBlog[]" value="{{$tag->tema_id}}" id="txtTagsBlog_{{$tag->tema_id}}"
                                        @if (is_array(old('txtTagsBlog'))) 
                                            @foreach (old('txtTagsBlog') as $oldtag)
                                                @if ($oldtag == $tag->tema_id)
                                                    checked
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach (explode (',', $blog->tags_blog) as $blogtag)
                                                @if ($blogtag == $tag->tema_id)
                                                    checked
                                                @endif
                                            @endforeach
                                        @endif
                                         />
                                    {{$tag->tema_txt}}
                                </div>
                            @endforeach
                            <br />
                            @if ($errors->has('txtTagsBlog'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('txtTagsBlog') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <label>{{ trans('message.key') }}</label>
                        <div class="input-field">
                            <input type="text" id="key_blog" name="txtKeyblog" @if (old('txtKeyblog') != '') value="{{ old('txtKeyblog') }}" @else value="{{ $blog->keys }}" @endif maxlength="201">
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <label>{{ trans('message.description') }}</label>
                        <div class="input-field">
                            <input type="text" id="desc_blog" name="txtDescblog" @if (old('txtDescblog') != '') value="{{ old('txtDescblog') }}" @else value="{{ $blog->desc }}" @endif maxlength="201">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <textarea class="textareaTiny" name="textareaBlog">
                                @if (old('textareaBlog') != '')
                                    {!! html_entity_decode(old('textareaBlog'), ENT_QUOTES, 'UTF-8') !!}
                                @else
                                    {!! html_entity_decode($blog->text, ENT_QUOTES, 'UTF-8') !!}
                                @endif
                            </textarea>
                            @if ($errors->has('textareaBlog'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('textareaBlog') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4 l4">
                        <img src="{{ asset('img/blog/'.$blog->image.'') }}" alt=" Imagen {{ $blog->title }}" class="ancho100">
                    </div>
                    <div class="col s12 m8">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>{{ trans('message.file') }}</span>
                                <input type="file" name="imageBlog">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <br />
                        <label>{{ trans('message.publish') }}</label>
                        <div class="switch">
                            <label>
                                {{ trans('message.not') }}
                                <input type="checkbox" name="txtPubBlog" id="txtPubBlog" @if ($blog->flg_publicar == 1) checked @endif>
                                <span class="lever"></span>
                                {{ trans('message.yes') }}
                            </label>
                            @if ($errors->has('txtPubBlog'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('txtPubBlog') }}</span>
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