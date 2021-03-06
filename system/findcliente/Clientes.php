<?php 
class FindClientes{
	
	public function __construct(){

	}



	public function VerDetalle($iden){
    	$db = new dbConn();

		if ($r = $db->select("*", "clientes", "WHERE id = $iden")) { 

			echo '<h3 class="text-center">'. $r["cliente"].'</h3>';

			echo '<table class="table table-sm">
				  <thead>
				    <tr>
				      <th scope="col">DUI</th>
				      <th scope="col">'. $r["dui"].'</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">Tel&eacutefonos</th>
				      <td>'. $r["tel_casa"].' || '. $r["tel_cel"].'</td>
				    </tr>
				    <tr>
				      <th scope="row">Direcci&oacuten de residencia</th>
				      <td>'. $r["dir_residencia"].'</td>
				    </tr>
				    <tr>
				      <th scope="row">Direcci&oacuten de Cobro</th>
				      <td>'. $r["dir_cobro"].'</td>
				    </tr>
				  </tbody>
				</table>';

			
			echo '<a href="'.$_SERVER['HTTP_REFERER'].'" class="btn btn-outline-danger btn-rounded waves-effect">Regresar</a>';

			echo '<a href="?modal=addcablec&iden='.$iden.'" class="btn btn-outline-info btn-rounded waves-effect">Agregar contrato cable</a>';
			echo '<a href="?modal=addinternetc&iden='.$iden.'" class="btn btn-outline-info btn-rounded waves-effect">Agregar contrato internet</a>';

	    } else {
	        echo "- Error desconocido!!<br />";
	    }
	    unset($r);     	

  
    }

    public function VerBusqueda($busqueda){
    	$db = new dbConn();

		    $a = $db->query("SELECT * FROM clientes WHERE cliente like '%" . $busqueda . "%' OR dui like '%" . $busqueda . "%' ORDER BY id LIMIT 0,25");
    
		    if($a->num_rows > 0){
		    echo '<table class="table table-sm">
			  <thead>
			    <tr>
			      <th scope="col">Cod</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Direcci&oacuten</th>
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

  
    }



}

?>