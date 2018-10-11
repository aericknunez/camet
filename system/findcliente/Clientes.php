<?php 
class FindClientes{
	
	public function __construct(){

	}



	public function VerDetalle($iden){
    	$db = new dbConn();

		if ($r = $db->select("*", "clientes", "WHERE id = $iden")) { 
        echo "Nombre: " . $r["cliente"]. "<br />
        	Direccion: " . $r["dir_residencia"]. "<br />
        	DUI: " . $r["dui"]. "<br />";
	    } else {
	        echo "- Error desconocido!!<br />";
	    }
	    unset($r);     	

  
    }

    public function VerBusqueda($busqueda){
    	$db = new dbConn();

		    $a = $db->query("SELECT * FROM clientes WHERE cliente like '%" . $busqueda . "%' OR dui like '%" . $busqueda . "%' ORDER BY cliente LIMIT 0,15");
    
		    if($a->num_rows > 0){
		    	echo '<ul id="producto-list">';
		    	foreach ($a as $b) {
		    	echo '<a id="cliente" op="6" iden="'. $b["id"] .'"><li>'. $b["cliente"] .'</li></a>';
		    	}
		    	echo "</ul>";
		    }
		    
		    $a->close();    	

  
    }



}

?>