<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Encrypt.php';

$x=Encrypt::Encrypt("Erick Adonai Nunez Martinez");

echo $x . "<br>";
echo Encrypt::Decrypt($x);
?>
