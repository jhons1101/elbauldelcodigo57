@extends('layouts.app')

@section('css')
    <style>

    </style>
@stop

@section('seccionApp')
{{ trans('message.signIn') }}
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
                        <div class="card-header">{{ trans('message.signIn') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <label>{{ trans('message.username') }}</label>
                                        <div class="input-field">
                                            <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus>
                                            @if ($errors->has('name'))
                                                <span class="helper-text red-text text-darken-4 text-darken-4">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l12">
                                        <label>{{ trans('message.email') }}</label>
                                        <div class="input-field">
                                            <input id="email" type="email" name="email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="helper-text red-text text-darken-4 text-darken-4">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l12">
                                        <label>{{ trans('message.password') }}</label>
                                        <div class="input-field">
                                            <input id="password" type="password"  name="password">
                                            @if ($errors->has('password'))
                                                <span class="helper-text red-text text-darken-4 text-darken-4">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l12">
                                        <label>{{ trans('message.confirmPassword') }}</label>
                                        <div class="input-field">
                                            <input id="password-confirm" type="password" name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l12">
                                        <div class="input-field">
                                            <button type="submit" class="waves-effect waves-light btn ancho100">
                                                {{ trans('message.signIn') }}
                                            </button>
                                        </div>
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
