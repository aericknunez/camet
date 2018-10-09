<?php 
include_once 'application/includes/variables_db.php';
include_once 'application/includes/db_connect.php';
include_once 'application/includes/functions.php';
sec_session_start();


if (login_check($mysqli) == true) {
    include_once 'catalog/index.php';
} else {
    include_once 'catalog/login.php';
}

?>