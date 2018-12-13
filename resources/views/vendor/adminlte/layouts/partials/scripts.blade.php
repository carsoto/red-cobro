<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ asset('/public/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('/public/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/public/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/public/js/sweetalert.min.js') }}" type="text/javascript"></script>

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

        $('[data-toggle="tooltip"]').tooltip();
        
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

            	if(response.mensaje != ''){
            		swal("Rut no encontrado!", response.mensaje, "error");
            	}

            	else{
            		var marcas = response.marcas;

            		$('#deudor-rut').html(response.deudor.rut_dv);
					$('#deudor-razon-social').html(response.deudor.razon_social);
					
					var clase = document.getElementById('deudor-en-gestion').className;
					$('#deudor-en-gestion').removeClass(clase);
					
					if(response.deudor.en_gestion){
						$('#deudor-en-gestion').addClass('label label-success');
						$('#deudor-en-gestion').html('SI');	
					}else{
						$('#deudor-en-gestion').addClass('label label-danger');
						$('#deudor-en-gestion').html('NO');
					}
					
					$('#deudor-fecha-asignacion').html(response.ultima_asignacion.fecha_asignacion);
					$('#deudor-dias-mora').html(response.ultima_asignacion.dias_mora);

					for (var i = 0; i < marcas.length; i++) {
						$('#deudor-marca-'+(i+1)).html(marcas[i].marca);
					}
					$('#deudor-deuda-asignada').html(response.ultima_asignacion.deuda);
					$('#deudor-deuda-recuperada').html(response.deuda_recuperada);
					$('#deudor-saldo-hoy').html(response.saldo_hoy);
					$('#deudor-fecha-ult-gest').html(response.ultima_gestion.fecha_ult_gestion);
					$('#deudor-ult-gest').html(response.ultima_gestion.ult_gestion);
					$('#deudor-ult-resp').html(response.ultima_gestion.ult_respuesta);
					$('#deudor-ult-det-resp').html(response.ultima_gestion.ult_detalle);
					$('#deudor-ult-obs-gest').html(response.ultima_gestion.ult_observacion);

					var tabla_contactos = $("#tabla-contactos");
					var cantd_filas = $('#tabla-contactos >tbody >tr').length;
					var n = 1;

					$('#tabla-contactos tr').each(function() {
						if (n > 2 && n <= cantd_filas)
							$(this).remove();
							n++;
					});

					for (var propiedad in response.contactos.telefonos) {
						if (response.contactos.telefonos.hasOwnProperty(propiedad)) {
							var row = $("<tr style='font-size: 11px;'>");
							
							row.append($("<td><a href='skype:"+propiedad+"?call'>"+propiedad+"</a></td>"))
							   .append($("<td><span data-toggle='tooltip' title='Respuesta:" + response.contactos.telefonos[propiedad].respuesta +"'>"+ response.contactos.telefonos[propiedad].gestion +"</span></td>"));

							$("#tabla-contactos tbody").append(row);
						}
					}

					for (var propiedad in response.contactos.correos) {
						if (response.contactos.correos.hasOwnProperty(propiedad)) {
							var row = $("<tr style='font-size: 11px;'>");
							
							row.append($("<td><a href='skype:"+propiedad+"?chat'>"+propiedad+"</a></td>"))
							   .append($("<td><span data-toggle='tooltip' title='Respuesta:" + response.contactos.correos[propiedad].respuesta +"'>"+ response.contactos.correos[propiedad].gestion +"</span></td>"));

							$("#tabla-contactos tbody").append(row);
						}
					}

					if((response.contactos.telefonos.length == 0) && (response.contactos.correos.length == 0)){
						var row = $("<tr style='font-size: 11px;'>");
							
						row.append($("<td>-</td>"))
						   .append($("<td>-</td>"));

						$("#tabla-contactos tbody").append(row);
					}
            	}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
            }

        });	
    }

    function cargar_respuestas(gestion){
    	var id_gestion = gestion.options[gestion.selectedIndex].value;
    	var cargando = $(".cargando_modal");

		// evento ajax start
		$(document).ajaxStart(function() {
			cargando.show();
		});

		// evento ajax stop
		$(document).ajaxStop(function() {
			cargando.hide();
		});

        $.ajax({
           	url: 'gestiones/nueva/consultar-respuestas/'+id_gestion,
            dataType: "JSON",
            type: 'GET',
            success: function (response) {

            	$('#select-respuestas').html('');
            	$('#detalles-por-respuesta').html('');
            	$('#detalles-por-respuesta').css({"height": "", "overflow-y":""});

            	var respuestas = response.respuestas;
            	if(respuestas.length > 0){
            		$('#select-respuestas').html('<option value="0">SELECCIONE UNA RESPUESTA</option>');
            		for (var i = 0; i < respuestas.length; i++) {
	            		$('#select-respuestas').append('<option id="'+respuestas[i].idrespuesta+'" value="'+ respuestas[i].codigo + ' - ' + respuestas[i].respuesta +'">' + respuestas[i].codigo + ' - ' + respuestas[i].respuesta + '</option>');
	            	}
            	}else{
            		$('#select-respuestas').html('<option value="0">SELECCIONE UNA RESPUESTA</option>');
            	}
            },
            error: function (xhr, ajaxOptions, thrownError) {
            	swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
            }
        });
    }

    function cargar_detalles(respuesta){
    	var id_respuesta = respuesta.options[respuesta.selectedIndex].getAttribute('id');
    	var cargando = $(".cargando_modal");

		// evento ajax start
		$(document).ajaxStart(function() {
			cargando.show();
		});

		// evento ajax stop
		$(document).ajaxStop(function() {
			cargando.hide();
		});

		if(id_respuesta > 0){
			$.ajax({
	           	url: 'gestiones/nueva/consultar-detalles/'+id_respuesta,
	            dataType: "JSON",
	            type: 'GET',
	            success: function (response) {
	            	var detalles = response.detalles;
	            	$('#detalles-por-respuesta').html('');
	
	            	if(detalles.length > 0){
	            		$('#detalles-por-respuesta').append('<label for="respuesta">SELECCIONE UNA RESPUESTA</label>');
	            		$('#detalles-por-respuesta').append('<div class="overlay cargando_modal" style="display: none;"><i class="fa fa-spinner fa-spin"></i></div>');
	            		$('#detalles-por-respuesta').css({"height": "170px", "overflow-y":"scroll"});
	            		for (var i = 0; i < detalles.length; i++) {
		            		$('#detalles-por-respuesta').append('<div class="radio icheck"><label><input type="radio" name="detalle" value="'+detalles[i].literal+' - '+detalles[i].detalle+'"> '+detalles[i].literal+' - '+detalles[i].detalle+'</label></div>');

		            		$('input').iCheck({
					            checkboxClass: 'icheckbox_square-blue',
					            radioClass: 'iradio_square-blue',
					            //increaseArea: '2%' // optional
					        });
		            	}
	            	}else{
	            		$('#detalles-por-respuesta').css({"height": "", "overflow-y":""});
	            	}
	            },
	            error: function (xhr, ajaxOptions, thrownError) {
	            	swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
	            }
	        });
		}        
    }

    function opciones_rut(modulo, iddeudor){
    	//$('#rut-modal-detalles .modal-dialog').addClass('modal-lg');

    	var dir_url = title = "";
		if(modulo == "agregar_gestion"){
			title = '<i class="fa fa-plus"></i> AGREGAR GESTIÓN';
    		dir_url = "deudores/gestion/nueva/"+iddeudor;
		}

		if(modulo == "historial_gestiones"){
			$('#rut-modal-detalles .modal-dialog').addClass('modal-lg');
			title = '<i class="fa fa-history"></i> HISTORIAL DE GESTIONES';
    		dir_url = "deudores/gestion/historial/"+iddeudor;
		}

		if(modulo == "documentos"){
			$('#rut-modal-detalles .modal-dialog').addClass('modal-lg');
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
    			/*var table_hist_gestiones = document.getElementById('tabla_hist_gestiones');
		    	if(table_hist_gestiones != undefined){
			    	var datatable_hist_gestiones = $('#tabla_hist_gestiones').DataTable({
				        processing: true,
				        serverSide: true,
				        {iddeudor}
				        ajax: 'documentos/table/listado/'+iddeudor,
				        columns: [		
				            //{data: 'name', name: 'name'},
				        ]
				    });	
		    	}*/

		    	var table_documentos = document.getElementById('tabla_documentos');
		    	if(table_documentos != undefined){
			    	var datatable_documentos = $('#tabla_documentos').DataTable({
				        processing: true,
				        serverSide: true,
				        ajax: 'documentos/table/listado/'+iddeudor,
				        columns: [
							{data: 'numero', name: 'numero'},
							{data: 'folio', name: 'folio'},
							{data: 'deuda', name: 'deuda'},
							{data: 'pago', name: 'pago'},
							{data: 'saldo', name: 'saldo'},
							{data: 'dias_mora', name: 'dias_mora'},
							{data: 'fecha_emision', name: 'fecha_emision'},
							{data: 'fecha_vencimiento', name: 'fecha_vencimiento'},
				        ]
				    });	
		    	}
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
            }

        });
    }

    function agregar_gestion(){
    	var contacto = document.getElementById('select-contacto');
    	var id_contacto = contacto.options[contacto.selectedIndex].value;

    	var gestion = document.getElementById('select-gestion');
    	var id_gestion = gestion.options[gestion.selectedIndex].value;

    	var mensaje_error = '';

    	if((contacto.options.length > 1) && (id_contacto == 0)){
    		mensaje_error += '<li>Debe seleccionar el contacto al que le hizo la gestión</li>';
    	}if(id_gestion == 0){
    		mensaje_error += '<li>Debe seleccionar la gestión realizadada</li>';
    	}

    	if(mensaje_error != ""){
    		$("#message").addClass('alert-danger');
    		$("#message").append('<ul>'+ mensaje_error +'</ul>');
    		$("#message").show();

    	}else{

			$.ajax({
				url: 'gestiones',
				dataType: "JSON",
				type: 'POST',
				data: $('#form-agregar-gestion').serialize(),
				success: function (response) {
					$("#message").addClass('alert-success');
		    		$("#message").html(response.mensaje);
		    		$("#message").show();
		    		$('#rut-modal-detalles').modal('hide');
		    		location.reload();
				},
				error: function (xhr, ajaxOptions, thrownError) {
				    swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
				}
			});
    	}
    }

    function consultar_gestiones(iddeudor){
    	$.ajax({
			url: 'gestiones/historial/deudor',
			dataType: "JSON",
			type: 'POST',
			data: $('#form-consultar-hist-gestion').serialize(),
			success: function (response) {
			
				if(response.mensaje_error != undefined){
					swal("Ocurrió un error!", response.mensaje_error, "error");
				}else{
					if((response.data).length > 0){
						//
						$("#historial-de-gestiones").show();
						var table_hist_gestiones = document.getElementById('tabla_hist_gestiones');
				    	if(table_hist_gestiones != undefined){
					    	var datatable_hist_gestiones = $('#tabla_hist_gestiones').DataTable({
						        processing: true,
						        destroy: true,
						        data: response.data,
						        columns: [
			            			{data: 'contacto', name: 'contacto'},
			            			{data: 'descripcion', name: 'descripcion'},
			            			{data: 'respuesta', name: 'respuesta'},
			            			{data: 'detalle', name: 'detalle'},
			            			{data: 'observacion', name: 'observacion'},
			            			//{data: 'anyo', name: 'anyo'},
			            			//{data: 'mes', name: 'mes'},
			            			{data: 'fecha_gestion', name: 'fecha_gestion'},
						        ]
						    });	
				    	}
					}
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
			    swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
			}
		});
    }
</script>
