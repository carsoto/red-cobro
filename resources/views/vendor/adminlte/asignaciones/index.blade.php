@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Asignaciones
@endsection

@section('contentheader_title')
	Asignaciones
@endsection

@section('contentheader_description')
	Carga de archivo
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					@if (Session::has('message'))
						<div class="box-header with-border">
							<span class="box-title"><div class="alert alert-success">{{ Session::get('message') }}</div></span>
						</div>
					@endif
					
					<!-- /.box-header -->
					<div class="box-body">
						<form action="{{ route('asignaciones.importar') }}" class="form-horizontal" method="POST" handling facade or enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="col-md-4 hidden-xs">
								<img src="http://www.lightpath.io/wp-content/uploads/2017/05/etl-bg.png" width="250px">
							</div>
							<div class="col-md-6 col-sm-6">
								<input type="file" class="form-control" name="file" accept="text/plain, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
							</div>

							<div class="col-md-2 col-sm-4">
								<button class="btn btn-primary"><i class="fa fa-upload"></i> Importar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection