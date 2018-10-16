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

		    	$nregistro = 25;
				$pagina = '';
				if($paginax != NULL)
				{
				 $pagina = $paginax;
				}
				else
				{
				 $pagina = 1;
				}
				 
				$start = ($pagina-1)*$nregistro;
				 

    $a = $db->query("SELECT * FROM contratos ORDER BY id desc LIMIT ".$start.", ".$nregistro.""); 
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


	    $ar = $db->query("SELECT * FROM contratos");
		$totalreg = $ar->num_rows; $ar->close();
		$totalpag = ceil($totalreg/$nregistro);
    	$start_loop = $pagina;
    	$diferencia = $total_pages - $pagina;
    	
    if($diferencia <= 5)
    {
     $start_loop = $totalpag - 1;
    }
    $end_loop = $start_loop + 1;
    if($pagina > 1)
    {
     echo '<li class="page-item"><a id="paginador" op="12" iden="1" class="page-link">Primera</a></li>';
     echo '<li class="page-item">
            <a id="paginador" op="12" iden="'.($pagina - 1).'" class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>';
    }
    for($i=$start_loop; $i<=$end_loop; $i++)
    {     
     echo '<li class="page-item"><a id="paginador" op="12" iden="'.$i.'" class="page-link">'.$i.'</a></li>';
    }
    if($pagina <= $end_loop)
    {
    	echo '<li class="page-item">
            <a id="paginador" op="12" iden="'.($pagina + 1).'" class="page-link" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>';
        echo '<li class="page-item"><a id="paginador" op="12" iden="'.$totalpag.'" class="page-link">Ultima</a></li>';
    }

    echo '</ul> </nav>';    

  
    }



}

?>