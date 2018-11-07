@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Deudores
@endsection

@section('contentheader_title')
	Gestión de Documentos
@endsection

@section('contentheader_description')
	Agregar
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-12">

				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Nueva gestión</h3>
						<!-- Buttons, labels, and many other things can be placed here! -->
						<!-- Here is a label for example -->
					<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						{{ Form::label('fecha', 'Fecha') }}
						{!! Form::text('fecha', null, array('class' => 'form-control')) !!}
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
					<div class="box-footer text-right">
						<a class="btn btn-danger" href="" style="width:100px;"><i class="fa fa-angle-double-left"></i> Cancelar</a>
						<button type="submit" class="btn btn-success" style="width:100px;"><i class="fa fa-save"></i> Registrar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection