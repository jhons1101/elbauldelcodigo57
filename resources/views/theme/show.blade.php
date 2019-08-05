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
    @if (count($paginate) > 0)
    <div class="input-field">
        <table>
            <thead>
                <tr>
                    <th colspan="5">{{ trans('message.relatedTo') }}:  {{ $alltheme->tema_txt }}</th>
                </tr>
                <tr>
                    <th width="13%">{{ trans('message.author') }}</th>
                    <th width="30%">{{ trans('message.name') }} {{ trans('message.ofThe') }} {{ trans('message.post') }}</th>
                    <th width="25%">{{ trans('message.describe') }}</th>
                    <th width="15%">{{ trans('message.date') }}</th>
                    <th width="7%">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paginate as $post)
                    <tr>
                        <td data-label="{{ trans('message.author') }}">{{ $post->name }}</td>
                        <td data-label="{{ trans('message.name') }} {{ trans('message.ofThe') }} {{ trans('message.post') }}">{{ $post->post_tit }}</td>
                        <td data-label="{{ trans('message.describe') }}">{{ $post->post_desc }}</td>
                        <td data-label="{{ trans('message.date') }}">{{ $post->updated_at }}</td>
                        <td data-label="">
                            <a href="/post/{{ $post->slug }}" target="_blank">
                                <button class="waves-effect grey darken-4 btn-small txtWhite" name="action">{{ trans('message.show') }}
                                    <i class="material-icons right"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
@stop