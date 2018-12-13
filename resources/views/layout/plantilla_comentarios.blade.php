@section('comentarios')
<a href="#redesSoc">
	Si este contenido te fue útil, no olvides compartirlo en redes sociales, Considéralo. Puede ser la manera de agradecer!
</a>
<hr />
<div class="row">
	{{ Form::open(array('method' => 'POST', 'name' => 'guardarComentario', 'url' => 'guardarComentario'))}}
	<div class="col s12 m12 l12">
		<br /><br />
		<span class="labelComentario">Agrega tu comentario...</span>
		<br /><br />
	</div>
	<div class="col s12 m12 l12">
		<label for="emailComm" data-error="wrong" data-success="right" class="labelbk">Correo electrónico</label>
			{{ Form::email('email', null, array(
				'class'			=> 'validate',
				'id' 			=> 'emailComm',
				'placeholder'	=> 'Escribe tu correo electrónico',
				'required',
				'maxlength'		=> '120'))
			}}
		<span class="erroresLaravel" >{{ $errors->first('email')}}</span>
	</div>
	<div class="col s12 m12 l12">
	  <label for="commText" class="labelbk">Escribe tu comentario</label>
		{{ Form::textarea('comentario', null, array(
			'class'			=> 'commText materialize-textarea',
			'id'			=> 'commText',
			'placeholder'	=> 'Escribe tus ideas, lineas de código, opiniones, preguntas o secillo. Abre una discusión.',
			'required',
			'maxlength'		=> '2000'))
		}}
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
		{{ Form::hidden('idPost', null, array('id' => 'idPost')) }}
		{{ Form::button('Guardar Comentario', array(
			'class' => 'btn waves-effect waves-light', 
			'type' => 'submit'))
		}}
		<i class="material-icons right"></i>
		<br /><br /><br />
	</div>
	{{ Form::close()}}	
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
							<img src="/img/usuarios/img_default.png" class="circle responsive-img">
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
@stop