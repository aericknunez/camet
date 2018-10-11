<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/mysqli.php';
$db = new dbConn();
 ?>
  <div class="row justify-content-md-center justify-content-sm-center">
    <div class="col-12 col-md-auto col-sm-auto">   
<a href="?modal=addc" class="btn-floating btn-sm blue-gradient"><i class="fa fa-user"></i></a>
</div>
</div>

<div id="contenido_usuarios">
<?php 
include_once 'system/addcliente/Clientes.php';
Clientes::VerClientes(NULL);
?>
</div>

