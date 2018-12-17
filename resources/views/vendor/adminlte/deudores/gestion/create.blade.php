{!! Form::open(['id' => 'form-agregar-gestion', 'route' => 'gestiones.store', 'method' => 'POST']) !!}
	<div class="modal-body">
		<div id='message' class="alert" style="display: none;"></div>
		{!! Form::hidden('id_deudor', $deudor->iddeudores, null, array('class' => 'form-control input-sm')) !!}
		
		{!! Form::select('contacto', $contactos, null, array('placeholder' => 'SELECCIONE UN CONTACTO', 'class' => 'form-control input-sm', 'id' => 'select-contacto')) !!}
		<br>
		
		{!! Form::select('gestion', $gestiones, null, array('placeholder' => 'SELECCIONE UNA GESTIÓN', 'class' => 'form-control input-sm', 'onchange' => 'cargar_respuestas(this);', 'id' => 'select-gestion')) !!}
		<br>
		{!! Form::select('respuesta', $respuestas, null, array('placeholder' => 'SELECCIONE UNA RESPUESTA', 'class' => 'form-control input-sm', 'onchange' => 'cargar_detalles(this);', 'id' => 'select-respuestas')) !!}
		<br>
		<div id='detalles-por-respuesta'>
			<div class="overlay cargando_modal" style="display: none;">
				<i class="fa fa-spinner fa-spin"></i>
			</div>
		</div>
		{!! Form::select('prox_gestion', $gestiones, null, array('placeholder' => 'SELECCIONE LA PRÓXIMA GESTIÓN', 'class' => 'form-control input-sm')) !!}
		<br>
		<div class="input-group date" id="datepicker">
			<input type="text" name='fecha_prox_gestion' class="form-control pull-right input-sm" placeholder="FECHA PRÓXIMA GESTIÓN">
			<div class="input-group-addon">
				<i class="fa fa-calendar"></i>
			</div>
		</div>
		<br>
		{{ Form::label('observacion', 'OBSERVACIÓN') }}
		{!! Form::textarea('observacion', null, array('class' => 'form-control input-sm', 'rows' => 5, 'cols' => 12, 'style' => 'resize: none')) !!}
	</div>
	<div class="modal-footer text-right">
		<a class="btn btn-danger" href="" style="width:100px;"><i class="fa fa-angle-double-left"></i> Cancelar</a>
		<button type="button" class="btn btn-success" style="width:100px;" onclick='agregar_gestion();'><i class="fa fa-save"></i> Registrar</button>
	</div>
{!! Form::close() !!}