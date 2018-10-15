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
    		/*swal({
				  title: "¿Está seguro?",
				  text: "Una vez eliminado, no podrás recuperar los datos de este usuario!",
				  icon: "warning",
				  dangerMode: true,
				  buttons: ["Cancelar", true],
				})
				.then((willDelete) => {
				  if (willDelete) {
				    swal("El usuario fue eliminado satisfactoriamente!", {
				      icon: "success",
				    });
				  }
				});*/

			$(document).on('click', "form.delete button", function(e) {
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
		                /*_this.closest("form").submit();*/
		                //var results = fetch();
						//console.log(results);
						  /*swal("El usuario fue eliminado satisfactoriamente!", {
								icon: "success",
							});*/

							$.ajax({
					           	url: _this.closest("form").attr('action'),
					            dataType: "html",
					            type: 'GET',
					            success: function (response) {
					            	console.log(response.success);
					            	/*if(s.status == 'success'){
					            		swal("Hecho!", "El registro fue eliminado exitosamente!", "success");
					            	}else{
					            		swal("Ocurrió un error!", "No se pudo eliminar el registro", "error");
					            	}*/
					                
					            },
					            error: function (xhr, ajaxOptions, thrownError) {
					                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
					            }

					        });
		            }
		        });
		    });
			var table = $('.data-tables').DataTable({
				"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
				}],
			});	
    	}
      
    })(jQuery);
</script>
