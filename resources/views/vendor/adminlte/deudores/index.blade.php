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
			<div class="col-lg-12 col-md-12 col-sm-12">

				<div class="box box-primary">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive" style="padding-top: 15px;">
							{!! Form::open(['id' => 'form-dashboard', 'method' => 'POST', 'route' => 'deudores.listado_filtro']) !!}
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="form-group"> 
							<label>Selecciona la cartera</label>
							<?php
							if(empty($cartera_seleccionada)){
								$cartera_seleccionada = null;
							}
							?>
							{!! Form::select('cartera', $carteras, $cartera_seleccionada, array('class' => 'form-control input-sm', 'id' => 'select-cartera')) !!}
							</div>	
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="form-group"> 
							<label>Selecciona el parámetro de búsqueda</label>
							<?php
							if(empty($marca_seleccionada)){
								$marca_seleccionada = null;
							}

							?>
							{!! Form::select('marcas', array('MARCA1' => 'Marca 1','MARCA2' => 'Marca 2',
							'MARCA3' => 'Marca 3','MARCA4' => 'Marca 4', 'MARCA5' => 'Marca 5'), $marca_seleccionada, array('class' => 'form-control input-sm', 'id' => 'select-narca')) !!}
							</div>	
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12">
						<br>
						<button type="submit" class="btn btn-primary btn-sm btn-block btn-flat boton_listado_deudores" style=""><i class="fa fa-refresh fa-fw"></i>Actualizar dashboard</button>
						</div>
						{!! Form::close() !!}

						<br><br><br><br>

							<table id='tabla_deudores' class="table table-hover table-bordered table-striped datatable tabla_deudores" style="width:100%; font-size: 11px;">
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
