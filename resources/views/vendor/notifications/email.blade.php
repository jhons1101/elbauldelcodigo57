@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}<br>{{ config('app.name') }}.com
@else
@lang('Regards'),<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
{{ trans('message.subcopyEmailReset1').$actionText.trans('message.subcopyEmailReset2')}}
{{ trans('message.intoSubCopy') }}
<br />
<a target="_blank" rel="noopener noreferrer" href="'.$actionUrl.'" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #3869D4;">
    {{ $actionUrl }}
</a>
@endcomponent
@endisset
@endcomponent
