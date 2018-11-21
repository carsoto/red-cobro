{!! Form::open(['id' => 'form-agregar-gestion', 'route' => 'gestiones.store', 'method' => 'POST']) !!}
	<div class="modal-body">
		<div id='message' class="alert" style="display: none;"></div>
		{!! Form::hidden('id_deudor', $deudor->iddeudores, null, array('class' => 'form-control')) !!}
		<!--{{ Form::label('contacto', 'Contacto') }}-->
		{!! Form::select('contacto', $contactos, null, array('class' => 'form-control', 'id' => 'select-contacto')) !!}
		<br>
		<!--{{ Form::label('gestion', 'Gestión') }}-->
		{!! Form::select('gestion', $gestiones, null, array('class' => 'form-control', 'onchange' => 'cargar_respuestas(this);', 'id' => 'select-gestion')) !!}
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
		<button type="button" class="btn btn-success" style="width:100px;" onclick='agregar_gestion();'><i class="fa fa-save"></i> Registrar</button>
	</div>
{!! Form::close() !!}