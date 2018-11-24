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
						<div class="col-lg-offset-8 col-md-offset-8 col-sm-offset-8 col-xs-offset-8 col-lg-4 col-md-4 col-sm-4 col-xs-4">
							{!! Form::open(['route' => 'gestiones.buscar', 'id' => 'form-gestion-rut', 'onkeypress' => "return event.keyCode != 13;"]) !!}
								<div class="input-group input-group-sm">
									{{ csrf_field() }}
				                	{!! Form::text('consultar_rut', $datos_deudor['deudor']->rut, array('class' => 'form-control', 'placeholder' => 'Buscar RUT')) !!}
				                    <span class="input-group-btn">
				                      {{ Form::button('<i class="fa fa-search"></i>', ['type' => 'button', 'class' => 'btn btn-primary btn-flat', 'onclick' => 'buscar_por_rut()'] )  }}
				                    </span>
				              	</div>
							{!! Form::close() !!}	
						</div>
					<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			                <div class="box box-solid">
			                    <div class="box-body">
			                        <h4 style="background-color:#f7f7f7; font-size: 14px; text-align: center; padding: 7px 10px; margin-top: 0;">
			                            <strong>INFORMACIÓN GENERAL</strong>
			                        </h4>
									
			                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-primary">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>RUT</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-rut'>{{ $datos_deudor['deudor']->rut_dv }}</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>

			                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-primary">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>RAZÓN SOCIAL</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-razon-social'>{{ $datos_deudor['deudor']->razon_social }}</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>

			                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-primary">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>EN GESTIÓN</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-en-gestion'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>

			                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-primary">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>FECHA DE ASIGNACIÓN</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-fecha-asignacion'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>

			                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-warning">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>MARCA 1</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-marca-1'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>

				                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-warning">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>MARCA 2</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-marca-2'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>

			                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-warning">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>MARCA 3</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-marca-3'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>

			                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-warning">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>MARCA 4</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-marca-4'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>

			                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-warning">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>MARCA 5</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-marca-5'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
			                        </div>

			                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-warning">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>MARCA 6</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-marca-6'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>

		                        	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-danger">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>DÍAS MORA</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-dias-mora'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>

		                        	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-danger">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>DEUDA ASIGNADA</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-deuda-asignada'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>

		                        	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-danger">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>DEUDA RECUPERADA</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-deuda-recuperada'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>

		                        	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-danger">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>SALDO HOY</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-saldo-hoy'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>

		                        	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-info">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>FECHA ÚLTIMA GESTIÓN</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-fecha-ult-gest'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>

		                        	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-info">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>ÚLTIMA GESTIÓN</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-ult-gest'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>

		                        	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-info">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>ÚLTIMA RESPUESTA</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-ult-resp'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>

		                        	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-info">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>ÚLTIMO DETALLE RESP.</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-ult-det-resp'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>

		                        	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
			                        	<div class="box box-info">
											<div class="box-header text-center" style="padding: 0px;">
												<h4 style="font-size: 12px; text-align: center;">
						                            <strong>OBSERVACIÓN ÚLTIMA GESTIÓN</strong>
						                        </h4>
											<!-- /.box-tools -->
											</div>
											<!-- /.box-header -->
											<div class="box-body text-center" style="font-size: 11px;">
												<span class='' id='deudor-ult-obs-gest'>-</span>
												<div class="overlay cargando" style="display: none;">
													<i class="fa fa-spinner fa-spin"></i>
												</div>
											</div>
									    </div>
		                        	</div>

		                        	
		                        	<table id='tabla-contactos' class="table table-bordered" style="width:100%">
				                    	<tr>
			                                <th colspan="6">
			                                <h4 style="background-color:#f7f7f7; font-size: 14px; text-align: center; padding: 7px 10px; margin-top: 0; margin-bottom: 0;">
					                            <strong>CONTACTO</strong>
					                        </h4></th>
			                            </tr>
				                    	<tr style="font-size: 12px; text-align: center;">
			                                <td class='text-center'><span><strong>FONOS/MAIL</strong></span></td>
			                                <td class='text-center' colspan="2"><span><strong>RESULTADO ÚLTIMA GESTIÓN</strong></span></td>
			                                <td class='text-center'><span><strong>ORIGEN</strong></span></td>
			                                <td class='text-center'><span><strong>MARCA 1</strong></span></td>
			                                <td class='text-center'><span><strong>MARCA 2</strong></span></td>
			                            </tr>
			                            
			                            	@if(count($datos_deudor['telefonos']) > 0)
				                            	@foreach($datos_deudor['telefonos'] AS $key => $value)
					                            	<tr style="font-size: 11px;">
						                                <td>{{ $value->telefono }}</td>
						                                <td colspan="2"></td>
						                                <td></td>
						                                <td></td>
						                                <td></td>
						                            </tr>
				                                @endforeach
			                                @endif
			                                @if(count($datos_deudor['correos']) > 0)
				                            	@foreach($datos_deudor['correos'] AS $key => $value)
					                            	<tr style="font-size: 11px;">
						                                <td>{{ $value->correo }}</td>
						                                <td colspan="2"></td>
						                                <td></td>
						                                <td></td>
						                                <td></td>
						                            </tr>
				                                @endforeach
			                                @endif
				                    </table>
				                    <div style="margin-top: 20px;">
				                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 10px;">
										{{ Form::button('<i class="fa fa-plus"></i> AGREGAR GESTIÓN', ['type' => 'button', 'class' => 'btn btn-success btn-sm btn-flat', 'onclick' => 'opciones_rut("agregar_gestion", "'.encrypt($datos_deudor['deudor']->iddeudores).'");'] )  }}
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 10px;">
										{{ Form::button('<i class="fa fa-history"></i> HISTORIAL DE GESTIONES', ['type' => 'button', 'class' => 'btn btn-info btn-sm btn-flat', 'onclick' => 'opciones_rut("historial_gestiones", "'.encrypt($datos_deudor['deudor']->iddeudores).'");'] )  }}
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 10px;">
										{{ Form::button('<i class="fa fa-file-o"></i> DOCUMENTOS', ['type' => 'button', 'class' => 'btn btn-warning btn-sm btn-flat', 'onclick' => 'opciones_rut("documentos", "'.encrypt($datos_deudor['deudor']->iddeudores).'");'] )  }}
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 10px;">
										{{ Form::button('<i class="fa fa-map-marker"></i> DIRECCIONES', ['type' => 'button', 'class' => 'btn btn-danger btn-sm btn-flat', 'onclick' => 'opciones_rut("direcciones", "'.encrypt($datos_deudor['deudor']->iddeudores).'");'] )  }}
										
									</div>
									</div>
			                	</div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="rut-modal-detalles" tabindex="-1" role="dialog" aria-labelledby="rut-modal-detalles-label">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="detalles-deudor-label"></h4>
				</div>
				<div class="modal-body">
				</div>
			</div>
		</div>
	</div>                   
@endsection