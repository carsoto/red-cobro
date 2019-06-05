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
	<div class="row">
		<div class="col-lg-12">
			<section style="position: relative; background: #fff; border: 1px solid #f4f4f4; padding: 20px; margin-bottom: 25px;">
				<div class="row">
					<div class="col-sm-9">
						<h2 style="margin-bottom: 25px">Información General</h2>
					</div>
					<div class="col-sm-3 text-right" style="margin-top: 20px;">
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
					<div class="col-sm-12">
						<dl class="dl-horizontal">
							<dt>Razon Social</dt>
							<dd class="mb-5">
								<span class='' id='deudor-razon-social'>{{ $datos_deudor['deudor']->razon_social }}</span>
								<div class="overlay cargando" style="display: none;">
									<i class="fa fa-spinner fa-spin"></i>
								</div>
							</dd>
							<dt>Rut</dt>
							<dd>
								<span class='' id='deudor-rut'>{{ $datos_deudor['deudor']->rut_dv }}</span>
								<div class="overlay cargando" style="display: none;">
									<i class="fa fa-spinner fa-spin"></i>
								</div>
							</dd>
							<dt>En Gestión</dt>
							<dd>
								@if($datos_deudor['deudor']->en_gestion)
									<span class="label label-success" id='deudor-en-gestion' style="font-size: 11px;">SI</span>
								@else
									<span class="label label-danger" id='deudor-en-gestion' style="font-size: 11px;">NO</span>
								@endif
								<div class="overlay cargando" style="display: none;">
									<i class="fa fa-spinner fa-spin"></i>
								</div>
							</dd>
							<dt>Fecha de Asignación</dt>
							<dd>
								<span class='' id='deudor-fecha-asignacion'>{{ $datos_deudor['ultima_asignacion']['fecha_asignacion'] }}</span>
								<div class="overlay cargando" style="display: none;">
									<i class="fa fa-spinner fa-spin"></i>
								</div>
							</dd>
						</dl>
					</div>
					<div class="col-sm-12">
						<div id='menu_botones'>
							<div style="padding: 10px;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">{{ Form::button('<i class="fa fa-plus margin-r-5"></i> AGREGAR GESTIÓN', ['type' => 'button', 'class' => 'btn btn-primary btn-sm btn-block btn-flat', 'onclick' => 'opciones_rut("agregar_gestion", "'.encrypt($datos_deudor['deudor']->iddeudores).'");'] )  }}</div>
							<div style="padding: 10px;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">{{ Form::button('<i class="fa fa-history margin-r-5"></i> HISTORIAL DE GESTIONES', ['type' => 'button', 'class' => 'btn btn-primary btn-sm btn-block btn-flat', 'onclick' => 'opciones_rut("historial_gestiones", "'.encrypt($datos_deudor['deudor']->iddeudores).'");'] )  }}</div>
							<div style="padding: 10px;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">{{ Form::button('<i class="fa fa-file-o margin-r-5"></i> DOCUMENTOS', ['type' => 'button', 'class' => 'btn btn-primary btn-sm btn-block btn-flat', 'onclick' => 'opciones_rut("documentos", "'.encrypt($datos_deudor['deudor']->iddeudores).'");'] )  }}</div>
							<div style="padding: 10px;" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">{{ Form::button('<i class="fa fa-map-marker margin-r-5"></i> DIRECCIONES', ['type' => 'button', 'class' => 'btn btn-primary btn-sm btn-block btn-flat', 'onclick' => 'opciones_rut("direcciones", "'.encrypt($datos_deudor['deudor']->iddeudores).'");'] )  }}</div>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-md-4">
						<h4 style="margin-bottom: 25px">Deuda</h4>
						<dl class="dl-horizontal">
							<dt>Días Mora</dt>
							<dd>
								<span class='' id='deudor-dias-mora'>{{ $datos_deudor['ultima_asignacion']['dias_mora'] }}</span>
								<div class="overlay cargando" style="display: none;">
									<i class="fa fa-spinner fa-spin"></i>
								</div>
							</dd>
							<dt>Deuda Asignada</dt>
							<dd>
								<span class='' id='deudor-deuda-asignada'>{{ $datos_deudor['ultima_asignacion']['deuda'] }}</span>
								<div class="overlay cargando" style="display: none;">
									<i class="fa fa-spinner fa-spin"></i>
								</div>
							</dd>
							<dt>Deuda Recuperada</dt>
							<dd>
								<span class='' id='deudor-deuda-recuperada'>{{ $datos_deudor['deuda_recuperada'] }}</span>
								<div class="overlay cargando" style="display: none;">
									<i class="fa fa-spinner fa-spin"></i>
								</div>
							</dd>
							<dt>Saldo hoy</dt>
							<dd>
								<span class='' id='deudor-saldo-hoy'>{{ $datos_deudor['saldo_hoy'] }}</span>
								<div class="overlay cargando" style="display: none;">
									<i class="fa fa-spinner fa-spin"></i>
								</div>
							</dd>
						</dl>
					</div>
					<div class="col-md-4">
						<h4 style="margin-bottom: 25px">Gestión</h4>
						<dl class="dl-horizontal">
							<dt>Fecha última gestión</dt>
							<dd>
								<span class='' id='deudor-fecha-ult-gest'>{{ $datos_deudor['ultima_gestion']['fecha_ult_gestion'] }}</span>
								<div class="overlay cargando" style="display: none;">
									<i class="fa fa-spinner fa-spin"></i>
								</div>
							</dd>
							<dt>Última gestión</dt>
							<dd>
								<span class='' id='deudor-ult-gest'>{{ $datos_deudor['ultima_gestion']['ult_gestion'] }}</span>
								<div class="overlay cargando" style="display: none;">
									<i class="fa fa-spinner fa-spin"></i>
								</div>
							</dd>
							<dt>Observación ultima gestión</dt>
							<dd>
								<span class='' id='deudor-ult-obs-gest'>{{ $datos_deudor['ultima_gestion']['ult_observacion'] }}</span>
								<div class="overlay cargando" style="display: none;">
									<i class="fa fa-spinner fa-spin"></i>
								</div>
							</dd>
						</dl>
					</div>
					<div class="col-md-4">
						<h4 style="margin-bottom: 25px">Respuesta</h4>
						<dl class="dl-horizontal">
							<dt>Última respuesta</dt>
							<dd>
								<span class='' id='deudor-ult-resp'>{{ $datos_deudor['ultima_gestion']['ult_respuesta'] }}</span>
								<div class="overlay cargando" style="display: none;">
									<i class="fa fa-spinner fa-spin"></i>
								</div>
							</dd>
							<dt>Último detalles resp.</dt>
							<dd>
								<span class='' id='deudor-ult-det-resp'>{{ $datos_deudor['ultima_gestion']['ult_detalle'] }}</span>
								<div class="overlay cargando" style="display: none;">
									<i class="fa fa-spinner fa-spin"></i>
								</div>
							</dd>
						</dl>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-lg-12">
						<h4 style="margin-bottom: 25px">Marcas</h4>
						<div class="row">
							@foreach($datos_deudor['marcas'] AS $clave => $info)
								<div class="col-md-2">Marca {{ ($clave + 1) }}
									<div class="text-left">
										<span id="deudor-marca-{{ ($clave + 1) }}">{{ $info->marca }}</span>
										<div style="display: none;" class="overlay cargando">
											<i class="fa fa-spinner fa-spin"></i>
										</div>
									</div>
								</div>
		                    @endforeach
						</div>
					</div>
				</div>
			</section>

			<section>
				<div class="row">
					<div class="col-lg-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Contacto</h3>

								<div class="box-tools">
									{{ Form::button('<i class="fa fa-plus"></i> Agregar contacto', ['type' => 'button', 'class' => 'btn btn-primary btn-sm btn-flat', 'onclick' => 'agregar_contacto("'.encrypt($datos_deudor['deudor']->iddeudores).'");'] )  }}
								</div>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive no-padding">
								<table id='tabla-contactos' class="table table-hover">
									<tbody>
										<tr>
											<th>Fonos/Mail</th>
											<th>Fecha última gestión</th>
											<th>Resultado última gestión</th>
											<th>Estado</th>
											<th>Opciones</th>
										</tr>
										@if((count($datos_deudor['contactos']['telefonos']) > 0) || (count($datos_deudor['contactos']['correos']) > 0))
				                            

				                            @foreach($datos_deudor['contactos']['telefonos'] as $key => $value)
				                            	<tr style="font-size: 11px;">
					                                <td><a href="skype:{{ $key }}?call">{{ $key }}</a></td>
					                                <td>{{ $value['fecha'] }}</td>
					                                <td><span data-toggle="tooltip" title="Respuesta: {{ $value['respuesta'] }}">{{ $value['gestion'] }}</span></td>
					                                <td>
					                                	@if($value['estatus'])
					                                		<span id="status_telefono{{ $value['id'] }}" class="label label-success" style="font-size: 11px;">Activo</span>
					                                	@else
					                                		<span id="status_telefono{{ $value['id'] }}" class="label label-danger" style="font-size: 11px;">Inactivo</span>
					                                	@endif
					                                </td>
					                                <td><a href="#" class="cambiar_estatus_contacto" tipo="telefono" id-contacto="{{ $value['id'] }}" id-deudor="{{ encrypt($datos_deudor['deudor']->iddeudores) }}"><i class="fa fa-edit"></i></a></td>
					                            </tr>
				                            @endforeach
				                            @foreach($datos_deudor['contactos']['correos'] as $key => $value)
				                            	<tr style="font-size: 11px;">
					                                <td><a href="skype:{{ $key }}?chat">{{ $key }}</a></td>
					                                <td>{{ $value['fecha'] }}</td>
					                                <td><span data-toggle="tooltip" title="Respuesta: {{ $value['respuesta'] }}">{{ $value['gestion'] }}</span></td>
					                                <td>
					                                	@if($value['estatus'])
					                                		<span id="status_correo{{ $value['id'] }}" class="label label-success" style="font-size: 11px;">Activo</span>
					                                	@else
					                                		<span id="status_correo{{ $value['id'] }}" class="label label-danger" style="font-size: 11px;">Inactivo</span>
					                                	@endif
					                                </td>
					                                <td><a href="#" class="cambiar_estatus_contacto" tipo="correo" id-contacto="{{ $value['id'] }}" id-deudor="{{ encrypt($datos_deudor['deudor']->iddeudores) }}"><i class="fa fa-edit"></i></a></td>
					                            </tr>
				                            @endforeach
			                            @else
			                            	<tr style="font-size: 11px;">
				                                <td>-</td>
				                                <td>-</td>
				                                <td>-</td>
				                                <td>-</td>
				                                <td>-</td>
				                            </tr>
			                            @endif
									</tbody>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
					</div>
				</div>
			</section>
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