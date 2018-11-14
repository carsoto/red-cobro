<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ asset('/public/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('/public/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/public/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};

    (function($) {
    	$('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
        
    	var table_user = document.getElementById('tabla_usuarios');
    	if(table_user != undefined){
	    	var datatable_usuarios = $('#tabla_usuarios').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: 'usuarios/table/listado',
		        columns: [		
		            {data: 'name', name: 'name'},
		            {data: 'email', name: 'email'},
		            {data: 'role', name: 'role'},
		            {data: 'status', name: 'status'},
		            {data: 'action', name: 'action', orderable: false}
		        ]
		    });

			$(document).on('click', ".eliminar_usuario", function(e) {
		        var _this = $(this);
		        e.preventDefault();
		        swal({
		            title: "¿Está seguro?",
					text: "Una vez deshabilitado, el usuario no podrá acceder nuevamente al sistema!",
					icon: "warning",
		            showCancelButton: true,
		            confirmButtonColor: '#DD4B39',
		            cancelButtonColor: '#00C0EF',
		            buttons: ["Cancelar", true],
		            closeOnConfirm: false
		        }).then(function(isConfirm) {
		            if (isConfirm) {

						$.ajax({
				           	url: 'usuarios/eliminar/'+_this.attr("data-id"),
				            dataType: "JSON",
				            type: 'GET',
				            success: function (response) {
				            	console.log(response);
				            	if(response.status == 'success'){
				            		swal("Hecho!", response.msg, "success");
				        			datatable_usuarios.ajax.reload();
				            	}else{
				            		swal("Ocurrió un error!", response.msg, "error");
				            	}
				                
				            },
				            error: function (xhr, ajaxOptions, thrownError) {
				                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
				            }

				        });
		            }
		        });
		    });	
    	}

    	var table_deudor = document.getElementById('tabla_deudores');
    	if(table_deudor != undefined){
    		var datatable_deudores = $('#tabla_deudores').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: 'deudores/table/listado',
		        columns: [		
		            {data: 'rut', name: 'rut'},
		            {data: 'razon_social', name: 'razon_social'},
		            {data: 'action', name: 'action', orderable: false}
		        ]
		    });

		    /*$(document).on('click', ".detalle_deuda", function(e) {
		        var _this = $(this);
		        e.preventDefault();
		        $.ajax({
		           	url: 'deudores/detalles-resumen/'+_this.attr("data-id"),
		            dataType: "JSON",
		            type: 'GET',
		            success: function (response) {

		            	var direcciones = response.direcciones;
		            	
		            	var direcciones_format = '<ul>';
		            	for (var i = 0; i < direcciones.length; i++) {
		            		direcciones_format += '<li><strong>Dirección '+(i+1)+': </strong>'+direcciones[i].direccion+'<br><strong>Complemento: </strong>'+direcciones[i].complemento+'<br><strong>Comuna: </strong>'+direcciones[i].comuna+'<br><strong>Provincia: </strong><br><strong>Ciudad: </strong></li><br>';
		            	}
		            	direcciones_format += '</ul>';
						
						$('#deudores-direcciones-body').html(direcciones_format);
						
						var telefonos = response.telefonos;
						var correos =  response.correos;
						
						var telefonos_format = '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Teléfonos<br><ul>';
						for (var i = 0; i < telefonos.length; i++) {
							telefonos_format += '<li>'+telefonos[i].telefono+'</li>';
						}
						telefonos_format += '</ul></div>';

						var correos_format = '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Correos<br><ul>';
						for (var i = 0; i < correos.length; i++) {
							correos_format += '<li>'+correos[i].correo+'</li>';
						}
						correos_format += '</ul></div>';

						$('#deudores-contacto-body').html(telefonos_format + correos_format);

						var documentos = response.documentos;
						
						var documentos_format = '<table class="table table-hover"><tbody><tr><th>Número</th><th>Folio</th><th>Deuda</th><th>D. Mora</th><th>F. de Venc.</th><tr>';
						
						for (var i = 0; i < documentos.length; i++) {
							documentos_format += '<tr><td>' + documentos[i].numero + '</td><td>' + documentos[i].folio + '</td><td>' + documentos[i].deuda + '</td><td>' + documentos[i].dias_mora + '</td><td>' + documentos[i].fecha_vencimiento + '</td><tr>';
							documentos[i]
						}
						documentos_format += '</tbody></table>';

						$('#deudores-documentos-body').html(documentos_format);
						$('#deudor-deuda-total').html('<i class="fa fa-dollar"></i> ' + response.deuda);
						
						$('#detalles-deudor').modal('show');
		            },
		            error: function (xhr, ajaxOptions, thrownError) {
		                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
		            }

		        });
		    });*/
    	}
      	
      	var table_hist_gestiones = document.getElementById('tabla_hist_gestiones');
    	if(table_hist_gestiones != undefined){
	    	var datatable_hist_gestiones = $('#tabla_hist_gestiones').DataTable({
		        processing: true,
		        serverSide: true,
		        /*ajax: 'usuarios/table/listado',
		        columns: [		
		            {data: 'name', name: 'name'},
		            {data: 'email', name: 'email'},
		            {data: 'role', name: 'role'},
		            {data: 'status', name: 'status'},
		            {data: 'action', name: 'action', orderable: false}
		        ]*/
		    });	
    	}

      	var table_proveedor = document.getElementById('tabla_proveedores');
    	if(table_proveedor != undefined){
    		var datatable_proveedores = $('#tabla_proveedores').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: 'proveedores/table/listado',
		        columns: [		
		            {data: 'rut', name: 'rut'},
		            {data: 'razon_social', name: 'razon_social'},
		            {data: 'action', name: 'action', orderable: false}
		        ]
		    });
    	}

    	var table_documento = document.getElementById('tabla_documentos');
    	if(table_documento != undefined){
    		var datatable_documentos = $('#tabla_documentos').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: 'documentos/table/listado',
		        columns: [		
		            {data: 'numero', name: 'numero'},
		            {data: 'folio', name: 'folio'},
		            {data: 'deuda', name: 'deuda'},
		            {data: 'fecha_emision', name: 'fecha_emision'},
		            {data: 'fecha_vencimiento', name: 'fecha_vencimiento'},
		            {data: 'dias_mora', name: 'dias_mora'},
		            //{data: 'action', name: 'action', orderable: false}
		        ]
		    });
    	}

    	var table_region = document.getElementById('tabla_regiones');
    	if(table_region != undefined){
    		var datatable_regiones = $('#tabla_regiones').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: 'regiones/table/listado',
		        columns: [		
		            {data: 'region', name: 'region'},
		            //{data: 'action', name: 'action', orderable: false}
		        ]
		    });
    	}

    	var table_provincia = document.getElementById('tabla_provincias');
    	if(table_provincia != undefined){
    		var datatable_provincias = $('#tabla_provincias').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: 'provincias/table/listado',
		        columns: [		
		            {data: 'provincia', name: 'provincia'},
		            //{data: 'action', name: 'action', orderable: false}
		        ]
		    });
    	}

    	var table_comuna = document.getElementById('tabla_comunas');
    	if(table_comuna != undefined){
    		var datatable_comunas = $('#tabla_comunas').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: 'comunas/table/listado',
		        columns: [		
		            {data: 'comuna', name: 'comuna'},
		            //{data: 'action', name: 'action', orderable: false}
		        ]
		    });
    	}
    })(jQuery);

    function buscar_por_rut(){
    	// tu elemento que quieres activar.
		var cargando = $(".cargando");

		// evento ajax start
		$(document).ajaxStart(function() {
			cargando.show();
		});

		// evento ajax stop
		$(document).ajaxStop(function() {
			cargando.hide();
		});

        $.ajax({
           	url: 'gestiones/buscar-rut',
            dataType: "JSON",
            type: 'POST',
            data: $('#form-gestion-rut').serialize(),
            success: function (response) {
            	//console.log(response);
            	if(response.mensaje != ''){
            		swal("Rut no encontrado!", response.mensaje, "error");
            	}else{
            		$('#deudor-rut').html(response.deudor.rut_dv);
					$('#deudor-razon-social').html(response.deudor.razon_social);
					$('#deudor-en-gestion').html('-');
					//$('#deudor-fecha-asignacion').html(response.deudor.created_at);
					$('#deudor-dias-mora').html('-');
					$('#deudor-marca-1').html('-');
					$('#deudor-marca-2').html('-');
					$('#deudor-marca-3').html('-');
					$('#deudor-marca-4').html('-');
					$('#deudor-marca-5').html('-');
					$('#deudor-marca-6').html('-');
					$('#deudor-deuda-asignada').html(response.deuda);
					$('#deudor-deuda-recuperada').html('-');
					$('#deudor-saldo-hoy').html('-');
					$('#deudor-fecha-ult-gest').html('-');
					$('#deudor-ult-gest').html('-');
					$('#deudor-ult-resp').html('-');
					$('#deudor-ult-det-resp').html('-');
					$('#deudor-ult-obs-gest').html('-');

					var tabla_contactos = $("#tabla-contactos");
					var cantd_filas = $('#tabla-contactos >tbody >tr').length;
					var n = 1;

					$('#tabla-contactos tr').each(function() {
						if (n > 2 && n <= cantd_filas)
							$(this).remove();
							n++;
					});
					if((response.telefonos.length > 0) || (response.correos.length > 0)){
						for (var i = 0; i < response.telefonos.length; i++) {
							var row = $("<tr style='font-size: 11px;'>");
							
						  row.append($("<td>"+response.telefonos[i].telefono+"</td>"))
						     .append($("<td colspan='2'>-</td>"))
						     .append($("<td>-</td>"))
						     .append($("<td>-</td>"))
						     .append($("<td>-</td>"));
						 
						  $("#tabla-contactos tbody").append(row);
							}
							for (var i = 0; i < response.correos.length; i++) {
							var row = $("<tr style='font-size: 11px;'>");
							
						  row.append($("<td>"+response.correos[i].correo+"</td>"))
						     .append($("<td colspan='2'>-</td>"))
						     .append($("<td>-</td>"))
						     .append($("<td>-</td>"))
						     .append($("<td>-</td>"));
						 
						  $("#tabla-contactos tbody").append(row);
							}
					}
					
            	}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
            }

        });	
    }

    function opciones_rut(modulo, iddeudor){
    	//$('#rut-modal-detalles .modal-dialog').addClass('modal-lg');

    	var dir_url = title = "";
		if(modulo == "agregar_gestion"){
			title = '<i class="fa fa-plus"></i> AGREGAR GESTIÓN';
    		dir_url = "deudores/gestion/nueva/"+iddeudor;
		}

		if(modulo == "historial_gestiones"){
			title = '<i class="fa fa-history"></i> HISTORIAL DE GESTIONES';
    		dir_url = "deudores/gestion/historial/"+iddeudor;
		}

		if(modulo == "documentos"){
			title = '<i class="fa fa-file-o"></i> DOCUMENTOS';
    		dir_url = "deudores/gestion/documentos/"+iddeudor;
		}

    	if(modulo == "direcciones"){
    		title = '<i class="fa fa-map-marker"></i> DIRECCIONES';
    		dir_url = "deudores/gestion/direcciones/"+iddeudor;
    	}

    	$.ajax({
           	url: dir_url,
            dataType: "HTML",
            type: 'GET',
            success: function (response) {
            	$('#rut-modal-detalles .modal-title').html(title);
            	$('#rut-modal-detalles .modal-body').html(response);
    			$('#rut-modal-detalles').modal('show');
            	
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
            }

        });
    }
</script>
