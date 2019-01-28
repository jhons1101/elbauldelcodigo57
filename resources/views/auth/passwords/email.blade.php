@extends('layouts.app')

@section('css')
    <style>

    </style>
@stop

@section('seccionApp')
{{ trans('message.resetPassword') }}
@stop

@section('content')
    <div class="container">
        <br />
        <br />
        <div class="row">
            <div class="col s3 m5 l5">&nbsp;</div>
            <div class="col s6 m2 l2 center-align">
                <img src="{{ asset('img/claves-elbauldelcodigo.png') }}" title="{{ config('app.name') }}" alt="{{ config('app.name') }}" class="img-logo" />
            </div>
            <div class="col s3 m5 l5">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col s12 m3 l3">&nbsp;</div>
            <div class="col s12 m6 l6">
                <div class="col s12 m2 l2">&nbsp;</div>
                <div class="col s12 m8 l8">
                    <div class="card">
                        <div class="card-header">{{ trans('message.resetPassword') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <label>{{ trans('message.email') }}</label>
                                        <div class="input-field">
                                            <input id="email" type="email" name="email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="helper-text red-text text-darken-4 text-darken-4">
                                                    {{ $errors->first('email') }}
                                                </span>
                                            @endif
                                            @if (session('status'))
                                                <div class="card-panel blue-text blue lighten-5 center-align padding10">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <button type="submit" class="waves-effect waves-light btn ancho100">
                                            {{ __('message.linkResetPassword') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col s12 m2 l2">&nbsp;</div>
            </div>
            <div class="col s12 m3 l3">&nbsp;</div>
        </div>
    </div>
</div>
@endsection
