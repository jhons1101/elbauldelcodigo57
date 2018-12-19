@section('modales')
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
@stop