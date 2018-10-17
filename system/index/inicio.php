<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// include_once 'application/common/Encrypt.php';

// $x=Encrypt::Encrypt("Erick Adonai Nunez Martinez");

// echo $x . "<br>";
// echo Encrypt::Decrypt($x);
?>
<div class="card-deck">

<div class="card text-center" style="width: 22rem;">
    <div class="card-header success-color white-text">
        Servicios Solicitados
    </div>
    <div class="card-body">
        <h1 class="display-1">3</h1>
        <a href="?conexion" class="btn btn-success btn-sm">Ver todos</a>
    </div>
</div>

<div class="card text-center" style="width: 22rem;">
    <div class="card-header warning-color white-text">
        Cobros Pendientes
    </div>
    <div class="card-body">
        <h1 class="display-1">12</h1>
        <a href="?cobros" class="btn btn-warning btn-sm">Ver todos</a>
    </div>
</div>

<div class="card text-center" style="width: 22rem;">
    <div class="card-header success-color white-text">
        Facturas a Imprimir
    </div>
    <div class="card-body">
        <h1 class="display-1">7</h1>
        <a href="?imprimir" class="btn btn-success btn-sm">Ver todos</a>
    </div>
</div>
</div>





