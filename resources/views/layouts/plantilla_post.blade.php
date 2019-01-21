<!DOCTYPE html>
<html>
	<head>
		<title>@foreach ($Posts as $post){{ $post->post_tit }}@endforeach| {{ config('app.name') }}</title>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="{{ asset('/img/claves-elbauldelcodigo_ico.png') }}" type="image/png" />
		<meta name="description" content="@foreach ($Posts as $post){{ $post->post_desc }}@endforeach">
		<meta name="keywords" content="@foreach ($Posts as $post){{ $post->post_key }}@endforeach">
		<meta name="copyright" content="Copyright © 2014 elbauldelcodigo.com">
		<meta name="author" content="jhons1101">
		<meta name="theme-color" content="#ffffff">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
		
		<meta property="og:title" content="@foreach ($Posts as $post){{ $post->post_tit }}@endforeach || elbauldelcodigo">
		<meta property="og:site_name" content="elbauldelcodigo">
		<meta property="og:url" content="www.elbauldelcodigo.com">
		<meta property="og:description" content="@foreach ($Posts as $post){{ $post->post_desc }}@endforeach">
		<meta property="fb:app_id" content="1386964998221435">
		<meta property="og:type" content="website">

		<span itemscope>
			<meta itemprop="name" content="elbauldelcodigo">
			<meta itemprop="description" content="@foreach ($Posts as $post){{ $post->post_desc }}@endforeach">
		</span>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({
				google_ad_client: "ca-pub-1633769788245402",
				enable_page_level_ads: true
			});
		</script>
		<script>
			var EstaUrl = document.URL;
			var res = EstaUrl.split("//");
			var EstaUrl = res[1];
			var rutaPagina = EstaUrl.split("/")
		</script>

		<meta itemprop="name" content="twitter">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@jhons1101">
		<meta name="twitter:title" content="elbauldelcodigo" />
		<meta name="twitter:description" content="@foreach ($Posts as $post){{ $post->post_desc }}@endforeach">
		<meta name="twitter:url" content="http://elbauldelcodigo.com/" />

		@yield('img-for-share')

		<meta property="og:image" content="{{ asset('/img/elbauldelcodigo.com_front_3.png') }}" />
		<link href="{{ asset('/img/elbauldelcodigo.com_front_3.png') }}" rel="image_src" />

		<link rel="stylesheet" href="{{{ asset('/materialize/css/materialize.min.css') }}}">
		<link rel="stylesheet" href="{{{ asset('/css/tidy.css')    }}}">
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
		<script type="text/javascript">@yield('javascript')</script>
		<style>img{cursor: pointer;} @yield('css')</style>
	</head>
	<body>
		<script type="text/javascript">
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-81299925-1', 'auto');
			ga('send', 'pageview');
		</script>
		<header style="z-index:100; position: relative;">
			<nav>
			    <div class="nav-wrapper">
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
					<ul class="hide-on-med-and-down">
						<li class="li-logo">
							<a class="navbar-brand" href="{{ asset('/') }}">
								<img src="{{ asset('/img/claves-elbauldelcodigo.png') }}" alt="ElbauldelCodigo.com" title="Ir al inicio de ElbauldelCodigo.com" class="logo_TC" />
							</a>
						</li>
						<li><h1><a href="{{ asset('/') }}" style="color:white;"><i><b>{{ config('app.name') }}</b></i></a></h1></li>
						{{-- <li><a class="txtWhite" href="{{ asset('/foro') }}">{{ trans('message.foro') }}</a></li> --}}
						<li><a class="txtWhite" href="{{ asset('/blog') }}">{{ trans('message.blog') }}</a></li>
						<li class="txtWhite">{{ trans('message.groupWS') }} {{ trans('message.celWS') }}</li>
						<li>
							<a href="https://www.facebook.com/groups/1820752601515497/" class="txtWhite" target="_blank">
								{{ trans('message.groupFB') }}
							</a>
						</li>
						@if (Auth::guest())
						<li><a class="txtWhite" href="{{ asset('/login') }}">{{ trans('message.login') }}</a></li>
                    	<li><a class="txtWhite" href="{{ asset('/register') }}">{{ trans('message.register') }}</a></li>
						@else
                    	<li><a class="txtWhite" href="{{ asset('/home') }}">{{ trans('message.seccionHome') }}</a></li>
						@endif
						<li><a class="txtWhite" href="{{ asset('/contacto') }}">{{ trans('message.contact') }}</a></li>
						@if (!Auth::guest())
						<li>
							<a href="/logout" class="txtWhite" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								{{ trans('message.logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
						@endif
					</ul>
					<ul class="side-nav" id="mobile-demo">
						<li class="li-svg">
							<a class="navbar-brand" href="{{ asset('/') }}">
								<img src="{{ asset('/') }}img/claves-elbauldelcodigo.png" alt="ElbauldelCodigo.com" title="Ir al inicio de ElbauldelCodigo.com" class="logo_TC" />
							</a>
						</li>
						<li><a href="{{ asset('/foro') }}">{{ trans('message.foro') }}</a></li>
						<li><a href="{{ asset('/blog') }}">{{ trans('message.blog') }}</a></li>
						<li class="aMovil">{{ trans('message.groupWS') }} {{ trans('message.celWS') }}</li>
						<li style="display: inline-block;">
							<a href="https://www.facebook.com/groups/1820752601515497/" class="aMovil" target="_blank">
								{{ trans('message.groupFB') }}
							</a>
						</li>
						@if (Auth::guest())
						<li><a href="{{ asset('/login') }}">{{ trans('message.login') }}</a></li>
                    	<li><a href="{{ asset('/register') }}">{{ trans('message.register') }}</a></li>
						@else
                    	<li><a href="{{ asset('/home') }}">{{ trans('message.seccionHome') }}</a></li>
						@endif
						<li><a class="aMovil" href="{{ asset('/contacto') }}">{{ trans('message.contact') }}</a></li>
						@if (!Auth::guest())
						<li>
							<a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								{{ trans('message.logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
						@endif
					</ul>
			    </div>
			</nav>
	    </header>
		<div class="">
			<div class="cover-image"></div>
			<div style="height: 50%; width: 100%; position: absolute; top: 0">
     			<paper-fab class="wow fadeInUp desktop-fab" icon="shop"></paper-fab>
			</div>
			<div class="wow fadeInUp content-card">
				<paper-fab class="mobile-fab" icon="shop"></paper-fab>
				<div class="row">
					<div class="col s12 m12 l12">
						@include('partials.errors')
					</div>
				</div>
				<div class="icon-and-title-flex">
					<div class="cajaTema">
						<div class="texTema">
						@foreach ($Posts as $post){{ $post->tema_txt }}@endforeach
						<input id="tema_txt" type="hidden" value="@foreach ($Posts as $post){{ $post->tema_txt }}@endforeach" />
						</div>
					</div>
					<div class="title-container">
						<h1 class="text-title">
							@foreach ($Posts as $post){{ $post->post_tit }}@endforeach
							<input id="post_tit" type="hidden" value="@foreach ($Posts as $post){{ $post->post_tit }}@endforeach" />
						</h1>
						<div class="fecha-blogger">
							{{ trans('message.forBy') }} : 
							@foreach ($Posts as $post)
								<a href="/usuario/{{ $post->usuarios_name }}" target="_blank">{{ $post->usuarios_name }}</a>
							@endforeach
						</div>
						<div class="fecha-blogger">@foreach ($Posts as $post){{ $post->post_fec }}@endforeach</div>
						<div class="fecha-blogger">{{ trans('message.tags') }} : @yield('TagsPost')</div>
					</div>
				</div>
				<div class="text-description">
					@yield('PostContent')
				</div>
			</div>
			<div class="wow fadeInUp content-card" style="margin-top:2%;box-shadow: none;background: none;" id="redesSoc">
				<div class="row" style="text-align: center;">
					<img src="{{ asset('/img/compartir-facebook.png') }}" alt="{{ trans('message.shareFB') }}"  id="facebookbot" class="separar-img" title="{{ trans('message.shareFB') }}">
			        <img src="{{ asset('/img/compartir-google.png') }}"   alt="{{ trans('message.shareGoo') }}" id="googlebot"   class="separar-img" title="{{ trans('message.shareGoo') }}">
			        <img src="{{ asset('/img/compartir-twitter.png') }}"  alt="{{ trans('message.shareTw') }}"  id="twitterbot"  class="separar-img" title="{{ trans('message.shareTw') }}">
			        <img src="{{ asset('/img/compartir-blogger.png') }}"  alt="{{ trans('message.shareBg') }}"  id="bloggerbot"  class="separar-img" title="{{ trans('message.shareBg') }}">
			        <img src="{{ asset('/img/compartir-embebido.png') }}" alt="{{ trans('message.shareCe') }}"  id="embebidobot" class="separar-img" title="{{ trans('message.shareCe') }}">
			        <img src="{{ asset('/img/compartir-url.png') }}"      alt="{{ trans('message.shareUrl') }}" id="urlbot"      class="separar-img" title="{{ trans('message.shareUrl') }}">
			    </div>
			</div>
			<div class="wow fadeInUp content-card" style="margin-top: 0;">


				<div class="row">
				    <div class="col s12 m12 l12">
				        <ul class="tabs">
					        <li class="tab"><a href="#codefte" class="active">{{ trans('message.codFte') }}</a></li>
					        <li class="tab"><a href="#pantallazos" class="active">{{ trans('message.screen') }}</a></li>
				        </ul>
				    </div>
				</div>


			    <div id="codefte" class="col s12">
					<main class="text-description">
						@yield('CodigoFte')
						<br /><br /><br /><br />
						<a href="#redesSoc">
							{{ trans('message.usefulContent') }}
						</a>
						<hr />
						<div class="row">
							{{ Form::open(array('method' => 'POST', 'name' => 'guardarComentario', 'url' => 'guardarComentario')) }}
							<div class="col s12 m12 l12">
								<br /><br />
								<span class="labelComentario">{{ trans('message.addComment') }}</span>
								<br /><br />
							</div>
							<div class="col s12 m12 l12">
								<label for="emailComm" data-error="wrong" data-success="right" class="labelbk">{{ trans('message.email') }}</label>
									{{ Form::email('email', null, array(
										'class'			=> 'validate',
										'id' 			=> 'emailComm',
										'placeholder'	=> trans('message.writeEmail'),
										'required',
										'maxlength'		=> '120'))
									}}
								<span class="erroresLaravel" >{{ $errors->first('email')}}</span>
							</div>
							<div class="col s12 m12 l12">
							  <label for="commText" class="labelbk">{{ trans('message.writeComment') }}</label>
								{{ Form::textarea('comentario', null, array(
									'class'			=> 'commText materialize-textarea',
									'id'			=> 'commText',
									'placeholder'	=> trans('message.writeBodyComment'),
									'required',
									'maxlength'		=> '2000'))
								}}
								<span class="erroresLaravel" >{{ $errors->first('comentario')}}</span>
								<div class="etiquetasDisponibles">
									<span>{{ trans('message.tagsAval') }}</span>
									&#60;pre&#62;&#60;/pre&#62;, &#60;p&#62;&#60;/p&#62;,  &#60;div&#62;&#60;/div&#62;, + ({{ trans('message.taggerUser') }})
								</div>
								<br />
								<div class="captchaText">{{$keyCp}}</div>
								<br />
								<input type="text" name="codecaptcha" width="300px" placeholder="{{ trans('message.writeCaptcha') }}"/>
								<br />
								{{ Form::hidden('idPost', null, array('id' => 'idPost')) }}
								{{ Form::button(trans('message.saveComment'), array(
									'class' => 'btn waves-effect waves-light',
									'type'  => 'submit'))
								}}
								<i class="material-icons right"></i>
								<br /><br /><br /><br />
							</div>
							{{ Form::close() }}
						</div>


						@if (count($comm) <= 0)
						   <div>{{ trans('message.zeroComments') }}</div>
						@else
							@foreach($comm as $comentario)
								<div class="col s12 m12 l12">
									<div class="card-panel grey lighten-5 z-depth-1" style="font-family: RobotoDraft,sans-serif; font-size: 17px;">
										<div class="row valign-wrapper">
											<div class="col s3 m2 l1 ">
												@if ($comentario->usuarios_img == null)
													<img src="{{ asset('/img/usuarios/img_default.png') }}" class="circle responsive-img">
												@else
													<img src="{{ asset('/img/usuarios') }}/{{ $comentario->usuarios_img }}" class="circle responsive-img">
												@endif
											</div>
											<div class="col s9 m10 l11" style="padding-left:10px">
												<div class="ComUser">{{ $comentario->usuarios_name }}</div>
												<div class="ComUser ComFecha">{{ $comentario->com_fec }}</div>
												<div class="ComUser ComTexto">
													{{ $comentario->com_texto }}
												</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						@endif
						<script>
							setTimeout(function(){
								document.getElementById("idPost").value = rutaPagina[2];
							}, 3000);
						</script>


					</main>
				</div>


			    <div id="pantallazos" class="col s12 m12 l12 txt-center text-description">
					@if ($totalImg > 0)
						@foreach ($pantallazo as $imagen)
							@if ($imagen->tipo == 1)
								<p class="resaltadoRojo">{{ $imagen->referencia }}</p>
								<br />
							@elseif ($imagen->tipo == 2)
								<p class="resaltadoAzul">{{ $imagen->referencia }}</p>
								<br />
							@elseif ($imagen->tipo == 3)
								<p class="resaltadoVerde">{{ $imagen->referencia }}</p>
								<br />
							@else
								<p class="justificado">{{ $imagen->referencia }}</p>
							@endif
							<img src="{{ $imagen->ruta }}" alt="{{ $imagen->alt_title }}" title="{{ $imagen->alt_title }}" width="{{ $imagen->width }}%">
							<br /><br /><hr /><br />
						@endforeach
					@else
						<div class="s12 m12 l12">
							<div class="resaltadoRojo">{{ trans('message.zeroSreen') }}</div>
						</div>
					@endif
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
							<b></i>{{ trans('message.groupWS') }} {{ trans('message.celWS') }}</i></b>
						</p>
						<p>
							<a href="https://www.facebook.com/groups/1820752601515497/" target="_blank">
								{{ trans('message.groupFB') }}
							</a>
						</p>
				    </div>
				</div>
			</div>
		</div>


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
		        	<a class="btn-floating red" title="{{ trans('message.shareGoo') }}" href="https://plus.google.com/b/109009744640604915833/+ElbauldelcodigoOficial/posts" target="_blank">
		        		<img src="/img/mini-google.png"  style="position: relative; top: 8px;" alt="{{ trans('message.shareGoo') }}">
		        	</a>
		        </li>
		        <li class="shareBtn">
		        	<a class="btn-floating blue" title="{{ trans('message.shareTw') }}" href="https://twitter.com/Jhons1101" target="_blank">
		        		<img src="/img/mini-twitter.png" style="position: relative; top: 8px;" alt="{{ trans('message.shareTw') }}">
		        	</a>
		        </li>
		        <li class="shareBtn">
		        	<a class="btn-floating blue" title="{{ trans('message.groupWS') }} {{ trans('message.celWS') }}" href="https://web.whatsapp.com/" target="_blank">
		        		<img src="/img/whatsapp.png" style="position: relative; top: 2px; right: -2px;" alt="{{ trans('message.groupWS') }} {{ trans('message.celWS') }}">
		        	</a>
		        </li>
		    </ul>
		</div>


  		<div id="modal1" class="modal modal-fixed-footer" style="width: 550px;height: 320px;">
    		<div class="modal-content">
      			<div class="text-description">{{ trans('message.copyCode') }}</div>
      			<br />
      			<script>
      				document.write('<p>&#60;iframe width="560" height="315" src="'+document.URL+'" frameborder="0" allowfullscreen>&#60;/iframe&#62;</p>')
      			</script>
      			<br />
      			<span class="text-description">{{ trans('message.changeProperties') }}</span>
    		</div>
   		 	<div class="modal-footer">
      			<a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">{{ trans('message.accept') }}</a>
      		</div>
  		</div>


  		<div id="modal2" class="modal modal-fixed-footer" style="width: 550px;height: 210px;">
    		<div class="modal-content">
      			<div class="text-description">{{ trans('message.copyCode') }}</div>
      			<br />
      			<script>
      				document.write('<p>&#60;a href="'+document.URL+'" target="_blank">{{ trans('message.visitNow') }}&#60;/a&#62;</p>')
      			</script>
      		</div>
   		 	<div class="modal-footer">
      			<a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">{{ trans('message.accept') }}</a>
      		</div>
  		</div>


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