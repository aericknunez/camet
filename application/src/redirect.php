<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(isset($_GET["modal"])) include("system/modal/modal.php");

elseif(isset($_GET["user"])) include("system/user/user.php");

elseif(isset($_GET["upimages"])) include("system/upimages/upimages.php");

elseif(isset($_GET["contenido"])) include("system/user/user.php");

else{
include("system/index/inicio.php");	
}
	
?>