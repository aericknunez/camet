<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// include_once 'application/common/Encrypt.php';

// $x=Encrypt::Encrypt("Erick Adonai Nunez Martinez");

// echo $x . "<br>";
// echo Encrypt::Decrypt($x);
?>
<?php 
include_once 'application/common/Fechas.php';
include_once 'application/common/helpers.php';
include_once 'application/common/mysqli.php';
include_once 'system/index/Index.php';
$db = new dbConn();
?>
<div class="card-deck">

<div class="card text-center" style="width: 22rem;">
    <div class="card-header success-color white-text">
        Servicios Solicitados
    </div>
    <div class="card-body">
        <h1 class="display-1"><?php echo Index::ContarServiciosSolicitados() ?></h1>
        <a href="?conexion" class="btn btn-success btn-sm">Ver todos</a>
    </div>
</div>

<div class="card text-center" style="width: 22rem;">
    <div class="card-header warning-color white-text">
        Cobros Pendientes
    </div>
    <div class="card-body">
        <h1 class="display-1"><?php echo Index::ContarCobros() ?></h1>
        <a href="?cobros" class="btn btn-warning btn-sm">Ver todos</a>
    </div>
</div>

<div class="card text-center" style="width: 22rem;">
    <div class="card-header success-color white-text">
        Facturas a Imprimir
    </div>
    <div class="card-body">
        <h1 class="display-1">0</h1>
        <a href="?imprimir" class="btn btn-success btn-sm">Ver todos</a>
    </div>
</div>
</div>





