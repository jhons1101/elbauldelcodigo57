<div class="switch-language">
    <a href="{{ asset(''.$urlLang.'?lang=es') }}">
        <img src="{{ asset('img/texto-latino.png') }}" alt="{{ trans('message.textLatino') }}" title="{{ trans('message.textLatino') }}">
    </a>
    <a href="{{ asset(''.$urlLang.'?lang=en') }}">
        <img src="{{ asset('img/texto-ingles.png') }}" alt="{{ trans('message.textEnglish') }}" title="{{ trans('message.textEnglish') }}">
    </a>
</div>
<style>.switch-language { position: absolute; top: 72px; right: 40px; z-index: 100;} .switch-language img { width: 30px;}</style>