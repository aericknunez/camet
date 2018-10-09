<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(isset($_GET["modal"])) { ?>
<script>
$(document).ready(function()
{
  $("#<? echo $_GET["modal"]; ?>").modal("show");
});
</script>
<? }
elseif(isset($_GET["user"])) {
echo '<script type="text/javascript" src="assets/js/query/user.js"></script>';
} 
elseif(isset($_GET["upimages"])){ 

}
elseif(isset($_GET["content"])) {

}

else{
/// lo que llevara index

}
	
?>

