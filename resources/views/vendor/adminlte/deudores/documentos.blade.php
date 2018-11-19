<div class="modal-body">
	<table class="table table-hover">
		<tbody>
			<tr>
				<th>Número</th>
				<th>Folio</th>
				<th>Deuda</th>
				<th>D. Mora</th>
				<th>F. de Venc.</th>
			<tr>

			@foreach($documentos AS $key => $doc)
				<tr>
					<td>{{ $doc->numero }}</td>
					<td>{{ $doc->folio }}</td>
					<td>{{ number_format($doc->deuda, 2, ",", ".") }}</td>
					<td>{{ $doc->dias_mora }}</td>
					<td>{{ $doc->fecha_vencimiento }}</td>
				<tr>
			@endforeach
		</tbody>
	</table>
 </div>