<style>
    body { 
        background-color: black; /* La página de fondo será negra */
        color: 000; 
    	}
</style>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if($_REQUEST["modal"]=="registrar") include_once 'system/modal/modal/registrar.php';

if($_REQUEST["modal"]=="register_success") include_once 'system/modal/modal/register_success.php';

if($_REQUEST["modal"]=="addc") include_once 'system/modal/modal/agregarcliente.php';

if($_REQUEST["modal"]=="addcable") include_once 'system/modal/modal/agregarcable.php';

if($_REQUEST["modal"]=="addcablec") include_once 'system/modal/modal/agregarcable_cliente.php';

if($_REQUEST["modal"]=="addinternet") include_once 'system/modal/modal/agregarinternet.php';

if($_REQUEST["modal"]=="addinternetc") include_once 'system/modal/modal/agregarinternet_cliente.php';

if($_REQUEST["modal"]=="change") include_once 'system/modal/modal/cambiarcontrato.php';

