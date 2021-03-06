@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Deudores
@endsection

@section('contentheader_title')
	Deudores
@endsection

@section('contentheader_description')
	Listado
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-12">

				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-body">
						
						<!--<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="form-group"> 
								{!! Form::select('cartera', $carteras['carteras'], NULL, array('class' => 'form-control input-sm', 'id' => 'select-filtro-cartera', 'placeholder' => 'SELECCIONAR TODAS LAS CARTERAS')) !!}
							</div>	
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="form-group"> 
								{!! Form::select('marcas', $marcas, NULL, array('class' => 'form-control input-sm', 'id' => 'select-filtro-marca', 'placeholder' => 'SELECCIONAR TODAS LAS MARCAS')) !!}
							</div>	
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12">
							<button type="button" class="btn btn-sm btn-primary btn-block btn-flat" onclick="filtrar_deudores()"><i class="fa fa-fw fa-refresh"></i>Cargar lista</button>
						</div>
						<br><br><br>-->
						<div class="row">
							<div class="col-md-2 col-sm-12 col-xs-12">
								<button type="button" class="btn btn-sm btn-default btn-block btn-flat" onclick="">Asignar a cobrador</button>
							</div>
							<div class="col-md-2 col-sm-12 col-xs-12">
								<button type="button" class="btn btn-sm btn-default btn-block btn-flat" onclick="">Generar campaña</button>
							</div>
							<div class="col-md-2 col-sm-12 col-xs-12">
								<button type="button" class="btn btn-sm btn-default btn-block btn-flat" onclick="">Agregar gestión masiva</button>
							</div>	
						</div>
						
						<div class="table-responsive" style="padding-top: 15px;">
							<table id='tabla_deudores' class="table datatable tabla_deudores" style="width:100%; font-size: 11px;">
		                        <thead>
		                            <tr>
		                                <th width="60px">Rut</th>
		                                <th>Razón social</th>
		                                <th width="80px">F. de asignación</th>
		                                <th width="60px">Asignado</th>
		                                <th width="60px">Días mora</th>
		                                <th width="100px">Marca 1</th>
		                                <th width="100px">Marca 2</th>
		                                <th width="60px">S. recuperado</th>
		                                <th><i class="fa fa-gears"></i></th>
		                            </tr>
		                        </thead>
		                    </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="detalles-deudor" tabindex="-1" role="dialog" aria-labelledby="detalles-deudor-label">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="detalles-deudor-label">Detalles</h4>
				</div>
				<div class="modal-body">
					<div class="box box-info collapsed-box">
						<div class="box-header with-border">
							<span class="box-title" style="font-size: 14px;"><i class="fa fa-map-marker"></i> Direcciones</span>

							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
							</div>
						</div>
						<div id="deudores-direcciones-body" class="box-body" style="display: none;"></div>
					</div>

					<div class="box box-warning collapsed-box">
						<div class="box-header with-border">
							<span class="box-title" style="font-size: 14px;"><i class="fa fa-phone"></i> Contacto</span>

							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
							</div>
						</div>
						<div id="deudores-contacto-body" class="box-body" style="display: none;"></div>
					</div>

					<div class="box box-danger collapsed-box">
						<div class="box-header with-border">
							<span class="box-title" style="font-size: 14px;"><i class="fa fa-file-o"></i> Documentos</span>

							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
							</div>
						</div>
						<div id="deudores-documentos-body" class="box-body table-responsive no-padding" style="display: none;"></div>
					</div>
					<div style="padding-bottom: 20px;"><span id="deudor-deuda-total" class="label label-danger pull-right" style="font-size: 15px;"></span></div>
				</div>
			</div>
		</div>
	</div>
@endsection
