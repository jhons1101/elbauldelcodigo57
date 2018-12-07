<!DOCTYPE html>
<html>
	<head>
		<title>@foreach ($Posts as $post){{ $post->post_tit }}@endforeach</title>
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
						<li><h1><a href="{{ asset('/') }}" style="color:white;"><i><b>elbauldelcodigo</b></i></a></h1></li>
						<!--<li><a class="txtWhite" href="{{ asset('/foro') }}">Foro</a></li>
						<li><a class="txtWhite" href="{{ asset('/login') }}">Inicia Sesión</a></li>-->
						<li><a class="txtWhite" href="{{ asset('/contacto') }}">Contacto</a></li>
						<li class="txtWhite">Unete al grupo de whatsApp +57 316 392 6456</li>
						<li>
							<a href="https://www.facebook.com/groups/1820752601515497/" class="txtWhite" target="_blank">
								Sigue el grupo en facebook
							</a>
						</li>
					</ul>
					<ul class="side-nav" id="mobile-demo">
						<li class="li-svg">
							<a class="navbar-brand" href="{{ asset('/') }}">
								<img src="{{ asset('/') }}/img/claves-elbauldelcodigo.png" alt="ElbauldelCodigo.com" title="Ir al inicio de ElbauldelCodigo.com" class="logo_TC" />
							</a>
						</li>
						<!--<li><a href="{{ asset('/foro') }}">Foro</a></li>
						<li><a href="{{ asset('/login') }}">Inicia Sesión</a></li>-->
						<li><a class="aMovil" href="{{ asset('/contacto') }}">Contacto</a></li>
						<li class="aMovil">WhatsApp +57 316 392 6456</li>
						<li>
							<a href="https://www.facebook.com/groups/1820752601515497/" class="aMovil" target="_blank">
								Sigue el grupo en facebook
							</a>
						</li>
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
							Por : 
							@foreach ($Posts as $post)
								<a href="/usuario/{{ $post->usuarios_name }}" target="_blank">{{ $post->usuarios_name }}</a>
							@endforeach
						</div>
						<div class="fecha-blogger">@foreach ($Posts as $post){{ $post->post_fec }}@endforeach</div>
						<div class="fecha-blogger">Tags : @yield('TagsPost')</div>
						<input type="hidden" id="flagNuevoComm" value="@yield('flagNuevoComm')" />
					</div>
				</div>
				<div class="text-description">
					@yield('PostContent')
				</div>
			</div>
			<div class="wow fadeInUp content-card" style="margin-top:2%;box-shadow: none;background: none;" id="redesSoc">
				<div class="row" style="text-align: center;">
					<img src="/img/compartir-facebook.png" alt="compartir en facebook" id="facebookbot" class="separar-img" title="compartir en facebook">
			        <img src="/img/compartir-google.png" alt="compartir en Google" id="googlebot" class="separar-img" title="compartir en Google">
			        <img src="/img/compartir-twitter.png" alt="compartir en Twitter" id="twitterbot" class="separar-img" title="compartir en Twitter">
			        <img src="/img/compartir-blogger.png" alt="compartir en Blogger" id="bloggerbot" class="separar-img" title="compartir en Blogger">
			        <img src="/img/compartir-embebido.png" alt="compartir como código embebido" id="embebidobot" class="separar-img" title="compartir como código embebido">
			        <img src="/img/compartir-url.png" alt="compartir la url" id="urlbot" class="separar-img" title="compartir la url">
			    </div>
			</div>
			<div class="wow fadeInUp content-card" style="margin-top: 0;">
				<div class="row">
				    <div class="col s12 m12 l12">
				        <ul class="tabs">
					        <li class="tab"><a href="#codefte" class="active">Código Fuente</a></li>
					        <li class="tab"><a href="#pantallazos" class="active">Pantallazos</a></li>
				        </ul>
				    </div>
				</div>
			    <div id="codefte" class="col s12">
					<main class="text-description">
						@yield('CodigoFte')
						<br /><br /><br /><br />
						<a href="#redesSoc">
							Si este contenido te fue útil, no olvides compartirlo en redes sociales, Considéralo. Puede ser la manera de agradecer!
						</a>
						<hr />
						<div class="row">
							{{-- Form::open(array('method' => 'POST', 'name' => 'guardarComentario', 'url' => 'guardarComentario')) --}}
							<div class="col s12 m12 l12">
								<br /><br />
								<span class="labelComentario">Agrega tu comentario...</span>
								<br /><br />
							</div>
							<div class="col s12 m12 l12">
								<label for="emailComm" data-error="wrong" data-success="right" class="labelbk">Correo electrónico</label>
									{{-- Form::email('email', null, array(
										'class'			=> 'validate',
										'id' 			=> 'emailComm',
										'placeholder'	=> 'Escribe tu correo electrónico',
										'required',
										'maxlength'		=> '120'))
									--}}
								<span class="erroresLaravel" >{{ $errors->first('email')}}</span>
							</div>
							<div class="col s12 m12 l12">
							  <label for="commText" class="labelbk">Escribe tu comentario</label>
								{{-- Form::textarea('comentario', null, array(
									'class'			=> 'commText materialize-textarea',
									'id'			=> 'commText',
									'placeholder'	=> 'Escribe tus ideas, líneas de código, opiniones, preguntas o secillo. Abre una discusión.',
									'required',
									'maxlength'		=> '2000'))
								--}}
								<span class="erroresLaravel" >{{ $errors->first('comentario')}}</span>
								<div class="etiquetasDisponibles">
									<span>Puedes utilizar etiquetas </span>
									&#60;pre&#62;&#60;/pre&#62;, &#60;p&#62;&#60;/p&#62;,  &#60;div&#62;&#60;/div&#62;, + (Nombre usuario, para responderle a alguien)
								</div>
								<br />
								<div class="captchaText">{{$keyCp}}</div>
								<br />
								<input type="text" name="codecaptcha" width="300px" placeholder="Ingrese el código captcha"/>
								<br />
								{{-- Form::hidden('idPost', null, array('id' => 'idPost')) --}}
								{{-- Form::button('Guardar Comentario', array(
									'class' => 'btn waves-effect waves-light',
									'type' => 'submit'))
								--}}
								<i class="material-icons right"></i>
								<br /><br /><br />
							</div>
							{{-- Form::close() --}}
						</div>
						@if (count($comm) <= 0)
						   <div>Este post no tiene comentarios, sé el primero en hacerlo</div>
						@else
							@foreach($comm as $comentario)
								<div class="col s12 m12 l12">
									<div class="card-panel grey lighten-5 z-depth-1" style="font-family: RobotoDraft,sans-serif; font-size: 17px;">
										<div class="row valign-wrapper">
											<div class="col s3 m2 l1 ">
												@if ($comentario->usuarios_img == null)
													<img src="{{ asset('/img/usuarios/img_default.png') }}" class="circle responsive-img">
												@else
													<img src="http://elbauldelcodigo.com/img/usuarios/{{ $comentario->usuarios_img }}" class="circle responsive-img">
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
			    	<!--@yield('pantallazos')-->
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
							<div class="resaltadoRojo">Esta entrada no cuenta con imágenes adjuntas</div>
						</div>
					@endif
			    </div>
			    <!-------------------------------------------------------------------------------------------------------------------------->
			</div>
			<br />
			<div class="wow fadeInUp content-card" style="margin-top: 0;">
				<div class="row">
					<div class="col s12 m12 l12">

				        <div id="publicidad">&nbsp;</div>
				        <h1 class="text-title">Articulos que tal vez te interesen.!</h1>
						@foreach ($relacionados as $entrada)
							<div class="col s12 m12 l12 relacionado">
								<div class="articuloRelacionado">
									<span class="icon-clipboard"></span> &nbsp; <a href="/" target="_blank">{{$entrada->post_tit}}</a>
								</div>
							</div>
						@endforeach
				    </div>
				</div>
				<div class="row">
					<div class="col s12 m12 l12">
						<p>
							<b></i>Unete al grupo de whatsApp +57 316 392 6456</i></b>
						</p>
						<p>
							<a href="https://www.facebook.com/groups/1820752601515497/" target="_blank">
								Sigue el grupo en facebook
							</a>
						</p>
				    </div>
				</div>
			</div>
		</div>
		<div class="fixed-action-btn" style="bottom: 55px; right: 24px;">
		    <a class="btn-floating btn-large red" title="Siguenos....." >
		        <img src="/img/share.png" style="position: relative; transform: translateY(45%);width: 28px;" alt="Siguenos.....">
		    </a>
		    <ul>
		        <li>
		        	<a class="btn-floating" style="background-color:#3B5998;" title="Sigueme en Facebook" href="https://www.facebook.com/elBaulDelCodigo?ref=hl" target="_blank">
		        		<img src="/img/mini-facebook.png" style="position: relative; top: 8px;" alt="Sigueme en Facebook">
		        	</a>
		        </li>
		        <li class="shareBtn">
		        	<a class="btn-floating red" title="Siguenos en google plus" href="https://plus.google.com/b/109009744640604915833/+ElbauldelcodigoOficial/posts" target="_blank">
		        		<img src="/img/mini-google.png"  style="position: relative; top: 8px;" alt="siguenos en google plus">
		        	</a>
		        </li>
		        <li class="shareBtn">
		        	<a class="btn-floating blue" title="Siguenos en twitter" href="https://twitter.com/Jhons1101" target="_blank">
		        		<img src="/img/mini-twitter.png" style="position: relative; top: 8px;" alt="siguenos en twitter">
		        	</a>
		        </li>
		        <li class="shareBtn">
		        	<a class="btn-floating blue" title="Unete al grupo de whatsApp 57+ 3163926456" href="https://web.whatsapp.com/" target="_blank">
		        		<img src="/img/whatsapp.png" style="position: relative; top: 2px; right: -2px;" alt="whatsApp 57+ 3163926456">
		        	</a>
		        </li>
		    </ul>
		</div>
  		<div id="modal1" class="modal modal-fixed-footer" style="width: 550px;height: 290px;">
    		<div class="modal-content">
      			<div class="text-description">Copie y pegue el siguiente código en su sitio Web</div>
      			<br />
      			<script>
      				document.write('<p>&#60;iframe width="560" height="315" src="'+document.URL+'" frameborder="0" allowfullscreen>&#60;/iframe&#62;</p>')
      			</script>
      			<br />
      			<span class="text-description">Pueden cambiar el tamaño del ancho y alto a su gusto..</span>
    		</div>
   		 	<div class="modal-footer">
      			<a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Aceptar</a>
      		</div>
  		</div>
  		<div id="modal2" class="modal modal-fixed-footer" style="width: 550px;height: 210px;">
    		<div class="modal-content">
      			<div class="text-description">Copie y pegue el siguiente código en su sitio Web</div>
      			<br />
      			<script>
      				document.write('<p>&#60;a href="'+document.URL+'" target="_blank">Visite Ahora El Baul del Codigo&#60;/a&#62;</p>')
      			</script>
      		</div>
   		 	<div class="modal-footer">
      			<a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Aceptar</a>
      		</div>
  		</div>
  		<div id="modal3" class="modal modal-fixed-footer" style="width: 450px;height: 170px;">
    		<div class="modal-content">
      			<div class="text-description">Su comentario ha sido almacenado y está ahora disponible...</div >
      			<br />
      		</div>
   		 	<div class="modal-footer"><!---->
      			<a href="#comenta" class="waves-effect waves-green btn-flat modal-action modal-close">Aceptar</a>
      		</div>
  		</div>
  		<div id="modal5" class="modal modal-fixed-footer" style="width: 450px;height: 170px;">
    		<div class="modal-content">
      			<div class="text-description">Ingresaste el código incorrecto, inténtalo de nuevo!...</div >
      			<br />
      		</div>
   		 	<div class="modal-footer"><!---->
      			<a href="#comenta" class="waves-effect waves-green btn-flat modal-action modal-close">Aceptar</a>
      		</div>
  		</div>
		<br><br>
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
					</span><br>
					<span>Síguenos para que estés actualizado de lo último del diseño y desarrollo web, búscanos con bajo estas etiquetas</span><br>
					<span> #jhons1101, #SoyCode, #baulCode y en redes sociales +elbauldelcodigo</span>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					Power By Jhons1101<sup>©</sup> 2015
					<sup title="Todos los Derechos Reservados">&reg;</sup> para <a href="http://elbauldelcodigo.com/" target="_blank" style="color:white;">
					elBaulDelCodigo.com</a><sup title="Todos los Derechos Reservados">&reg;</sup>
					<a class="grey-text text-lighten-4 right" href="#!">Mejoramos tu sitio web.!</a>
				</div>
			</div>
        </footer>
		<script src="/js/wow.min.js"></script>
		<script>new WOW().init();</script>
		<script src="/js/prism.js"></script>
	</body>
</html>