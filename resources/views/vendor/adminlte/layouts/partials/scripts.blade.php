<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
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
					text: "Una vez eliminado, no podrás recuperar los datos de este usuario!",
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
		            {data: 'action', name: 'action', orderable: false}
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
		            {data: 'action', name: 'action', orderable: false}
		        ]
		    });
    	}

    	var table_comuna = document.getElementById('tabla_comunas');
    	console.log(table_comuna);
    	if(table_comuna != undefined){
    		var datatable_comunas = $('#tabla_comunas').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: 'comunas/table/listado',
		        columns: [		
		            {data: 'comuna', name: 'comuna'},
		            {data: 'action', name: 'action', orderable: false}
		        ]
		    });
    	}
    })(jQuery);
</script>
