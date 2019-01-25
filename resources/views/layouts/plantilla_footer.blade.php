@section('footer')
<footer class="page-footer">
    <div class="flotarTwi centrar" style="padding: 8px 19px !important; height:80px;">
        <a href="https://twitter.com/Jhons1101" target="_blank" style="color:white;">
            <span class="icon-twitter"></span>
        </a>
    </div>
    <div class="container">
        <div class="row center subirFooter">
            <span class="nicknameTwi">
                <a href="{{ asset('/usuario/jhons1101') }}" target="_blank" style="color:white;">@jhons1101</a><sup>©</sup>
            </span>
            <br>
            <span>{{ trans('message.follow') }}</span><br>
            <span>{{ trans('message.tagsFollow') }}</span>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            {{ trans('message.powerBy') }}
            <a class="grey-text text-lighten-4 right" href="#!">{{ trans('message.improveBc') }}</a>
        </div>
    </div>
</footer>
@stop