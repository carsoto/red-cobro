@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Carga de Archivos
@endsection

@section('contentheader_title')
	Carga de Archivos
@endsection

@section('contentheader_description')
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					@if (Session::has('message'))
						<div class="alert alert-success" style="font-size: 14px;">{{ Session::get('message') }}</div>
					@endif
					
					<!-- /.box-header -->
					<div class="box-body">
						<form action="{{ route('archivos.importar') }}" class="form-horizontal" method="POST" handling facade or enctype="multipart/form-data">
							{{ csrf_field() }}
							<!--<div class="col-lg-4 col-md-6 hidden-xs" >
								<img src="{{ asset('public/img/cobranza/etl-bg.png') }}" width="250px">
							</div>-->
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-inline">
									<div class="iradio icheck">
							        	<label>
							                <input value="Asignaciones" type="radio" name="tipo_archivo" checked> Asignaciones
							            </label>
							        	<label>
							                <input value="Pagos" type="radio" name="tipo_archivo"> Pagos
							            </label>
							        	<label>
							                <input value="Marcar_deudores" type="radio" name="tipo_archivo"> Marcar Deudores
							            </label>
							            <!--<label>
							                <input value="Marcar_contactos" type="radio" name="tipo_archivo"> Marcar Contactos
							            </label>-->
							        </div>
								</div>
							</div>
							<div class="col-lg-10 col-md-8 col-sm-6">
								<input type="file" class="form-control" name="file" accept="text/plain, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
							</div>

							<div class="col-md-2 col-md-2 col-sm-6">
								<button class="btn btn-primary"><i class="fa fa-upload"></i> Importar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection