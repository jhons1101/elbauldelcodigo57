<!DOCTYPE html>
<html>
	<head>
		<title>{{ $post->post_tit }} | {{ config('app.name') }}</title>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="{{ asset('/img/claves-elbauldelcodigo_ico.png') }}" type="image/png" />
		<meta name="description" content="{{ $post->post_desc }}">
		<meta name="keywords" content="{{ $post->post_key }}">
		<meta name="copyright" content="Copyright © 2014 elbauldelcodigo.com">
		<meta name="author" content="jhons1101">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
		
		<meta property="og:title" content="{{ $post->post_tit }} || elbauldelcodigo">
		<meta property="og:site_name" content="elbauldelcodigo">
		<meta property="og:url" content="www.elbauldelcodigo.com">
		<meta property="og:description" content="{{ $post->post_desc }}">
		<meta property="fb:app_id" content="1386964998221435">
		<meta property="og:type" content="website">

		<span itemscope>
			<meta itemprop="name" content="elbauldelcodigo">
			<meta itemprop="description" content="{{ $post->post_desc }}">
		</span>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script> (adsbygoogle = window.adsbygoogle || []).push({ google_ad_client: "ca-pub-1633769788245402", enable_page_level_ads: true });</script>

		<meta itemprop="name" content="twitter">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@jhons1101">
		<meta name="twitter:title" content="elbauldelcodigo" />
		<meta name="twitter:description" content="{{ $post->post_desc }}">
		<meta name="twitter:url" content="http://elbauldelcodigo.com/" />

		@yield('img-for-share')

		<link rel="stylesheet" href="{{{ asset('/materialize/css/materialize.min.css') }}}">
		<link rel="stylesheet" href="{{{ asset('/css/tidy.css')	}}}">
		<link rel="stylesheet" href="{{{ asset('/css/animate.css') }}}">
		<link rel="stylesheet" href="{{{ asset('/css/prism.css')   }}}">
		<link rel="stylesheet" href="{{{ asset('/fonts/style.css') }}}">
		<link rel="stylesheet" href="{{{ asset('/css/index.css')   }}}">
		<link rel="stylesheet" href="{{{ asset('/css/tablas-responsive.css')}}}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/roboto/Roboto-Medium.woff">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/roboto/Roboto-Medium.woff2">
		<link href="https://fonts.googleapis.com/css?family=Kavivanar|Pacifico" rel="stylesheet">
		
		<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
		<script src="{{ asset('materialize/js/materialize.min.js') }}"></script>
		<script src="{{ asset('js/index.js') }}"></script>
		@yield('javascript')
		@yield('css')
	</head>
	<body>
		<script type="text/javascript">(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create', 'UA-81299925-1', 'auto');ga('send', 'pageview');</script>
		<div id="fb-root"></div><script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2';fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
		@include('partials.lang')
		@yield('header')
		<div class="">
			<div class="wow fadeInUp content-card">
				<paper-fab class="mobile-fab" icon="shop"></paper-fab>
				<div class="row">
					<div class="col s12 m12 l12">
						@include('partials.errors')
					</div>
				</div>
				<div class="icon-and-title-flex">
					<div class="col s12">
						<h1 class="text-title">
							{{ $post->post_tit }}
							<input id="post_tit" type="hidden" value="{{ $post->post_tit }}" />
						</h1>
						<div class="fecha-blogger">
							{{ trans('message.forBy') }} : 
							<a href="/usuario/{{ $post->name }}" target="_blank">{{ $post->name }}</a>
						</div>
						<div class="fecha-blogger">{{ $post->post_fec }}</div>
						<div class="fecha-blogger">{{ trans('message.tags') }} : @yield('TagsPost')</div>
					</div>
				</div>
				<hr />
				<div class="rowMarginTop50 text-description">
					@yield('PostContent')
				</div>
			</div>
			<div class="wow fadeInUp content-card" style="margin-top:2%;box-shadow: none;background: none;" id="redesSoc">
				<div class="row" style="text-align: center;">
					<img src="{{ asset('/img/compartir-facebook.png') }}" alt="{{ trans('message.shareFB') }}"  id="facebookbot" class="separar-img" title="{{ trans('message.shareFB') }}">
					<img src="{{ asset('/img/compartir-twitter.png') }}"  alt="{{ trans('message.shareTw') }}"  id="twitterbot"  class="separar-img" title="{{ trans('message.shareTw') }}">
					<img src="{{ asset('/img/compartir-blogger.png') }}"  alt="{{ trans('message.shareBg') }}"  id="bloggerbot"  class="separar-img" title="{{ trans('message.shareBg') }}">
					<img src="{{ asset('/img/compartir-embebido.png') }}" alt="{{ trans('message.shareCe') }}"  id="embebidobot" class="separar-img" title="{{ trans('message.shareCe') }}">
					<img src="{{ asset('/img/compartir-url.png') }}"	  alt="{{ trans('message.shareUrl') }}" id="urlbot"	  class="separar-img" title="{{ trans('message.shareUrl') }}">
				</div>
			</div>
			<div class="wow fadeInUp content-card" style="margin-top: 0;">
				<div id="codefte" class="col s12">
					<main class="text-description">
						@yield('CodigoFte')
						<br /><br /><br />
						<a href="#redesSoc">
							{{ trans('message.usefulContent') }}
						</a>
						<hr />
						<div class="row">
							<div class="fb-comments" data-href="{{ asset('post/'.$post->slug.'') }}" data-width="100%" data-numposts="5"></div>
						</div>
					</main>
				</div>
				<!-------------------------------------------------------------------------------------------------------------------------->
			</div>
			<br />
			<div class="wow fadeInUp content-card" style="margin-top: 0;">
				@if (count($relacionados) > 0 )
				<div class="row">
					<div class="col s12 m12 l12">
						<div id="publicidad">&nbsp;</div>
						<h1 class="text-title">{{ trans('message.articlesInterest') }}</h1>
						@foreach ($relacionados as $entrada)
							<div class="col s12 m12 l12 relacionado">
								<div class="articuloRelacionado">
									<span class="icon-clipboard"></span> &nbsp; <a href="/" target="_blank">{{$entrada->post_tit}}</a>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				@endif
				<div class="row">
					<div class="col s12 m12 l12">
						<p>
							<a href="https://www.facebook.com/groups/1820752601515497/" target="_blank">
								{{ trans('message.groupFB') }}
							</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<!--Botones flotantes -->
		<div class="fixed-action-btn" style="bottom: 55px; right: 24px;">
			<a class="btn-floating btn-large red" title="{{ trans('message.shareyou') }}" >
				<img src="/img/share.png" style="position: relative; transform: translateY(45%);width: 28px;" alt="{{ trans('message.shareyou') }}">
			</a>
			<ul>
				<li>
					<a class="btn-floating" style="background-color:#3B5998;" title="{{ trans('message.shareFB') }}" href="https://www.facebook.com/elBaulDelCodigo?ref=hl" target="_blank">
						<img src="/img/mini-facebook.png" style="position: relative; top: 8px;" alt="{{ trans('message.shareFB') }}">
					</a>
				</li>
				<li class="shareBtn">
					<a class="btn-floating blue" title="{{ trans('message.shareTw') }}" href="https://twitter.com/Jhons1101" target="_blank">
						<img src="/img/mini-twitter.png" style="position: relative; top: 8px;" alt="{{ trans('message.shareTw') }}">
					</a>
				</li>
			</ul>
		</div>
		<!-- Modales para compartir el Blog, post, etc... -->
		@include('partials.modalShare')
		<br />
		<br />
		<footer class="page-footer">
			<div class="flotarTwi centrar" style="padding: 8px 19px !important; height:80px;">
				<a href="https://twitter.com/Jhons1101" target="_blank" style="color:white;">
					<span class="icon-twitter"></span>
				</a>
			</div>
			<div class="container">
				<div class="row center subirFooter">
					<span class="nicknameTwi">
						<a href="/usuario/jhons1101" target="_blank" style="color:white;">@jhons1101</a><sup>©</sup>
					</span><br />
					<span>{{ trans('message.shareFooter') }}</span><br />
					<span>{{ trans('message.footerTags') }}</span>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					{{ trans('message.powerBy') }}
					<a class="grey-text text-lighten-4 right" href="#!">{{ trans('message.improveBc') }}</a>
				</div>
			</div>
		</footer>
		<script src="/js/wow.min.js"></script>
		<script>new WOW().init();</script>
		<script src="/js/prism.js"></script>
	</body>
</html>