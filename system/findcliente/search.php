<?php
include_once '../../application/includes/variables_db.php';
include_once '../../application/includes/db_connect.php';
include_once '../../application/includes/functions.php';
sec_session_start();

include_once '../../application/common/Alerts.php';
$alert = new Alerts;
include_once '../../application/common/mysqli.php';
$db = new dbConn();

if(!empty($_POST["keyword"])) {
    $a = $db->query("SELECT * FROM clientes WHERE cliente like '%" . $_POST["keyword"] . "%' OR dui like '%" . $_POST["keyword"] . "%' ORDER BY cliente LIMIT 0,15");
    
    if($a->num_rows > 0){
    	echo '<ul id="producto-list">';
    	foreach ($a as $b) {
    	echo '<a id="cliente" op="6" iden="'. $b["id"] .'"><li>'. $b["cliente"] .'</li></a>';
    	}
    	echo "</ul>";
    }
    
    $a->close();

}
