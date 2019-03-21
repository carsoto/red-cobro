<div class="modal-body">
	{!! Form::open(['id' => 'form-consultar-hist-gestion', 'route' => 'gestion.historial', 'method' => 'POST']) !!}
		<div class="row">
			{!! csrf_field() !!}
			{!! Form::hidden('id_deudor', $iddeudor, null, array('class' => 'form-control')) !!}

			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
				{!! Form::select('tipo_gestion', $tipos_gestion, null, array('placeholder' => 'SELECCIONE UN TIPO DE GESTIÓN', 'class' => 'form-control input-sm')) !!}	
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
				<div class="input-group date date-picker">
					<input value="{{ Carbon\Carbon::now()->subDays(30)->format('d-m-Y') }}" type="text" name='fecha_inicio_consulta' class="form-control pull-right input-sm" placeholder="FECHA INICIO">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
				<div class="input-group date date-picker">
					<input value="{{ Carbon\Carbon::now()->format('d-m-Y') }}" type="text" name='fecha_fin_consulta' class="form-control pull-right input-sm" placeholder="FECHA FIN">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				{!! Form::button('<i class="fa fa-search"></i> CONSULTAR', array('id' => 'consultar-gestiones', 'class' => 'btn btn-primary btn-sm btn-flat btn-block', 'onclick' => 'consultar_gestiones("'.$iddeudor.'")')) !!}	
			</div>
		</div>
	{!! Form::close() !!}
	<div class="table-responsive" id='historial-de-gestiones' style="display: none;">
		<hr>
		<table id='tabla_hist_gestiones' class="table table-hover table-bordered table-striped datatable" style="width:100%">
		    <thead>
		        <tr>
		        	<th>Contacto</th>
		        	<th>Gestor</th>
		            <th>Gestión</th>
		            <th>Respuesta</th>
		            <th>Detalle</th>
		            <th>Observación</th>
		            <th>Fecha</th>
		            <th>Próxima gestión</th>
		            <th>Fecha próx. gestión</th>
		        </tr>
		    </thead>
		</table>	
	</div>
</div>