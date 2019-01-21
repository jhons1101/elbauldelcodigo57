@extends('layouts.app')

@section('css')
    <style>

    </style>
@stop

@section('seccionApp')
{{ trans('message.login') }}
@stop

@section('content')
    <div class="container">
        <br />
        <br />
        <div class="row">
            <div class="col s3 m5 l5">&nbsp;</div>
            <div class="col s6 m2 l2 center-align">
                <img src="{{ asset('img/claves-elbauldelcodigo.png') }}" title="{{ config('app.name') }}" alt="{{ config('app.name') }}" class="ancho100" />
            </div>
            <div class="col s3 m5 l5">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col s12 m3 l3">&nbsp;</div>
            <div class="col s12 m6 l6">
                <div class="col s12 m2 l2">&nbsp;</div>
                <div class="col s12 m8 l8">
                    <div class="card">
                        <div class="card-header">{{ trans('message.login') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <label>{{ trans('message.email') }}</label>
                                        <div class="input-field">
                                            <input id="email" type="email" name="email" value="{{ old('email') }}" autofocus>
                                            @if ($errors->has('email'))
                                                <span class="helper-text red-text text-darken-4 text-darken-4">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l12">
                                        <label>{{ trans('message.password') }}</label>
                                        <div class="input-field">
                                            <input id="password" type="password" name="password">
                                            @if ($errors->has('password'))
                                                <span class="helper-text red-text text-darken-4 text-darken-4">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l12">
                                        <button type="submit" class="waves-effect waves-light btn ancho100">
                                            {{ trans('message.login') }}
                                        </button>
                                    </div>
                                    <div class="col s6 m6 l6 left-align">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">
                                                {{ trans('message.forgotPassword') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col s6 m6 l6 right-align">
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">
                                                {{ trans('message.signIn') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col s12 m2 l2">&nbsp;</div>
            </div>
            <div class="col s12 m3 l3">&nbsp;</div>
        </div>
    </div>
@endsection
