<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/mysqli.php';
$db = new dbConn();

    if ($r = $db->select("cliente", "clientes", "WHERE id = ".$_REQUEST["cliente"]."")) { 
        echo '<h2 class="text-center">'. $r["cliente"].'</h2>';
    }
    unset($r); 
?>


  <div class="row justify-content-md-center">
    <div class="col-12 col-md-auto">
    <form name="form-extrapagos" method="post" id="form-extrapagos">
    
    <label for="fecha">DIGITE LAS CUOTAS A COBRAR</label>
    <input placeholder="Cantidad" type="number" id="cantidad" name="cantidad" class="form-control datepicker">
    

	<input type="hidden" id="cliente" name="cliente" value="<?php echo $_REQUEST["cliente"]; ?>">
	<input type="hidden" id="contrato" name="contrato" value="<?php echo $_REQUEST["contrato"]; ?>">

	<input name="btn-extrapagos" type="submit" id="btn-extrapagos" value="Cobrar" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-1 waves-effect">
      </form> 

    </div>
  </div>

<div id="ver_total" class="text-center"></div>
