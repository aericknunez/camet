<?php 
class Pagos{
	
	public function __construct(){

	}

	public function ComprobarActual($cliente,$contrato){
    	$db = new dbConn();

    	$a = $db->query("SELECT * FROM control_facturas WHERE cliente = '$cliente' and contrato = '$contrato' and estado = 1");

if($a->num_rows > 0) return TRUE;
else return FALSE;

$a->close();
    }


	public function RealizarCobro($cliente,$contrato,$cantidad){
    	$db = new dbConn();

    	if(Pagos::ComprobarActual($cliente,$contrato) == FALSE){
		
		Alerts::Alerta("warning","Error!","De momento no se puede usar esta opcion");
    	
    	} else {
    		Alerts::Alerta("warning","Error!","No se pueden hacer los cobros ya que hay cuotas por cobrar");
    	}

    }





}

?>