<style>
    body { 
        background-color: black; /* La página de fondo será negra */
        color: 000; 
    	}
</style>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if($_REQUEST["modal"]=="registrar") include("system/modal/modal/registrar.php");

if($_REQUEST["modal"]=="register_success") include("system/modal/modal/register_success.php");

if($_REQUEST["modal"]=="addc") include("system/modal/modal/agregarcliente.php");

if($_REQUEST["modal"]=="addcable") include("system/modal/modal/agregarcable.php");

if($_REQUEST["modal"]=="addcablec") include("system/modal/modal/agregarcable_cliente.php");

if($_REQUEST["modal"]=="addinternet") include("system/modal/modal/agregarinternet.php");

if($_REQUEST["modal"]=="addinternetc") include("system/modal/modal/agregarinternet_cliente.php");
