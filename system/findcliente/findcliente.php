<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/mysqli.php';
$db = new dbConn();
 ?>
 <style>
#producto-list{float:left;list-style:none;margin-top:-3px;padding:20;width:500px;position: absolute;}
#producto-list li{padding: 4px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#producto-list li:hover{background:#ece3d2;cursor: pointer;}

a:link   
{   
 text-decoration:none;   
} 
</style>

  <div class="row justify-content-md-center justify-content-sm-center">
    <div class="col-12 col-md-auto col-sm-auto">
      
<form class="form-inline md-form mr-auto mb-4" id="form-find-cliente" name="form-find-cliente">
    <input class="form-control mr-sm-2" type="text" placeholder="Busqueda" aria-label="Search" id="search-box" name="search-box" autocomplete="off">
    <button class="btn btn-outline-warning btn-rounded btn-sm my-0" type="submit" id="btn-find-cliente" name="btn-find-cliente">Buscar</button>
</form>




</div>
   </div>


<div id="suggesstion-box"></div>

<div id="contenido_clientes"></div>
<div id="contenido_busqueda"></div>
