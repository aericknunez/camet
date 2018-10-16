<?php 
class ContratoCable{
	
	public function __construct(){

	}



	public function AddContrato($dui,$cliente,$tel,$cel,$dir,$dir2,$fi,$ff,$fif,$fff,$fc,$cuota){
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
	       $this->AddCont($client,$fi,$ff,$fif,$fff,$fc,$cuota);
	    } else {

	    Alerts::Alerta("warning","Error","Ha ocurrido un error!");
	
	   }

  	
    }

	public function AddContratoCliente($client,$fi,$ff,$fif,$fff,$fc,$cuota){
    	$db = new dbConn();
	       $this->AddCont($client,$fi,$ff,$fif,$fff,$fc,$cuota);
    }


	public function AddCont($client,$fi,$ff,$fif,$fff,$fc,$cuota) {
		$db = new dbConn();

		$datos = array();
	    $datos["cliente"] = $client;
	    $datos["servicio"] = "1";
	    $datos["fechaInicio"] = $fi;
	    $datos["fechaFin"] = $ff;
	    $datos["fechaInicioF"] = $fif;
	    $datos["fechaFinF"] = $fff;
	    $datos["fechaPago"] = $fc;
	    $datos["estado"] = "1";
	    if ($db->insert("contratos", $datos)) {
	    $contract = $db->insert_id();
	    $this->AddCuota($client,$contract,$cuota,$fi,$fif);
		  Alerts::Alerta("success","Agregado Correctamente","Contrato Agregado corectamente!");
	    } 
	}

	    public function AddCuota($client,$contract,$cuota,$fi,$fif) {
		$db = new dbConn();

		$datos = array();
	    $datos["cliente"] = $client;
	    $datos["servicio"] = "1";
	    $datos["contrato"] = $contract;
	    $datos["cuota"] = $cuota;
	    $datos["fecha"] = $fi;
	    $datos["fechaF"] = $fif;
	    $db->insert("cuota_establecida", $datos); 
	}


    public function VerContratos($user){
    	$db = new dbConn();
    
	    $a = $db->query("SELECT * FROM contratos WHERE cliente='$user'");
		    if($a->num_rows > 0)
		    {
		    	echo '<h3><br>Contratos asignados</h3>';
		    	echo '<table class="table table-sm">
			  <thead>
			    <tr>
			      <th scope="col">Servicio</th>
			      <th scope="col">Fecha Contrato</th>
			      <th scope="col">Termina Contrato</th>
			      <th scope="col">Dia de Pago</th>
			      <th scope="col">Estado</th>
			    </tr>
			  </thead>
			  <tbody>';
			  
		    	foreach ($a as $b) {
		    		if ($r = $db->select("servicio", "servicios", "WHERE id = ".$b["servicio"]."")) { $servicio = $r["servicio"];
				    } unset($r);

		    		 echo '<tr>
					      <th scope="row">'. $servicio .'</th>
					      <td>'. $b["fechaInicio"] .'</td>
					      <td>'. $b["fechaFin"] .'</td>
					      <td>'. $b["fechaPago"] .'</td>
					      <td>'. Helpers::EstadoContrato($b["estado"]) .'</td>
					    </tr>';
		    } // foreach
			    echo '</tbody>
			</table>';
	    
	    } else {
	    	echo "<br>No se han encontrado contratos asignados a este cliente!";
	    }
	    $a->close();
	    
    }





public function CableContratos(){
    	$db = new dbConn();
    
	    $a = $db->query("SELECT * FROM contratos WHERE servicio = 1 ORDER BY id desc LIMIT 25");
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
			      <th scope="col">Estado</th>
			    </tr>
			  </thead>
			  <tbody>';
			  
		    	foreach ($a as $b) {
		    		if ($r = $db->select("servicio", "servicios", "WHERE id = ".$b["servicio"]."")) { $servicio = $r["servicio"];
				    } unset($r);

				    if ($x = $db->select("cliente", "clientes", "WHERE id = ".$b["cliente"]."")) { $cliente = $x["cliente"];
				    } unset($x);
				    
		    		 echo '<tr>
					      <th scope="row">'. $servicio .'</th>
					      <th scope="row">'. $cliente .'</th>
					      <td>'. $b["fechaInicio"] .'</td>
					      <td>'. $b["fechaFin"] .'</td>
					      <td>'. $b["fechaPago"] .'</td>
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