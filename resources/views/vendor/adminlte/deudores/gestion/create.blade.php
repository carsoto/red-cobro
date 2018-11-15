<div class="modal-body">
	{{ Form::label('contacto', 'Contacto') }}
	{!! Form::select('contacto', $contactos, null, array('class' => 'form-control')) !!}
	<br>
	{{ Form::label('gestion', 'Gestión') }}
	{!! Form::select('gestion', array(0 => 'A15 - LLAMADO COBRADOR PREDICTIVO'), null, array('class' => 'form-control')) !!}
	<br>
	{{ Form::label('respuesta', 'Respuesta') }}
	{!! Form::select('respuesta', array(0 => 'B026 DICE QUE NO PAGARÁ'), null, array('class' => 'form-control')) !!}
	<br>
	{{ Form::label('estado', 'Detalle') }}
	<br>
	{{ Form::radio('literal', 'A - BLA BLA', false) }}
	{{ Form::label('estado', 'A - BLA BLA') }}
	<br>
	{{ Form::radio('literal', 'B - BLA BLA', false) }}
	{{ Form::label('estado', 'B - BLA BLA') }}
	<br>
	{{ Form::radio('literal', 'C - NO HA RECIBIDO BOLETA O FACTURA', true) }}
	{{ Form::label('estado', 'C - NO HA RECIBIDO BOLETA O FACTURA') }}
	<br><br>
	{{ Form::label('observacion', 'Observación') }}
	{!! Form::text('observacion', null, array('class' => 'form-control')) !!}
</div>
<div class="modal-footer text-right">
	<a class="btn btn-danger" href="" style="width:100px;"><i class="fa fa-angle-double-left"></i> Cancelar</a>
	<button type="submit" class="btn btn-success" style="width:100px;"><i class="fa fa-save"></i> Registrar</button>
</div>