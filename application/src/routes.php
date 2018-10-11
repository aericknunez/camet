<?php
include_once '../../application/includes/variables_db.php';
include_once '../../application/includes/db_connect.php';
include_once '../../application/includes/functions.php';
sec_session_start();


include_once '../../application/common/Alerts.php';
$alert = new Alerts;
include_once '../../application/common/mysqli.php';
$db = new dbConn();


/// usuarios
if($_REQUEST["op"]=="1"){
include_once '../../system/user/Usuarios.php';
$usuarios = new Usuarios;
$passw1 = filter_input(INPUT_POST, 'pass1', FILTER_SANITIZE_STRING);
$passw2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_STRING);
$usuarios->CompararPass($passw1, $passw2); 
//Alerts::Alerta("success","Agregado Correctamente","No se puede hacer la accion solicitada, consulte el manual");
}


if($_REQUEST["op"]=="2"){
include_once '../../system/user/Usuarios.php';
$usuarios = new Usuarios;
$alert->EliminarUsuario($_REQUEST["iden"], $_REQUEST["username"]);
}

if($_REQUEST["op"]=="3"){
include_once '../../system/user/Usuarios.php';
$usuarios = new Usuarios;
$usuarios->EliminarUsuario($_REQUEST["iden"], $_REQUEST["username"]);
}


if($_REQUEST["op"]=="4"){ // agrega cliente
include_once '../../system/addcliente/Clientes.php';
$clientes = new Clientes;
	if($_POST["nombre"] != NULL and $_POST["dui"] != NULL){
	$clientes->AddCliente($_POST["nombre"],$_POST["dui"],$_POST["dir_casa"],$_POST["dir_cobro"],$_POST["tel_casa"],$_POST["tel_cel"]);	
	}
	else{
	Alerts::Alerta("warning","Error","Hay datos vacios! Por favor llene los datos necesarios");

	}

}

if($_REQUEST["op"]=="5"){
include_once '../../system/addcliente/Clientes.php';
Clientes::VerClientes($_REQUEST["iden"]); //ver lista de clientes paginados
}


if($_REQUEST["op"]=="6"){ //mostrar cliente seleccionado
include_once '../../system/findcliente/Clientes.php';
FindClientes::VerDetalle($_REQUEST["iden"]); //ver lista de clientes paginados

}

if($_REQUEST["op"]=="7"){ //clientes buscados
include_once '../../system/findcliente/Clientes.php';
//FindClientes::VerBusqueda($_POST["search-box"]); //ver lista de clientes paginados
print_r($_POST);
}

?>