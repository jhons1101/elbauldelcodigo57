@section('articulos-interes')
<div class="wow fadeInUp content-card" style="margin-top: 0;">
	<div class="row">
		<div class="col s12 m12 l12">
			<div id="publicidad">&nbsp;</div>
			<!--espacio para cargar nuevo post relacionados, es decir de la misma tematica (tags)-->
			<h1 class="text-title">Articulos que tal vez te interesen.!</h1>
			<!-- cada post relacionado es una nueva linea -->										
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
				<a href="https://www.facebook.com/groups/1820752601515497/" target="_blank">
					Sigue el grupo en facebook
				</a>
			</p>
		</div>
	</div>
</div>
@stop