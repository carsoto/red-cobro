
<div class="modal-body">
	<ul>
	    @foreach($direcciones AS $key => $d)
	    	<li>
	    		<strong>Dirección: </strong>{{ $d->direccion }}
		    	<br><strong>Complemento: </strong>{{ $d->complemento }}
		    	<br><strong>Comuna: </strong>{{ $d->comuna()->first()->comuna }}
		    	<br><strong>Provincia: </strong>{{ $d->comuna()->first()->provincia()->first()->provincia }}
		    	<br><strong>Región: </strong>{{ $d->comuna()->first()->provincia()->first()->region()->first()->region }}
	    	</li>
	    	<br>
	    @endforeach
	</ul>
 </div>