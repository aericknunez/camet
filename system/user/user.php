<?php 
include_once 'application/common/Alerts.php';
include_once 'application/common/mysqli.php';
include_once 'system/user/Usuarios.php';

$db = new dbConn();
?>
<h1>Usuarios</h1>
<a href="?modal=registrar" class="btn-floating btn-sm blue-gradient"><i class="fa fa-user-plus"></i></a>
<!-- informacion de eliminado -->
<div id="userinfo">
  <?php 
   Usuarios::VerUsuarios();
   ?>
</div> 
    


  <div class="row justify-content-md-center">
    <div class="col-12 col-md-auto">
      
      Cambiar Password
      <div id="caja_usuarios" class="alert-danger"></div>
      <form name="form-pass-usuarios" method="post" id="form-pass-usuarios">
      <input type="password" class="my-1 form-control" id="pass1" name="pass1" placeholder="Nuevo Password" required autocomplete="off">
      <input type="password" class="my-1 form-control" id="pass2" name="pass2" placeholder="Repetir Password" required autocomplete="off">
      <input name="form-pass-usuarios" type="submit" id="btn-pass-usuarios" value="Cambiar" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-1 waves-effect">
      </form> 

    </div>
  </div>
