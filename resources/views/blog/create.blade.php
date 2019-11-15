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
<script type="text/javascript"></script>
@stop

@section('css')
<style></style>
@stop

@section('contenido')
    <div class="row">
        <h5>{{ trans('message.newBlog') }}</h5>
        <hr />
        <br />
        <br />
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <form action="/blog" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col s12 m6 l6">
                        <label>{{ trans('message.title') }}</label>
                        <div class="input-field">
                            <input type="text" id="tit_blog" name="txtTitblog" value="{{ old('txtTitblog') }}" maxlength="201">
                            @if ($errors->has('txtTitblog'))
                                <span class="helper-text red-text text-darken-4 text-darken-4">{{ $errors->first('txtTitblog') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col s12 m6 l6">&nbsp;</div>
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
                                    @endif />
                                    {{$tag->tema_txt}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if ($errors->has('txtTagsBlog'))
                <div class="row">
                    <span class="helper-text red-text text-darken-4">{{ $errors->first('txtTagsBlog') }}</span>
                </div>
                @endif
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            <textarea class="textareaTiny" name="textareaBlog">
                                @if (old('textareaBlog') != '')
                                    {!! html_entity_decode(old('textareaBlog'), ENT_QUOTES, 'UTF-8') !!}
                                @else
                                    {{ trans('message.textareaBlog') }}
                                @endif
                            </textarea>
                            @if ($errors->has('textareaBlog'))
                                <span class="helper-text red-text text-darken-4">{{ $errors->first('textareaBlog') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>{{ trans('message.file') }}</span>
                                <input type="file" name="imageBlog">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <label>{{ trans('message.publish') }}</label>
                        <div class="switch">
                            <label>
                                {{ trans('message.not') }}
                                <input type="checkbox" name="txtPubBlog" id="txtPubBlog"@if (old('txtPubBlog') == 'on') checked @endif>
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