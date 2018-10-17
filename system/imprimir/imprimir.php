<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/mysqli.php';
$db = new dbConn();
?>


  <div class="row justify-content-md-center">
    <div class="col-12 col-md-auto">
      
      <form name="form-imprimir" method="post" id="form-imprimir">
    <input placeholder="Seleccione una fecha" type="text" id="fecha" name="fecha" class="form-control datepicker">
    <label for="fecha">Fecha a Imprimir</label>
	<input name="btn-imprimir" type="submit" id="btn-imprimir" value="Imprimir" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-1 waves-effect">
      </form> 

    </div>
  </div>

<div id="ver_imprimir"></div>
