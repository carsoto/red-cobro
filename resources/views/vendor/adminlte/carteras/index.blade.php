@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Carteras
@endsection

@section('contentheader_title')
	Carteras
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
						<h3 class="box-title"></h3>
						
						<a class="btn btn-sm btn-flat btn-success" href="{{ route('carteras.create') }}" title="Nueva cartera">
							<i class="fa fa-plus" style="vertical-align:middle" ></i> <span>Crear nueva cartera</span>
						</a>
						
					<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive" style="padding-top: 15px;">
							<table id='tabla_carteras' class="table table-hover table-bordered table-striped datatable" style="width:100%">
		                        <thead>
		                            <tr>
		                                <th>Nombre</th>
		                                <th>Estado</th>
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
@endsection