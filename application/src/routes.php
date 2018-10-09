<?php
include_once '../../application/includes/variables_db.php';
include_once '../../application/includes/db_connect.php';
include_once '../../application/includes/functions.php';
sec_session_start();


include_once '../../application/common/Alerts.php';
$alert = new Alerts;
include_once '../../application/common/mysqli.php';
$db = new dbConn();


include_once '../../system/user/Usuarios.php';
$usuarios = new Usuarios;

/// usuarios
if($_REQUEST["op"]=="1"){
$passw1 = filter_input(INPUT_POST, 'pass1', FILTER_SANITIZE_STRING);
$passw2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_STRING);
$usuarios->CompararPass($passw1, $passw2); 
//Alerts::Alerta("success","Agregado Correctamente","No se puede hacer la accion solicitada, consulte el manual");
}


if($_REQUEST["op"]=="2"){
$alert->EliminarUsuario($_REQUEST["iden"], $_REQUEST["username"]);
}

if($_REQUEST["op"]=="3"){
$usuarios->EliminarUsuario($_REQUEST["iden"], $_REQUEST["username"]);
}



?>