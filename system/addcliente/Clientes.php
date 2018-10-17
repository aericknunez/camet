<?php 
class Clientes{
	
	public function __construct(){

	}

	public function AddCliente($cliente,$dui,$dir,$dir2,$tel,$cel) {
			$db = new dbConn();

		$datos = array();
	    $datos["cliente"] = $this->Mayus($cliente);
	    $datos["dui"] = $dui;
	    $datos["dir_residencia"] = $this->MayusI($dir);
	    $datos["dir_cobro"] = $this->MayusI($dir2);
	    $datos["tel_casa"] = $tel;
	    $datos["tel_cel"] = $cel;
	    $datos["estado"] = "1";
	    if ($db->insert("clientes", $datos)) {
	       Alerts::Alerta("success","Agregado Correctamente","Usuario Agregado corectamente!");
	    } 


	}


	public function Mayus($cliente){
		return ucwords(strtolower($cliente));
	}

	public function MayusI($dir){
		return ucfirst(strtolower($dir));
	}



	public function VerClientes($paginax){
    	$db = new dbConn();

    	$ar = $db->query("SELECT * FROM clientes");
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
				 

    $a = $db->query("SELECT * FROM clientes ORDER BY id desc LIMIT ".$inicio.", ".$tamano_pagina.""); 
    	if($a->num_rows > 0){
    	echo '<table class="table table-sm">
			  <thead>
			    <tr>
			      <th scope="col">Cod</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Direcci&oacuten cobro</th>
			      <th scope="col">Tel&eacutefono</th>
			      <th scope="col">Ver</th>
			    </tr>
			  </thead>
			  <tbody>';

	    foreach ($a as $b) {
	echo '<tr>
	      <th scope="row">'. $b["id"] .'</th>
	      <td>'. $b["cliente"] .'</td>
	      <td>'. $b["dir_cobro"] .'</td>
	      <td>'. $b["tel_casa"] .'</td>
	      <td><a id="cliente" op="6" iden="'. $b["id"] .'" class="btn-floating btn-sm blue-gradient"><i class="fa fa-eye"></i></a></td>
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
            <a id="paginador" op="5" iden="'.($pagina - 1).'" class="page-link" aria-label="Previous">
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
            echo '<li class="page-item"><a id="paginador" op="5" iden="'.$i.'" class="page-link">'.$i.'</a></li>';
         }
      if ($pagina != $total_paginas)
         echo '<li class="page-item">
            <a id="paginador" op="5" iden="'.($pagina + 1).'" class="page-link" aria-label="Next">
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