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
}
elseif(isset($_GET["addcliente"])) {
echo '<script type="text/javascript" src="assets/js/query/addcliente.js"></script>';
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

