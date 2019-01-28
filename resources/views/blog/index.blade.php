@extends('layouts.plantilla_blog')
@extends('layouts.header_blog')
@extends('layouts.footer_blog')

@section('content')
<div class="row">
    <div class="col s12 m6">&nbsp;</div>
    <div class="col s12 m6">
        <div class="buscador input-field" id="buscar">
            {!! Form::open (['route' => 'blog.index', 'method' => 'GET' ]) !!}
                <i class="material-icons prefix">search</i>
                <input id="buscarBlog" type="text" class="validate" name="buscar" value="{{ $buscar }}">
                <label for="buscarBlog">{{ trans('message.search') }}...</label>
                <button class="hide" type="submit">{{ trans('message.search') }}
                    <i class="material-icons right">send</i>
                </button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m8">
        @foreach ($blogs as $blog)
            <div class="row blog">
                <div class="col s4 m4 topImage">
                    <img src="{{ asset('img/blog') }}/{{ $blog->image }}" alt="blog" width="100%">
                    <div class="col s12 blog-option fecha"><b>{{ trans('message.date') }}:</b> {{ $blog->updated_at }}</div>
                </div>
                <div class="col s8 m8">
                    <div class="col s12 blog-title">
                        <a href="{{ asset('blog') }}/{{ $blog->slug }}">
                            {{ $blog->title }}
                        </a>
                    </div>
                    <div class="col s12 blog-desc">{!! html_entity_decode($blog->preview, ENT_QUOTES, 'UTF-8') !!}</div>
                </div>
            </div>
        @endforeach
        <div class="row">
            @include('partials.paginate')
        </div>
    </div>
    <div class="col s12 m4">
        <h2 class="lomasleido">{{ trans('message.topFive') }}</h2>
        <div class="col s12">
            @foreach ($topLeido as $blog)
                <div class="row blog">
                    <div class="col s12 m4">
                        <img src="{{ asset('img/blog') }}/{{ $blog->image }}" alt="blog" width="100%" />
                        <div class="col s12 top-blog-title">
                            <a href="{{ asset('blog') }}/{{ $blog->slug }}">
                                {{ $blog->title }}
                            </a>
                        </div>
                    </div>
                    <div class="col s12 m8">
                        <div class="col s12 top-blog-desc">{!! html_entity_decode($blog->preview, ENT_QUOTES, 'UTF-8') !!}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection