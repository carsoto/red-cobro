<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Busqueda</title>

  <!-- Custom fonts for this template-->
 
  <link href="<?php echo base_url()?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url()?>css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Busqueda</div>
      <div class="card-body">
        <?php echo form_open_multipart('Index/index'); ?>
          <div class="form-group">
            <div class="form-label-group">
              <?php
              if(!empty($rut)) {
                $val = $rut;
              } else {
                $val = '';
              }
              ?>
              <input id="inputUsuario" class="form-control" placeholder="12345678-9" name="rut" required="required" value = "<?php echo $val ?>">
              <label for="inputUsuario">Rut</label>
            </div>
          </div>
         
          
          <button class="btn btn-primary btn-block">Buscar Datos</button>
        </form>
        
      </div>
    </div>
  </div>
 
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
