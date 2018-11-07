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
					<div class="box-header with-border">
						<h3 class="box-title">Deudores registrados</h3>
						<!-- Buttons, labels, and many other things can be placed here! -->
						<!-- Here is a label for example -->
							<!--<a class="btn btn-sm btn-success" href="{{ route('deudores.create') }}" title="Nuevo deudor">
								<i class="fa fa-plus" style="vertical-align:middle" ></i> <span>Crear nuevo deudor</span>
							</a>-->
						
					<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive" style="padding-top: 15px;">
							<table id='tabla_deudores' class="table table-hover table-bordered table-striped datatable" style="width:100%">
		                        <thead>
		                            <tr>
		                                <th>Rut</th>
		                                <th>Razón social</th>
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