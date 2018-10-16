<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(isset($_GET["modal"])) { 
echo '<script>
		$(document).ready(function()
		{
		  $("#' . $_GET["modal"] . '").modal("show");
		});
	</script>';

	if($_GET["modal"] == "addc"){
	echo '<script type="text/javascript" src="assets/js/query/modal.addcliente.js"></script>';
	}
	if($_GET["modal"] == "addcable"){
	echo '<script type="text/javascript" src="assets/js/query/modal.cable.js"></script>';
	}
	if($_GET["modal"] == "addcablec"){
	echo '<script type="text/javascript" src="assets/js/query/modal.cable.cliente.js"></script>';
	}
	if($_GET["modal"] == "addinternet"){
	echo '<script type="text/javascript" src="assets/js/query/modal.internet.js"></script>';
	}	
	if($_GET["modal"] == "addinternetc"){
	echo '<script type="text/javascript" src="assets/js/query/modal.internet.cliente.js"></script>';
	}
}
elseif(isset($_GET["addcliente"])) {
echo '<script type="text/javascript" src="assets/js/query/addcliente.js"></script>';
} 
elseif(isset($_GET["findcliente"])) {
echo '<script type="text/javascript" src="assets/js/query/findcliente.js"></script>';
}
elseif(isset($_GET["cable"])) {
echo '<script type="text/javascript" src="assets/js/query/cable.js"></script>';
} 
elseif(isset($_GET["user"])) {
echo '<script type="text/javascript" src="assets/js/query/user.js"></script>';
} 
elseif(isset($_GET["upimages"])){ 

}
else{
/// lo que llevara index

}
	
?>

