<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
 
  <link href="<?php echo base_url()?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url()?>css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" id="nombre_rut"><?php echo $nombre ?></div>
      <div class="card-body">
        <?php 
        //print_r($fonos);
        if(!empty($fonos)){ ?>
        <table class="table">
          <tr>
              <th>Fono</th>
              <th>Fono Confirmado</th>
          </tr>
          <?PHP
            foreach($fonos as $f){
              echo '<tr>';
              //formateo fono
              $codigo = substr($f['fono'], 0,2);
              $fono = substr($f['fono'],2);
              $fono = '+'.$codigo.' '.$fono;
              echo '<td>'.$fono.'</td>';
              if($f['confirmado'] == 1) {
                $val = 'SI';
              } else {
                $val = 'NO';
              }
              echo '<td>'.$val.'</td>';
              echo '</tr>';  
          }
          ?> 
        </table>
        <?php } else {
          echo 'RUT SIN FONO';
      }?>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" id="nombre_rut">Mail</div>
      <div class="card-body">
        <?php 
        //print_r($fonos);
        if(!empty($mails)){ ?>
        <table class="table">
          <tr>
              <th>Mail</th>
             
          </tr>
          <?PHP
            foreach($mails as $f){
              echo '<tr>';
              //formateo fonoqqqq
              echo '<td>'.$f['mail'].'</td>';
              
              echo '</tr>';  
          }
          ?> 
        </table>
        <?php } else {
          echo 'RUT SIN MAIL';
      }?>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" id="nombre_rut">Direcciones</div>
      <div class="card-body">
        <?php 
        //print_r($fonos);
        if(!empty($direcciones)){ ?>
        <table class="table">
          <tr>
              <th>Dirección</th>
             
          </tr>
          <?PHP
            foreach($direcciones as $f){
              echo '<tr>';
              //formateo fonoqqqq
              echo '<td>'.$f['direccion'].'</td>';
              
              echo '</tr>';  
          }
          ?> 
        </table>
        <?php } else {
          echo 'RUT SIN DIRECCION';
      }?>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" id="nombre_rut">Patentes</div>
      <div class="card-body">
        <?php 
        //print_r($fonos);
        if(!empty($patentes)){ ?>
        <table class="table">
          <tr>
              <th>Patente</th>
             
          </tr>
          <?PHP
            foreach($patentes as $f){
              echo '<tr>';
              //formateo fonoqqqq
              echo '<td>'.$f['patente'].'</td>';
              
              echo '</tr>';  
          }
          ?> 
        </table>
        <?php } else {
          echo 'RUT SIN PATENTE';
      }?>
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
<script src="<?php echo base_url()?>vendor/jquery/jquery.min.js"></script>
<?php
    if(empty($nombre) or $nombre == ''){ ?>
<script type="text/javascript">
  $( document ).ready(function() {
    rut = $('#inputUsuario').val();
    
    jQuery.getJSON('https://siichile.herokuapp.com/consulta', {rut: rut}, function(result) {
      $('#nombre_rut').html(result['razon_social']);})
   
    });


</script>
<?php } ?>