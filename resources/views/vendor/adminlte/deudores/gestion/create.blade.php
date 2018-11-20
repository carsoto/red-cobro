{!! Form::open(['route' => 'gestiones.store']) !!}
	<div class="modal-body">
		@if (Session::has('message'))
			<div class="box-header with-border">
				<span class="box-title" style="font-size: 12px;"><div class="alert alert-success">{{ Session::get('message') }}</div></span>
			</div>
		@endif
		{!! Form::hidden('id_deudor', $deudor->iddeudores, null, array('class' => 'form-control')) !!}
		<!--{{ Form::label('contacto', 'Contacto') }}-->
		{!! Form::select('contacto', $contactos, null, array('class' => 'form-control')) !!}
		<br>
		<!--{{ Form::label('gestion', 'Gestión') }}-->
		{!! Form::select('gestion', $gestiones, null, array('class' => 'form-control', 'onchange' => 'cargar_respuestas(this);')) !!}
		<br>
		<div id='respuestas-por-gestion'>
			<div class="overlay cargando_modal" style="display: none;">
				<i class="fa fa-spinner fa-spin"></i>
			</div>
		</div>
		<br>
		{{ Form::label('observacion', 'OBSERVACIÓN') }}
		{!! Form::textarea('observacion', null, array('class' => 'form-control', 'rows' => 5, 'cols' => 12, 'style' => 'resize: none')) !!}
	</div>
	<div class="modal-footer text-right">
		<a class="btn btn-danger" href="" style="width:100px;"><i class="fa fa-angle-double-left"></i> Cancelar</a>
		<button type="submit" class="btn btn-success" style="width:100px;"><i class="fa fa-save"></i> Registrar</button>
	</div>
{!! Form::close() !!}