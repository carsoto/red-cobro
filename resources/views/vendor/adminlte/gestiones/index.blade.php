@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Gestión
@endsection

@section('contentheader_title')
	Gestión
@endsection

@section('contentheader_description')
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-12">

				<div class="box box-primary">
					<div class="box-header with-border text-center">
						<h3 class="box-title">Búsqueda por RUT</h3>
					<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">
							<div class="form-inline">
								{!! Form::open(['route' => 'gestiones.buscar', 'id' => 'form-gestion-rut']) !!}
									{{ csrf_field() }}
									{{ Form::label('consultar_rut', 'Buscar:') }}
									{!! Form::text('consultar_rut', null, array('class' => 'form-control input-sm')) !!}
									{{ Form::button('<i class="fa fa-search"></i>', ['type' => 'button', 'class' => 'btn btn-primary btn-sm btn-flat', 'onclick' => 'buscar_por_rut()'] )  }}
									
								{!! Form::close() !!}
								
							</div>	
						</div>
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 20px;">
			                <div class="box box-solid">
			                    <div class="box-body">
			                        <h4 style="background-color:#f7f7f7; font-size: 14px; text-align: center; padding: 7px 10px; margin-top: 0;">
			                            <strong>INFORMACIÓN GENERAL</strong>
			                        </h4>
									
			                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			                        	<div class="box box-primary">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>RUT</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-rut'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>
			                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
			                        	<div class="box box-primary">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>RAZÓN SOCIAL</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-razon-social'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>
			                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
			                        	<div class="box box-primary">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>EN GESTIÓN</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-en-gestion'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>
			                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			                        	<div class="box box-primary">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>FECHA DE ASIGNACIÓN</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-fecha-asignacion'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>
			                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
			                        	<div class="box box-warning">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>MARCA 1</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-marca-1'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>
				                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
			                        	<div class="box box-warning">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>MARCA 2</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-marca-2'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>
			                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
			                        	<div class="box box-warning">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>MARCA 3</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-marca-3'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>
			                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
			                        	<div class="box box-warning">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>MARCA 4</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-marca-4'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>
			                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
			                        	<div class="box box-warning">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>MARCA 5</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-marca-5'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>
			                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
			                        	<div class="box box-warning">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>MARCA 6</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-marca-6'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>
		                        	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			                        	<div class="box box-danger">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>DÍAS MORA</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-dias-mora'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>
		                        	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			                        	<div class="box box-danger">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>DEUDA ASIGNADA</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-deuda-asignada'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>
		                        	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			                        	<div class="box box-danger">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>DEUDA RECUPERADA</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-deuda-recuperada'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>
		                        	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			                        	<div class="box box-danger">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>SALDO HOY</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-saldo-hoy'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>
		                        	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
			                        	<div class="box box-info">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>FECHA ÚLTIMA GESTIÓN</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-fecha-ult-gest'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>
		                        	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
			                        	<div class="box box-info">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>ÚLTIMA GESTIÓN</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-ult-gest'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>
		                        	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
			                        	<div class="box box-info">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>ÚLTIMA RESPUESTA</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-ult-resp'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>
		                        	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
			                        	<div class="box box-info">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>ÚLTIMO DETALLE RESP.</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-ult-det-resp'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>
		                        	<div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
			                        	<div class="box box-default">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>OBSERVACIÓN ÚLTIMA GESTIÓN</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-ult-obs-gest'></span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>
			                	</div>
			                </div>
		                    <table id='' class="table table-bordered" style="width:100%">
		                    	<tr>
	                                <th class='text-center' colspan="6">CONTACTO</th>
	                            </tr>
		                    	<tr>
	                                <td class='text-center'>FONOS/MAIL</td>
	                                <td class='text-center' colspan="2">RESULTADO ÚLTIMA GESTIÓN</td>
	                                <td class='text-center'>ORIGEN</td>
	                                <td class='text-center'>MARCA 1</td>
	                                <td class='text-center'>MARCA 2</td>
	                            </tr>
	                            <tr>
	                                <td></td>
	                                <td colspan="2"></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                            </tr>
		                    </table>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
								{{ Form::button('<i class="fa fa-plus"></i> AGREGAR GESTIÓN', ['type' => 'button', 'class' => 'btn btn-success btn-sm btn-flat', 'onclick' => ''] )  }}
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
								{{ Form::button('<i class="fa fa-history"></i> HISTORIAL DE GESTIONES', ['type' => 'button', 'class' => 'btn btn-info btn-sm btn-flat', 'onclick' => ''] )  }}
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
								{{ Form::button('<i class="fa fa-file-o"></i> DOCUMENTOS', ['type' => 'button', 'class' => 'btn btn-warning btn-sm btn-flat', 'onclick' => ''] )  }}
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
								{{ Form::button('<i class="fa fa-map-marker"></i> DIRECCIONES', ['type' => 'button', 'class' => 'btn btn-danger btn-sm btn-flat', 'onclick' => ''] )  }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection