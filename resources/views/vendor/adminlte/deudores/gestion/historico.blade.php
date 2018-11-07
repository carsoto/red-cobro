@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Deudores
@endsection

@section('contentheader_title')
	Gestión de Documentos
@endsection

@section('contentheader_description')
	Histórico
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-12">

				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Historial de gestiones</h3>
						<!-- Buttons, labels, and many other things can be placed here! -->
						<!-- Here is a label for example -->
					<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive" style="padding-top: 15px;">
							<table id='tabla_hist_gestiones' class="table table-hover table-bordered table-striped datatable" style="width:100%">
		                        <thead>
		                            <tr>
		                                <th>Gestión</th>
		                                <th>Respuesta</th>
		                                <th>Detalle</th>
		                                <th>Observación</th>
		                            </tr>
		                        </thead>
		                    </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection