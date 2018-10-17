<?php 
class ContratoInternet{
	
	public function __construct(){

	}



	public function AddContrato($dui,$cliente,$tel,$cel,$dir,$dir2,$fi,$ff,$fif,$fff,$fc,$cuota,$tcontrato,$velocidad,$tecnologia){
    	$db = new dbConn();

    	$datos = array();
	    $datos["cliente"] = $cliente;
	    $datos["dui"] = $dui;
	    $datos["dir_residencia"] = $dir;
	    $datos["dir_cobro"] = $dir2;
	    $datos["tel_casa"] = $tel;
	    $datos["tel_cel"] = $cel;
	    $datos["estado"] = "1";
	    if ($db->insert("clientes", $datos)) {
	       $client = $db->insert_id();
	       $this->AddCont($client,$fi,$ff,$fif,$fff,$fc,$cuota,$tcontrato,$velocidad,$tecnologia);
	    } else {

	    Alerts::Alerta("warning","Error","Ha ocurrido un error!");
	
	   }

  	
    }

	public function AddContratoCliente($client,$fi,$ff,$fif,$fff,$fc,$cuota,$tcontrato,$velocidad,$tecnologia){
    	$db = new dbConn();

    	$this->AddCont($client,$fi,$ff,$fif,$fff,$fc,$cuota,$tcontrato,$velocidad,$tecnologia);

    }



	public function AddCont($client,$fi,$ff,$fif,$fff,$fc,$cuota,$tcontrato,$velocidad,$tecnologia) {
		$db = new dbConn();

		$datos = array();
	    $datos["cliente"] = $client;
	    $datos["servicio"] = "2";
	    $datos["fechaInicio"] = $fi;
	    $datos["fechaFin"] = $ff;
	    $datos["fechaInicioF"] = $fif;
	    $datos["fechaFinF"] = $fff;
	    $datos["fechaPago"] = $fc;
	    $datos["estado"] = "1";
	    $datos["edo_pago"] = "0";
	    $datos["proximo_pago"] = Fechas::FechaPagoProximo($fc);
	    $datos["proximo_pagoF"] = Fechas::Format(Fechas::FechaPagoProximo($fc));

	    if ($db->insert("contratos", $datos)) {
	    $contract = $db->insert_id();
	    $this->AddCuota($client,$contract,$cuota,$fi,$fif);
	    $this->AdddatosInternet($client,$contract,$tcontrato,$velocidad,$tecnologia);
		  Alerts::Alerta("success","Agregado Correctamente","Contrato Agregado corectamente!");
	    } 
	}

	    public function AddCuota($client,$contract,$cuota,$fi,$fif) {
		$db = new dbConn();

		$datos = array();
	    $datos["cliente"] = $client;
	    $datos["servicio"] = "2";
	    $datos["contrato"] = $contract;
	    $datos["cuota"] = $cuota;
	    $datos["fecha"] = $fi;
	    $datos["fechaF"] = $fif;
	    $db->insert("cuota_establecida", $datos); 
	}

	    public function AdddatosInternet($client,$contract,$tcontrato,$velocidad,$tecnologia) {
		$db = new dbConn();

		$datos = array();
	    $datos["cliente"] = $client;
	    $datos["contrato"] = $contract;
	    $datos["tcontrato"] = $tcontrato;
	    $datos["velocidad"] = $velocidad;
	    $datos["tecnologia"] = $tecnologia;
	    $db->insert("datos_internet", $datos); 
	}

    public function VerContratos($user){
    	$db = new dbConn();
    
	    $a = $db->query("SELECT * FROM contratos WHERE cliente='$user'");
		    if($a->num_rows > 0)
		    {
		    	echo '<table class="table table-sm">
			  <thead>
			    <tr>
			      <th scope="col">Servicio</th>
			      <th scope="col">Fecha Contrato</th>
			      <th scope="col">Termina Contrato</th>
			      <th scope="col">Dia de Pago</th>
			      <th scope="col">Velocidad</th>
			      <th scope="col">Estado</th>
			    </tr>
			  </thead>
			  <tbody>';
			  
		    	foreach ($a as $b) {
		    		if ($r = $db->select("servicio", "servicios", "WHERE id = ".$b["servicio"]."")) { $servicio = $r["servicio"];
				    } unset($r);

				    if ($r = $db->select("velocidad", "datos_internet", "WHERE contrato = ".$b["contrato"]."")) { $velocidad = $r["velocidad"];
				    } unset($r);

		    		 echo '<tr>
					      <th scope="row">'. $servicio .'</th>
					      <td>'. $b["fechaInicio"] .'</td>
					      <td>'. $b["fechaFin"] .'</td>
					      <td>'. $b["fechaPago"] .'</td>
					      <td>'. $velocidad .'</td>
					      <td>'. Helpers::EstadoContrato($b["estado"]) .'</td>
					    </tr>';
		    } // foreach
			    echo '</tbody>
			</table>';
	    
	    } else {
	    	echo "No se han encontrado contratos asignados a este cliente!";
	    }
	    $a->close();
	    
    }





public function InternetContratos(){
    	$db = new dbConn();
    
	    $a = $db->query("SELECT * FROM contratos WHERE servicio='2' ORDER BY id desc LIMIT 25");
		    if($a->num_rows > 0)
		    {
		    	echo '<table class="table table-sm">
			  <thead>
			    <tr>
			      <th scope="col">Servicio</th>
			       <th scope="col">Cliente</th>
			      <th scope="col">Fecha Contrato</th>
			      <th scope="col">Termina Contrato</th>
			      <th scope="col">Dia de Pago</th>
			      <th scope="col">Velocidad</th>
			      <th scope="col">Estado</th>
			    </tr>
			  </thead>
			  <tbody>';
			  
		    	foreach ($a as $b) {
		    		if ($r = $db->select("servicio", "servicios", "WHERE id = ".$b["servicio"]."")) { $servicio = $r["servicio"];
				    } unset($r);

				    if ($x = $db->select("velocidad", "datos_internet", "WHERE cliente = ".$b["cliente"]."")) { $velocidad = $x["velocidad"];
				    } unset($x);
				    
				    if ($x = $db->select("cliente", "clientes", "WHERE id = ".$b["cliente"]."")) { $cliente = $x["cliente"];
				    } unset($x);
		    		 echo '<tr>
					      <th scope="row">'. $servicio .'</th>
					      <th scope="row">'. $cliente .'</th>
					      <td>'. $b["fechaInicio"] .'</td>
					      <td>'. $b["fechaFin"] .'</td>
					      <td>'. $b["fechaPago"] .'</td>
					      <td>'. $velocidad .' MB</td>
					      <td>'. Helpers::EstadoContrato($b["estado"]) .'</td>
					    </tr>';
		    } // foreach
			    echo '</tbody>
			</table>';
	    
	    } else {
	    	echo "No se han encontrado contratos aun!";
	    }
	    $a->close();
	    
    }


}

?>