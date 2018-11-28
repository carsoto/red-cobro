<div class="modal-body">
	{!! Form::open(['id' => 'form-consultar-hist-gestion', 'route' => 'gestion.historial', 'method' => 'POST']) !!}
		<div class="row">
			{!! csrf_field() !!}
			{!! Form::hidden('id_deudor', $iddeudor, null, array('class' => 'form-control')) !!}

			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
				{!! Form::select('dia', $dias, null, array('placeholder' => 'SELECCIONE UN DÍA', 'class' => 'form-control input-sm')) !!}	
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
				{!! Form::select('mes', $meses, null, array('placeholder' => 'SELECCIONE UN MES', 'class' => 'form-control input-sm')) !!}	
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
				{!! Form::selectYear('anyo', 2010, date('Y'), null, array('placeholder' => 'SELECCIONE UN AÑO', 'class' => 'form-control input-sm')) !!}	
			</div>	
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				{!! Form::button('<i class="fa fa-search"></i> CONSULTAR', array('class' => 'btn btn-primary btn-sm btn-flat btn-block', 'onclick' => 'consultar_gestiones("'.$iddeudor.'")')) !!}	
			</div>
		</div>
	{!! Form::close() !!}
	<div class="table-responsive" id='historial-de-gestiones' style="display: none;">
		<hr>
		<table id='tabla_hist_gestiones' class="table table-hover table-bordered table-striped datatable" style="width:100%">
		    <thead>
		        <tr>
		        	<th>Contacto</th>
		            <th>Gestión</th>
		            <th>Respuesta</th>
		            <th>Detalle</th>
		            <th>Observación</th>
		            <!--<th>Año</th>
		            <th>Mes</th>-->
		            <th>Fecha</th>
		        </tr>
		    </thead>
		</table>	
	</div>
</div>