@section('footer')
<footer class="page-footer">
    <div class="container">
        <div class="row border-bottom">
            &nbsp;
        </div>
        <div class="row center">
            <div class="social-feed">
                <a href="https://es-la.facebook.com/elBaulDelCodigo/" target="_blank">
                    <span class="icon-facebook2"></span>
                </a>
                <a href="https://twitter.com/Jhons1101" target="_blank">
                    <span class="icon-twitter2"></span>
                </a>
                <a href="https://www.linkedin.com/in/john-stiven-vargas-escobar-10b80559/" target="_blank">
                    <span class="icon-linkedin"></span>
                </a>
                <a href="https://www.youtube.com/channel/UCKknAKQZlXlOhkLo409mHKw" target="_blank">
                    <span class="icon-youtube4"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            {{ trans('message.powerBy') }}
            <a class="grey-text text-lighten-4 right" href="#!">{{ trans('message.improveBc') }}</a>
        </div>
    </div>
</footer>
@endsection