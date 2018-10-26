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
				<div class="panel panel-primary">
					<div class="panel-heading"></div>
					<div class="panel-body">

						@if (Session::has('message'))
						   <div class="alert alert-success">{{ Session::get('message') }}</div>
						@endif

						<form action="{{ route('asignaciones.importar') }}" class="form-horizontal" method="POST" handling facade or enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="col-md-4">
								<input type="file" name="file" accept="text/plain, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
							</div>

							<div class="col-md-4">
								<button class="btn btn-primary">Importar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection