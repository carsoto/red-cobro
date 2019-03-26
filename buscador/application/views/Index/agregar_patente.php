 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

  <!-- Custom fonts for this template-->
 
  <link href="<?php echo base_url()?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url()?>css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

 <?php
 if(!empty($linea) and $linea > 2){
    ?>
    <div class="alert alert-success" role="alert">
    Las patentes se cargaron con exito
    </div>
    <?php
 }
  if($rango == 'admin'){
    ?>
  <div class="container">
   
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Agregar patentes <a  class="btn-xs btn btn-primary" style = "float:right;font-size: 11px" rel="stylesheet" type="text/css" href="<?php echo base_url() ?>index.php/Index/index" value="Agregar fonos">Volver pagina de inicio </a></div>

      <div class="card-body">
        
        <?php echo form_open_multipart('Index/agregar_patente'); ?>
          <div class="form-group">
            <div class="form-label-group">
              
              <input type = "file" id="inputFile" class="form-control" name="inputfile" required="required">
              <label for="inputFile">Selecciona archivo xlsx </label>
            </div>
          </div>
         
          
          <button class="btn btn-primary btn-block">Importar</button>
        </form>
        
      </div>
    </div>
  </div>
  <?php } ?>
</body>