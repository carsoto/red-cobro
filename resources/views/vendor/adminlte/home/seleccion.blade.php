@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
	Selección
@endsection

@section('contentheader_description')
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-borderless table-condensed table-hover">
								<thead>
									<th></th>
									<th><button class="btn btn-primary btn-sm btn-flat btn-block">ID. Caso</button></th>
									<th><button class="btn btn-primary btn-sm btn-flat btn-block">Rut</button></th>
									<th><button class="btn btn-primary btn-sm btn-flat btn-block">Cartera</button></th>
									<th><button class="btn btn-primary btn-sm btn-flat btn-block">Monto mora</button></th>
									<th><button class="btn btn-primary btn-sm btn-flat btn-block">Recuperado</button></th>
									<th><button class="btn btn-primary btn-sm btn-flat btn-block">Campo 1</button></th>
									<th><button class="btn btn-primary btn-sm btn-flat btn-block">Campo 2</button></th>
									<th><button class="btn btn-primary btn-sm btn-flat btn-block">Campo 3</button></th>
									<th><button class="btn btn-primary btn-sm btn-flat btn-block">Campo X</button></th>
								</thead>
								<tbody>
									<tr>
										<td><button class="btn btn-primary btn-sm btn-flat btn-block">Igual a</button></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
									</tr>
									<tr>
										<td><button class="btn btn-primary btn-sm btn-flat btn-block">En la lista</button></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
									</tr>
									<tr>
										<td><button class="btn btn-primary btn-sm btn-flat btn-block">Contiene</button></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
									</tr>
									<tr>
										<td><button class="btn btn-primary btn-sm btn-flat btn-block">No contiene</button></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
									</tr>
									<tr>
										<td><button class="btn btn-primary btn-sm btn-flat btn-block">Orden</button></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
										<td><input type="text" name="" class="form-control" /></td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td></td>
										<td><a class="btn btn-primary btn-sm btn-flat btn-block" href="{{ route('deudores.index') }}">Ver listado</a></td>
										<td><button class="btn btn-primary btn-sm btn-flat btn-block"><i class='fa fa-refresh'></i>  <span>Reset</span></button></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

<!--
@section('main-content')

@endsection
-->