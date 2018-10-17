<?php 
class Cobro{
	
	public function __construct(){

	}

	public function VerClientes($paginax){
    	$db = new dbConn();

    	$ar = $db->query("SELECT * FROM contratos WHERE edo_pago = 1");
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
				 

    $a = $db->query("SELECT * FROM contratos WHERE edo_pago = 1 ORDER BY cliente desc LIMIT ".$inicio.", ".$tamano_pagina.""); 

    	if($a->num_rows > 0){
    	echo '<table class="table table-sm">
			  <thead>
			    <tr>
			      <th scope="col">Cliente</th>
			      <th scope="col">Servicio</th>
			      <th scope="col">Fecha Contrato</th>
			      <th scope="col">Estado</th>
			      <th scope="col">Ver</th>
			    </tr>
			  </thead>
			  <tbody>';

	    foreach ($a as $b) {
	    if ($r = $db->select("cliente", "clientes", "WHERE id = ". $b["cliente"] ."")) { 
        $cliente = $r["cliente"];
    	} unset($r);	
	echo '<tr>
	      <th scope="row">'. $cliente .'</th>
	      <td>'. Helpers::TipoServicio($b["servicio"]) .'</td>
	      <td>'. $b["fechaInicio"] .'</td>
	      <td>'. Helpers::EstadoContrato($b["estado"]) .'</td>
	      <td><a id="cobrar" op="15" cliente="'. $b["cliente"] .'" contrato="'. $b["id"] .'" class="btn-floating btn-sm green"><i class="fa fa-money"></i></a></td>
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