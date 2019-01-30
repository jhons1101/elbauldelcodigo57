@extends('layouts.plantilla_blog')
@extends('layouts.header_blog')
@extends('layouts.footer_blog')

@section('content')
<style>
.image-blog {
    background-color: rgba(0,0,0,0.8);
    background-repeat: no-repeat;
    background-position: left;
    background-clip: padding-box;
    background-origin: content-box;
    background-size: 100% 100%;
    height: 400px;
    max-width: 100%;
    filter:brightness(0.4);
    background-image:url({{ asset('/img/blog/'.$blog->image.'') }});
}
.image-blog::after {
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.6);
    z-index:-1;
}
.image-blog h1 {
    color: #fff;
    position: relative;
    top: 70%;
    text-align:center;
    padding: 0 10px;
    word-break: break-all;
}
.blog-show-tag, .blog-show-user, .blog-show-date {
    font-size: 20px;
    font-weight: 600;
    word-break: break-all;
}
.blog-show-tag a {
    color: #5a5959;
}
.blog-show-user, .blog-show-date {
    color: #333;
}
.blog-show-text {
    font-size: 18px;
    text-align: justify;
    word-break: break-all;
}
.editarBlog {
    padding: 10px 0;
}
.editarBlog a {
    padding: 6px 10px 0 10px;
}
</style>
<div class="row">
    <div class="col s12 m8">
        <div class="row">
            <div class="image-blog ancho100">
                <h1>{{ $blog->title }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="blog-show-tag">{{ trans('message.tags') }}:
                    @foreach ($tagsBlog as $tag)
                        <a href="{{ asset('tema/'.$tag->tag_txt.'') }}">
                            <span class="icon-price-tag"></span> {{ ucfirst($tag->tag_txt) }}
                        </a>
                    @endforeach
                </div>
                <div class="blog-show-user">{{ trans('message.username') }}: {{ ucfirst($userBlog->name) }}</div>
                <div class="blog-show-date">{{ trans('message.date') }}: {{ $blog->created_at }}</div>
                @if (!Auth::guest())
                    <div class="editarBlog">
                        <a href="{{ asset('blog/'.$blog->slug.'/edit') }}" class="waves-effect waves-light btn">
                            <i class="material-icons right">cloud</i>
                            editar
                        </a>
                    </div>
                @endif
            </div>
        </div>
        <div class="row blog-show-text">
            {!! html_entity_decode($blog->text, ENT_QUOTES, 'UTF-8') !!}
        </div>
        <div class="row">
            <div class="content-card center" id="redesSocBlog">
                <div class="row">
                    <img src="{{ asset('/img/compartir-facebook.png') }}" alt="{{ trans('message.shareFB') }}"  id="facebookbot" class="separar-img-blog" title="{{ trans('message.shareFB') }}">
                    <img src="{{ asset('/img/compartir-google.png') }}"   alt="{{ trans('message.shareGoo') }}" id="googlebot"   class="separar-img-blog" title="{{ trans('message.shareGoo') }}">
                    <img src="{{ asset('/img/compartir-twitter.png') }}"  alt="{{ trans('message.shareTw') }}"  id="twitterbot"  class="separar-img-blog" title="{{ trans('message.shareTw') }}">
                    <img src="{{ asset('/img/compartir-blogger.png') }}"  alt="{{ trans('message.shareBg') }}"  id="bloggerbot"  class="separar-img-blog" title="{{ trans('message.shareBg') }}">
                    <img src="{{ asset('/img/compartir-embebido.png') }}" alt="{{ trans('message.shareCe') }}"  id="embebidobot" class="separar-img-blog" title="{{ trans('message.shareCe') }}">
                    <img src="{{ asset('/img/compartir-url.png') }}"      alt="{{ trans('message.shareUrl') }}" id="urlbot"      class="separar-img-blog" title="{{ trans('message.shareUrl') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="fb-comments" data-href="{{ asset('blog/'.$blog->slug.'') }}" data-width="100%" data-numposts="5"></div>
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

<!-- Modales para copartir el Blog, post, etc... -->
@include('partials.modalShare')
@endsection