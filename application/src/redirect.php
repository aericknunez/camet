<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(isset($_GET["modal"])) include_once 'system/modal/modal.php';

elseif(isset($_GET["addcliente"])) include_once 'system/addcliente/addcliente.php';

elseif(isset($_GET["findcliente"])) include_once 'system/findcliente/findcliente.php';

elseif(isset($_GET["cable"])) include_once 'system/cable/cable.php';

elseif(isset($_GET["internet"])) include_once 'system/internet/internet.php';

elseif(isset($_GET["conexion"])) include_once 'system/conexion/conexion.php';

elseif(isset($_GET["cobros"])) include_once 'system/cobros/cobros.php';

elseif(isset($_GET["user"])) include_once 'system/user/user.php';

elseif(isset($_GET["upimages"])) include_once 'system/upimages/upimages.php';

else{
include_once 'system/index/inicio.php';	
}
	
?>