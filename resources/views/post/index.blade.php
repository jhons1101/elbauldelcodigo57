@extends('layouts/index')
@extends('layouts.plantilla_header')
@extends('layouts.plantilla_autor')
@extends('layouts.plantilla_tematica')
@extends('layouts.plantilla_footer')

@section('post')
    @foreach ($post as $post)
    <div class="col s12 m4 l4">
        <div class="card basic">
            <div class="card-image waves-effect waves-block waves-light">
                <div class="cardHeader">
                    <h3 class="cardHeaderText">
                        <a href="{{asset('/tema')}}/{{ $post->slug }}" target="_blank">
                            {{ $post->tema_txt }}
                        </a>
                    </h3>
                </div>
            </div>
            <a href="{{ asset('/post') }}/{{ $post->slug }}">
                <div class="card-content">
                    <h2 class="card-title activator grey-text text-darken-4">{{$post->post_tit}}</h2>
                </div>
            </a>
            <div class="cardFooter"><a href="{{ asset('/post') }}/{{ $post->slug }}">{{ trans('message.leerMas') }}</a></div>
        </div>
    </div>
    @endforeach
@stop