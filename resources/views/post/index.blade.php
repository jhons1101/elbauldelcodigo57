@extends('layouts/index')
@extends('layouts.plantilla_header')
@extends('layouts.plantilla_autor')
@extends('layouts.plantilla_tematica')
@extends('layouts.plantilla_footer')

@section('css')
<style>
.table {
    border-collapse: unset !important;
    border: 0;
}
.cardFooter {
    width:100%;
}
.ancho50 {
    width:50%;
}
.bgwhite {
    background-color: #fff !important;
}
.pagination li.active {
    background-color: #00adb5 !important;
}
.anchoauto {
    width:auto !important;
}
</style>
@stop

@section('post')
    @foreach ($post as $post)
    <div class="col s12 m4 l4">
        <div class="card basic">
            <div class="card-image waves-effect waves-block waves-light">
                <div class="cardHeader">
                    <h3 class="cardHeaderText">
                        <a href="{{asset('/tema')}}/{{ $post->tema_txt }}" target="_blank">
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
            <div class="cardFooter">
            <table width="100%" class="table">
                <tr>
                    <td class="left-align ancho50"><a href="{{ asset('/post') }}/{{ $post->slug }}">{{ trans('message.leerMas') }}</a></td>
                    @if (auth()->user())
                        @if ($roles->rol_user_id == 1)
                            <td class="right-align ancho50"><a href="/post/{{ $post->slug }}/edit">Editar</a></td>
                        @endif
                    @endif
                </tr>
            </table>
            </div>
        </div>
    </div>
    @endforeach
@stop