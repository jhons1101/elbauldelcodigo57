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
                        <div class="card-header">{{ __('Verify Your Email Address') }}</div>
                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                        </div>
                    </div>
                    <div class="col s12 m2 l2">&nbsp;</div>
            </div>
            <div class="col s12 m3 l3">&nbsp;</div>
        </div>
    </div>
</div>
@endsection
