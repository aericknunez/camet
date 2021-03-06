<?php
include_once '../../application/includes/variables_db.php';
include_once '../../application/includes/db_connect.php';
include_once '../../application/includes/functions.php';
sec_session_start();


include_once '../../application/common/Alerts.php';
$alert = new Alerts;
include_once '../../application/common/Helpers.php';
$helps = new Helpers;
include_once '../../application/common/Fechas.php';
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

	if($helps->ComprobarDui($helps->Dui($_POST["dui"])) == TRUE){

		Alerts::Alerta("warning","Error","El numero de dui ingresado ya existe asignado a otro cliente");
		

	} else{

		if($_POST["nombre"] != NULL and $_POST["dui"] != NULL){
		$clientes->AddCliente($_POST["nombre"],$helps->Dui($_POST["dui"]),$_POST["dir_casa"],$_POST["dir_cobro"],$helps->Telefono($_POST["tel_casa"]),$helps->Telefono($_POST["tel_cel"]));	
		}
		else{
		Alerts::Alerta("warning","Error","Hay datos vacios! Por favor llene los datos necesarios");

		}
	}
}


if($_REQUEST["op"]=="5"){
include_once '../../system/addcliente/Clientes.php';
Clientes::VerClientes($_REQUEST["iden"]); //ver lista de clientes paginados
}


if($_REQUEST["op"]=="6"){ //mostrar cliente seleccionado
include_once '../../system/findcliente/Clientes.php';
FindClientes::VerDetalle($_REQUEST["iden"]); //ver lista de clientes paginados

include_once '../../system/cable/Contratos.php';
ContratoCable::Vercontratos($_REQUEST["iden"]); //ver lista de contratos

include_once '../../system/cobros/Cobro.php'; 
Cobro::VerCliente($_REQUEST["iden"]);
}

if($_REQUEST["op"]=="7"){ //clientes buscados
include_once '../../system/findcliente/Clientes.php';
FindClientes::VerBusqueda($_POST["search-box"]); //ver lista de clientes paginados
}

if($_REQUEST["op"]=="8"){ //agregar contrato cable
include_once '../../system/cable/Contratos.php';
$contratos = new ContratoCable;

if($helps->ComprobarDui($helps->Dui($_POST["dui"])) == TRUE){

		Alerts::Alerta("warning","Error","El numero de dui ingresado ya esta asignado a algun cliente, para agregar contrato de cable hagalo atravez de los clientes");
		

	} else{

		if($_POST["nombre"] != NULL and $_POST["dui"] != NULL and $_POST["fechainicio_submit"] != NULL and $_POST["fechafin_submit"] != NULL){
		
		$contratos->AddContrato(
			$helps->Dui($_POST["dui"]),
			$helps->Mayusculas($_POST["nombre"]),
			$helps->Telefono($_POST["tel_casa"]),
			$helps->Telefono($_POST["tel_cel"]),
			$helps->MayusInicial($_POST["dir_casa"]),
			$helps->MayusInicial($_POST["dir_cobro"]),
			$_POST["fechainicio_submit"],
			$_POST["fechafin_submit"],
			Fechas::Format($_POST["fechainicio_submit"]),
			Fechas::Format($_POST["fechafin_submit"]),
			$_POST["fechacobro"],
			$_POST["cuota"]
		);

		}
		else{
		Alerts::Alerta("warning","Error","Hay datos vacios! Por favor llene los datos necesarios");

		}
	}
	/////
}






if($_REQUEST["op"]=="9"){ //agregar contrato internet
include_once '../../system/internet/Contratos.php';
$contratos = new ContratoInternet;

if($helps->ComprobarDui($helps->Dui($_POST["dui"])) == TRUE){

		Alerts::Alerta("warning","Error","El numero de dui ingresado ya esta asignado a algun cliente, para agregar contrato de cable hagalo atravez de los clientes");
		

	} else{

		if($_POST["nombre"] != NULL and $_POST["dui"] != NULL and $_POST["fechainicio_submit"] != NULL and $_POST["fechafin_submit"] != NULL){
		
		$contratos->AddContrato(
			$helps->Dui($_POST["dui"]),
			$helps->Mayusculas($_POST["nombre"]),
			$helps->Telefono($_POST["tel_casa"]),
			$helps->Telefono($_POST["tel_cel"]),
			$helps->MayusInicial($_POST["dir_casa"]),
			$helps->MayusInicial($_POST["dir_cobro"]),
			$_POST["fechainicio_submit"],
			$_POST["fechafin_submit"],
			Fechas::Format($_POST["fechainicio_submit"]),
			Fechas::Format($_POST["fechafin_submit"]),
			$_POST["fechacobro"],
			$_POST["cuota"],
			$_POST["tcontrato"],
			$_POST["velocidad"],
			$_POST["tecnologia"]
		);

		}
		else{
		Alerts::Alerta("warning","Error","Hay datos vacios! Por favor llene los datos necesarios");

		}
	}
	/////
}




if($_REQUEST["op"]=="10"){ //agregar contrato cable de usuario
include_once '../../system/cable/Contratos.php';
$contratos = new ContratoCable;


		if($_POST["client"] != NULL and $_POST["fechainicio_submit"] != NULL and $_POST["fechafin_submit"] != NULL){
		
		$contratos->AddContratoCliente(
			$_POST["client"],
			$_POST["fechainicio_submit"],
			$_POST["fechafin_submit"],
			Fechas::Format($_POST["fechainicio_submit"]),
			Fechas::Format($_POST["fechafin_submit"]),
			$_POST["fechacobro"],
			$_POST["cuota"]
		);

		}
		else{
		Alerts::Alerta("warning","Error","Hay datos vacios! Por favor llene los datos necesarios");

		}
	
}





if($_REQUEST["op"]=="11"){ //agregar contrato internet desde cliente
include_once '../../system/internet/Contratos.php';
$contratos = new ContratoInternet;

		if($_POST["client"] != NULL and $_POST["fechainicio_submit"] != NULL and $_POST["fechafin_submit"] != NULL){
		
		$contratos->AddContratoCliente(
			$_POST["client"],
			$_POST["fechainicio_submit"],
			$_POST["fechafin_submit"],
			Fechas::Format($_POST["fechainicio_submit"]),
			Fechas::Format($_POST["fechafin_submit"]),
			$_POST["fechacobro"],
			$_POST["cuota"],
			$_POST["tcontrato"],
			$_POST["velocidad"],
			$_POST["tecnologia"]
		);

		}
		else{
		Alerts::Alerta("warning","Error","Hay datos vacios! Por favor llene los datos necesarios");

		}

}


if($_REQUEST["op"]=="12"){
include_once '../../system/conexion/Conexiones.php';
Conexion::VerClientes($_REQUEST["iden"]); //paginacion conexion pendiente
}

if($_REQUEST["op"]=="13"){
include_once '../../system/conexion/Conexiones.php';
Conexion::Activar(
$_REQUEST["iden"],
date("d-m-Y"),
Fechas::Format(date("d-m-Y"))
); //activar conexion
}


if($_REQUEST["op"]=="14"){
include_once '../../system/cobros/Cobro.php'; // paginacion cobros
Cobro::VerClientes($_REQUEST["iden"]); //paginacion conexion pendiente
}


if($_REQUEST["op"]=="15"){ // cobro
include_once '../../system/cobros/Cobro.php'; 
Cobro::RealizarCobro($_REQUEST["cliente"],$_REQUEST["contrato"],$_REQUEST["iden"]);
}


if($_REQUEST["op"]=="16"){ // imprimir

if($_POST["fecha_submit"] != NULL){

	$dia=Fechas::DiaFecha($_POST["fecha_submit"]);
	
	include_once '../../system/imprimir/imprime.php';
	} else {
		Alerts::Alerta("warning","Error","Seleccione una fecha a imprimir");
	}

}




if($_REQUEST["op"]=="17"){ // cambiar estado contrato
	if($_POST["cambio_estado"] == "0"){
		echo "Seleccione una Opci&oacuten";
	} else {
	    $cambio = array();
	    $cambio["estado"] = $_POST["cambio_estado"];
	    if ($db->update("contratos", $cambio, "WHERE id=".$_POST["iden"]."")) {
	        echo Helpers::EstadoContrato($_REQUEST["cambio_estado"]);
	    }	
	}
}


if($_REQUEST["op"]=="18"){ // generar facturas anteriores
include_once '../../application/includes/Inicio.php';
Inicio::GenerarFacturas($_REQUEST["iden"]); 
$db->delete("control_generador_up", "WHERE id=".$_REQUEST["id"]." and fecha = ".$_REQUEST["iden"]."");
header("location: ../../?generarfacturas");
}



if($_REQUEST["op"]=="19"){ // imprimir

	$inicio=Fechas::Format($_POST["fecha_submit"]);
	$fin=Fechas::Format($_POST["fecha2_submit"]);
	$cliente=$_POST["cliente"];
	$contrato=$_POST["contrato"];

	include_once '../../system/cuotas/imprime_cuotas.php';

}


if($_REQUEST["op"]=="20"){ // pagos extra
include_once '../../system/extrapagos/Pagos.php'; 
Pagos::RealizarCobro($_POST["cliente"],$_POST["contrato"],$_POST["cantidad"]);

}


if($_REQUEST["op"]=="21"){ // cambiar fecha activacion
include_once '../../system/conexion/Conexiones.php';
Conexion::Activar(
$_POST["iden"],
$_POST["fecha_submit"],
Fechas::Format($_POST["fecha_submit"])
); //activar conexion

}

?>