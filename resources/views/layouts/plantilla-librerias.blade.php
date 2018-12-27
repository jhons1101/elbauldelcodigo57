<!DOCTYPE html>
<html>
	<head>
		<title>@foreach ($Posts as $post){{ $post->post_tit }}@endforeach | {{ config('app.name') }}</title>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="{{ asset('/img/claves-elbauldelcodigo_ico.png') }}" type="image/png" />
		<meta name="description" content="@foreach ($Posts as $post){{ $post->post_desc }}@endforeach">
		<meta name="keywords" content="@foreach ($Posts as $post){{ $post->post_key }}@endforeach">
		
		<meta property="og:title" content="@foreach ($Posts as $post){{ $post->post_tit }}@endforeach || elbauldelcodigo">
		<meta property="og:site_name" content="elbauldelcodigo">
		<meta property="og:url" content="www.elbauldelcodigo.com">
		<meta property="og:description" content="@foreach ($Posts as $post){{ $post->post_desc }}@endforeach">
		<meta property="fb:app_id" content="1386964998221435">
		<meta property="og:type" content="website">
		<meta property="og:image" content="{{ asset('/img/elbauldelcodigo.com_front_2.png') }}" />

		<meta name="copyright" content="Copyright © 2014 elbauldelcodigo.com">
		<meta name="author" content="jhons1101">
		<meta name="theme-color" content="#ffffff">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
		
		<!-- esquema para Google+ -->
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
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		  (adsbygoogle = window.adsbygoogle || []).push({
			google_ad_client: "ca-pub-1633769788245402",
			enable_page_level_ads: true
		  });
		</script>
		<!-- obtenemos la url de la pagina para retornar por medio del controlador al guardar un comentario nuevo.-->
		<script>
			var EstaUrl = document.URL;//CON ESTO TOMO LA UL DE MI PAGINA
		   var res = EstaUrl.split("//");//CON ESTO LA DIVIDO PARA OPTENER LA URL SOLAMENTE
		   var EstaUrl = res[1];//RES[1]-> ESTA LA URL BASICA
		   //dividimos la cadena en la ruta y la asignamos al input oculto en el formulario de guardar comentario
		   var rutaPagina = EstaUrl.split("/")
		</script>

		<!-- Los datos de la tarjeta de Twitter -->
		<meta itemprop="name" content="twitter">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@jhons1101">
		<meta name="twitter:title" content="elbauldelcodigo" />
		<meta name="twitter:description" content="@foreach ($Posts as $post){{ $post->post_desc }}@endforeach">
		<meta name="twitter:url" content="http://elbauldelcodigo.com/" />
		
		@yield('img-for-share')
		<link href="{{ asset('/img/elbauldelcodigo.com_front_2.png') }}" rel="image_src" />
		<link href='https://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Barrio" rel="stylesheet">

		<link rel="stylesheet" href="{{{ asset('/materialize/css/materialize.min.css') }}}">
		<link rel="stylesheet" href="{{{ asset('/css/tidy.css')    }}}">
		<link rel="stylesheet" href="{{{ asset('/css/animate.css') }}}">
		<link rel="stylesheet" href="{{{ asset('/css/prism.css')   }}}">
		<link rel="stylesheet" href="{{{ asset('/fonts/style.css') }}}">
		<link rel="stylesheet" href="{{{ asset('/css/index.css')   }}}">
		<link rel="stylesheet" href="{{{ asset('/css/tablas-responsive.css')}}}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/roboto/Roboto-Medium.woff">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/roboto/Roboto-Medium.woff2">
		<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
		<script src="{{ asset('materialize/js/materialize.min.js') }}"></script>
		<script src="{{ asset('js/index.js') }}"></script>
		<style>img{cursor: pointer;} @yield('css')</style>
		<script type="text/javascript">@yield('javascript')</script>
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
		@yield('header')
		<div class="">
			<div class="cover-image"></div>	
			<div style="height: 50%; width: 100%; position: absolute; top: 0">
     			<paper-fab class="wow fadeInUp desktop-fab" icon="shop"></paper-fab>
			</div>
			<div class="wow fadeInUp content-card">
				<paper-fab class="mobile-fab" icon="shop"></paper-fab>
				<div class="icon-and-title-flex">
					<div class="cajaTema"><div class="texTema">@foreach ($Posts as $post){{ $post->tema_txt }}@endforeach<input id="tema_txt" type="hidden" value="@foreach ($Posts as $post){{ $post->tema_txt }}@endforeach" /></div></div>
					<div class="title-container">
						<h1 class="text-title">@foreach ($Posts as $post){{ $post->post_tit }}@endforeach <input id="post_tit" type="hidden" value="@foreach ($Posts as $post){{ $post->post_tit }}@endforeach" /></h1><!-- Nombre de la entrada -->
						<div class="fecha-blogger">Por : @foreach ($Posts as $post)<a href="/usuario/{{ $post->usuarios_name }}" target="_blank">{{ $post->usuarios_name }}</a>@endforeach</div>
						<div class="fecha-blogger">@foreach ($Posts as $post){{ $post->post_fec }}@endforeach</div>
						<div class="fecha-blogger">Tags : @yield('TagsPost')</div>
						<!-- aqui va la fecha de publicacion del post  y quien la escribio ese post -->
						<input type="hidden" id="flagNuevoComm" value="@yield('flagNuevoComm')" />
					</div>	
				</div>
				<div class="text-description">
					@yield('PostContent')
				</div>
			</div><!-- fin contenido principal -->
			@yield('botones-compartir')
			<div class="wow fadeInUp content-card" style="margin-top: 0;">
			    <div id="infoLibreria" class="col s12">
					<main class="text-description">
						@yield('infoLibreria')
						<br /><br /><br /><br />
						@yield('comentarios')
						<script>
							setTimeout(function(){ 
								document.getElementById("idPost").value = rutaPagina[2]; 
							}, 3000);
						</script>
					</main>
				</div>
			</div>
			<br />
			@yield('articulos-interes')
		</div>	<!-- fin del container  -->	
		<!--  compartir_flotante  -->
		@yield('botones-float')
		<!-- Modal Structure -->
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
		@if ($flagNuevoComm === 1)
  		<div id="modal3" class="modal modal-fixed-footer" style="width: 450px;height: 170px;">
    		<div class="modal-content">
      			<div class="text-description">Su comentario ha sido almacenado y está ahora disponible...</div >
      			<br />
      		</div>
   		 	<div class="modal-footer"><!---->
      			<a href="#comenta" class="waves-effect waves-green btn-flat modal-action modal-close">Aceptar</a>
      		</div>
  		</div>
		@endif
		@if ($flagNuevoComm === 3)
  		<div id="modal5" class="modal modal-fixed-footer" style="width: 450px;height: 170px;">
    		<div class="modal-content">
      			<div class="text-description">Ingresaste el código incorrecto, inténtalo de nuevo!...</div >
      			<br />
      		</div>
   		 	<div class="modal-footer"><!---->
      			<a href="#comenta" class="waves-effect waves-green btn-flat modal-action modal-close">Aceptar</a>
      		</div>
  		</div>
		@endif
		<!-- ===================================================================================================== -->
		<br><br>
		@yield('footer')
		<script src="/js/wow.min.js"></script>
		<script>new WOW().init();</script>
		<script src="/js/prism.js"></script>
	</body>
</html>	