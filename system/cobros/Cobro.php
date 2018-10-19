<?php 
class Cobro{
	
	public function __construct(){

	}

	public function RealizarCobro($cliente,$contrato,$iden){
    	$db = new dbConn();

    	    $cambio = array();
		    $cambio["fecha_pagada"] = date("d-m-Y");
		    $cambio["fecha_pagadaF"] = Fechas::Format(date("d-m-Y"));
		    $cambio["estado"] = "0";
		    if ($db->update("control_facturas", $cambio, "WHERE cliente = '$cliente' and contrato ='$contrato' and id ='$iden' and estado = '1'")) {

			    Alerts::Alerta("success","Cobrado Correctamente","Se ha cobrado corractamente la cuota!");
		    } else {
		    	Alerts::Alerta("danger","Error!","Ha ocurrido un error!");
		    }
    }


	public function VerClientes($paginax){
    	$db = new dbConn();

    	$ar = $db->query("SELECT * FROM control_facturas WHERE estado = 1");
		$num_total_registros = $ar->num_rows; $ar->close();
		
		$tamano_pagina = 25;

			$pagina = $paginax;
			if (!$pagina) {
			   $inicio = 0;
			   $pagina = 1;
			}
			else {
			   $inicio = ($pagina - 1) * $tamano_pagina;
			}
			$total_paginas = ceil($num_total_registros / $tamano_pagina);
				 

    $a = $db->query("SELECT * FROM control_facturas WHERE estado = 1 ORDER BY cliente desc LIMIT ".$inicio.", ".$tamano_pagina.""); 

    	if($a->num_rows > 0){
    	echo '<table class="table table-sm">
			  <thead>
			    <tr>
			      <th scope="col">Cliente</th>
			      <th scope="col">Servicio</th>
			      <th scope="col">Mes</th>
			      <th scope="col">Estado</th>
			      <th scope="col">SubTotal</th>
			      <th scope="col">Impuesto</th>
			      <th scope="col">Total</th>
			      <th scope="col">Cobrar</th>
			    </tr>
			  </thead>
			  <tbody>';

	    foreach ($a as $b) {
	    if ($r = $db->select("cliente", "clientes", "WHERE id = ". $b["cliente"] ."")) { 
        $cliente = $r["cliente"];
    	} unset($r);
    	if ($x = $db->select("servicio, estado", "contratos", "WHERE id = ". $b["contrato"] ."")) { $servicio = $x["servicio"]; $estado = $x["estado"];
           	} unset($x);	
	echo '<tr>
	      <th scope="row">'. $cliente .'</th>
	      <td>'. Helpers::TipoServicio($servicio) .'</td>
	      <td>'. Fechas::MesEscrito($b["mes"]) .'</td>
	      <td>'. Helpers::EstadoContrato($estado) .'</td>
	      <td>'. Helpers::Format($b["subtotal"]) .'</td>
	      <td>'. Helpers::Format($b["subtotal"] * ($b["impuestos"]/100)) .'</td>
	   <td>'. Helpers::Format($b["subtotal"] + ($b["subtotal"] * ($b["impuestos"]/100))) .'</td>
	      <td><a id="cobrar" op="15" cliente="'. $b["cliente"] .'" contrato="'. $b["contrato"] .'" iden="'. $b["id"] .'" class="btn-floating btn-sm green"><i class="fa fa-money"></i></a></td>
	      </tr>';	    
    }
	    echo '</tbody>
			</table>';
		} else {
		echo 'No se han encontrado registros!';	
		}	
		$a->close();



//// paginacion 
	 echo '<nav aria-label="pagination example">
    <ul class="pagination pagination-circle pg-blue mb-0">';

	if ($total_paginas > 1) {
   	if ($pagina != 1)
   	echo '<li class="page-item">
            <a id="cobros" op="14" iden="'.($pagina - 1).'" class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>';
      for ($i=1;$i<=$total_paginas;$i++) {
         if ($pagina == $i)
            //si muestro el índice de la página actual, no coloco enlace
            echo $pagina;
         else
            //si el índice no corresponde con la página mostrada actualmente,
            //coloco el enlace para ir a esa página
            echo '<li class="page-item"><a id="cobros" op="14" iden="'.$i.'" class="page-link">'.$i.'</a></li>';
         }
      if ($pagina != $total_paginas)
         echo '<li class="page-item">
            <a id="cobros" op="14" iden="'.($pagina + 1).'" class="page-link" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>';
		}
	////////////////////
     echo '</ul> </nav>';    
  
    }



}

?>