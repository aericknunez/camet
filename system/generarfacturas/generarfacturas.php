<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/mysqli.php';
$db = new dbConn();

    $a = $db->query("SELECT id,fecha FROM control_generador_up WHERE estado = '1'");
    foreach ($a as $b) {
        //echo "ID [" . $b["id"] . "] - cod [" . $b["cod"] . "] - nombre [" . $b["categoria"] . "]<br />";
        echo '<a href="application/src/routes.php?op=18&id='. $b["id"] .'&iden='. $b["fecha"] .'" class="btn btn-primary"><i class="fa fa-magic mr-1"></i> '. $b["fecha"] .'</a>
';
    }
    if($a->num_rows != 0){
      echo '<p class="alert alert-danger">Se encontraron '. $a->num_rows . ' dias que no se generaron facturas, haga clic en cada uno de los enlaces anteriores hasta que ya no encuentre ninguno</p>';   
    } else {
      echo '<p class="alert alert-success">No se han encontrado dias pendientes de facturaci&oacuten</p>';   
    }

   
    
    $a->close();
?>
