<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/mysqli.php';
$db = new dbConn();
 ?>

<div id="contenido_clientes"></div>

<div id="contenido_paginador">
<?php 
include_once 'application/common/helpers.php';
include_once 'system/conexion/Conexiones.php';
Conexion::VerClientes(NULL);
?>
</div>

