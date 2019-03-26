 <?php
  if($rango == 'admin'){
    ?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Agregar mas datos</div>
      <div class="card-body" style="text-align:center">
        <a  class="btn btn-primary" rel="stylesheet" type="text/css" href="<?php echo base_url() ?>index.php/Index/agregar_fonos" value="Agregar fonos">Fonos </a>
        <a  class="btn btn-primary" rel="stylesheet" type="text/css" href="<?php echo base_url() ?>index.php/Index/agregar_mail" value="Agregar fonos">Mails </a>
        <a  class="btn btn-primary" rel="stylesheet" type="text/css" href="<?php echo base_url() ?>index.php/Index/agregar_patente" value="Agregar fonos">Patentes </a>
        
      </div>
    </div>
  </div>
  <?php } ?>