<?php 
class Conexion{
	
	public function __construct(){

	}

	public function Activar($iden,$activacion,$activacionF) {
			$db = new dbConn();

		    $cambio = array();
		    $cambio["activacion"] = $activacion;
		     $cambio["activacionF"] = $activacionF;
		    $cambio["estado"] = "2";
		    if ($db->update("contratos", $cambio, "WHERE id=$iden")) {
		       
		       Alerts::Alerta("success","Exito!","Contrato Activado corectamente!");
		    }
	}





	public function VerClientes($paginax){
    	$db = new dbConn();

		 $ar = $db->query("SELECT * FROM contratos");
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
				 

    $a = $db->query("SELECT * FROM contratos ORDER BY id desc LIMIT ".$inicio.", ".$tamano_pagina.""); 
    $numerox=0;
    	if($a->num_rows > 0){
    	$numerox++;
    	echo '<table class="table table-sm">
			  <thead>
			    <tr>
			      <th scope="col">Cliente</th>
			      <th scope="col">Servicio</th>
			      <th scope="col">Fecha Contrato</th>
			      <th scope="col">Estado</th>
			      <th scope="col">Activar</th>
			    </tr>
			  </thead>
			  <tbody>';

	    foreach ($a as $b) {
	echo '<tr>
	      <th scope="row">'. $b["cliente"] .'</th>
	      <td>'. Helpers::TipoServicio($b["servicio"]) .'</td>
	      <td>'. $b["fechaInicio"] .'</td>
	      <td>'. Helpers::EstadoContrato($b["estado"]) .'</td>
	      <td>';

			if($b["estado"] == 1) echo '<a id="conexion" op="13" iden="'. $b["id"] .'" class="btn-floating btn-sm blue-gradient"><i class="fa fa-check-circle"></i></a></td>';
			else echo '<a class="btn-floating btn-sm red"><i class="fa fa-ban"></i></a></td>';
	    echo '</tr>';	    
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
            <a id="paginador" op="12" iden="'.($pagina - 1).'" class="page-link" aria-label="Previous">
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
            echo '<li class="page-item"><a id="paginador" op="12" iden="'.$i.'" class="page-link">'.$i.'</a></li>';
         }
      if ($pagina != $total_paginas)
         echo '<li class="page-item">
            <a id="paginador" op="12" iden="'.($pagina + 1).'" class="page-link" aria-label="Next">
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