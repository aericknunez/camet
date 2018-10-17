<?php 
class Inicio{

	public function __construct(){

	}

	
	public function GenerarFacturas(){ // genera todas las facturas x dias antes
    	$db = new dbConn();
    	$ahora=Fechas::Format(date("d-m-Y")); $fiveup=$ahora + 432000;// 5 dias
    	// Busco todas las facturas a generar
    	$a = $db->query("SELECT * FROM contratos WHERE estado = '2' and edo_pago = '0' and proximo_pagoF BETWEEN '$ahora' and '$fiveup'");

	    foreach ($a as $b) {
	   
	    	Inicio::AgregaFactura($b["cliente"],$b["id"]);
	        
	    } $a->close();

	   $db->close(); // cierra toda la base de datos
    }




	public function AgregaFactura($cliente,$contrato){
		$db = new dbConn();

		$datos = array();
	    $datos["cliente"] = $cliente;
	    $datos["contrato"] = $contrato;
	    $datos["subtotal"] = Inicio::ObtenerCuota($cliente,$contrato);
	    $datos["impuestos"] = Inicio::ObtenerImpuestos($cliente,$contrato);
	    $datos["inicio_cobro"] = Inicio::InicioCobro($cliente,$contrato);
	    $datos["inicio_cobroF"] = Fechas::Format(Inicio::InicioCobro($cliente,$contrato));
	    $datos["fin_cobro"] = Inicio::FinCobro($cliente,$contrato);
	    $datos["fin_cobroF"] = Fechas::Format(Inicio::FinCobro($cliente,$contrato));
	    $datos["mes"] = Fechas::MesPago(Inicio::FinCobro($cliente,$contrato));
	    $datos["estado"] = "1";  // 1=pendiente 0= pagado
	    if ($db->insert("control_facturas", $datos)) {

	        Inicio::ActualizarRegistro(Inicio::FinCobro($cliente,$contrato),$cliente,$contrato);
	    }
	}


	public function ActualizarRegistro($fecha,$cliente,$contrato){ // dia cobro
		$db = new dbConn();

		//$fecha=Fechas::SiguientePago($fecha);
		$cambio = array();
		    $cambio["edo_pago"] = "1"; // 1 = factura generada// para que ya no la busque
		    $cambio["proximo_pago"] = $fecha;
		    $cambio["proximo_pagoF"] = Fechas::Format($fecha);
		    $db->update("contratos", $cambio, "WHERE cliente = '$cliente' and id = '$contrato'");
	}



	public function InicioCobro($cliente,$contrato){
		$db = new dbConn();

		$a = $db->query("SELECT * FROM control_facturas WHERE cliente = '$cliente' and contrato = '$contrato'");
		if($a->num_rows > 0){// si hay facuras

			if ($r = $db->select("fin_cobro", "control_facturas", "WHERE cliente = '$cliente' and contrato = '$contrato' order by id desc limit 1")) { 
		        return Fechas::DiaSiguiente($r["fin_cobro"]);
		    	}unset($r);

		} 
		else { // si no hay facturas

			if ($r = $db->select("activacion", "contratos", "WHERE cliente = '$cliente' and id = '$contrato'")) { 
		        return $r["activacion"];
		    	}unset($r);
		}
		$a->close();
	}




	public function FinCobro($cliente,$contrato){
		$db = new dbConn();

		$a = $db->query("SELECT * FROM control_facturas WHERE cliente = '$cliente' and contrato = '$contrato'");
		if($a->num_rows > 0){// si hay facuras

			if ($r = $db->select("fin_cobro", "control_facturas", "WHERE cliente = '$cliente' and contrato = '$contrato' order by id desc limit 1")) { 
		        return Fechas::SiguientePago($r["fin_cobro"]);
		    	}unset($r);

		} 
		else { // si no hay facturas

			if ($r = $db->select("proximo_pago", "contratos", "WHERE cliente = '$cliente' and id = '$contrato'")) { 
		        return $r["proximo_pago"];
		    	}unset($r);
		}
		$a->close();
	}



	public function ObtenerCuota($cliente,$contrato){
		$db = new dbConn();

		$a = $db->query("SELECT * FROM control_facturas WHERE cliente = '$cliente' and contrato = '$contrato'");
		if($a->num_rows > 0){// si hay facuras

			if ($r = $db->select("cuota", "cuota_establecida", "WHERE cliente = '$cliente' and contrato = '$contrato' order by id desc limit 1")) { 
	        return $r["cuota"];
	    	}unset($r); 

		} 
		else { // si no hay facturas

			if ($r = $db->select("cuota", "cuota_establecida", "WHERE cliente = '$cliente' and contrato = '$contrato' order by id desc limit 1")) { 
				$DiasPendientes=Fechas::DiasPendientes($contrato);
				$PrecioDiario=$r["cuota"] / 30;
	        return $DiasPendientes * $PrecioDiario;
	    	}unset($r); 
		}
		$a->close();

	}


	public function ObtenerImpuestos($cliente,$contrato){
		$db = new dbConn();

		$a = $db->query("SELECT sum(cantidad) FROM impuestos WHERE estado = '1'");
	    foreach ($a as $b) {
	        return $b["sum(cantidad)"];
	    } $a->close(); 
	}



	
}



