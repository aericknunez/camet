<?php 
include("application/common/Alerts.php");
include("application/common/mysqli.php");
$db = new dbConn();
?>
<style>
.contenedor3 {
  margin: 5px auto;
  width: 250px;
  border: 1px solid #99cccc;
  display: flex;
  align-items: center;
  justify-content: center;
}
.contenido3 {
  padding: 10px;
}
</style>
<h1>Usuarios</h1>
<!-- informacion de eliminado -->
<div id="userinfo"></div> 

    <table class="table table-striped table-responsive-md btn-table table-sm">
   <thead>
     <tr>
       <th>#</th>
       <th>Nombre</th>
       <th>Email</th>
       <th>Cuenta</th>
       <th>Eliminar</th>
     </tr>
   </thead>

   <tbody>
<?
//busqueda de usuarios
$a = $db->query("select id, username, email from login_members");
    foreach ($a as $b) {
$user=sha1($b["username"]);
if ($r = $db->select("nombre, tipo", "login_userdata", "where user = '$user' and td = ".$_SESSION['td']."")) { 
	if($r["tipo"] == "1") $tipo = "Super Admin";
	if($r["tipo"] == "2") $tipo = "Administrador";
	if($r["tipo"] == "3") $tipo = "Usuario";
  if($r["tipo"] == "4") $tipo = "Cocina";
  if($r["tipo"] == "5") $tipo = "Bar";
	echo '<tr>
       <th scope="row">'. $b["id"] . '</th>
       <td>'. $r["nombre"] . '</td>
       <td>'. $b["email"] . '</td>
       <td>'. $tipo . '</td>
       
       <td><a id="deluser" op="2" iden="'.$b["id"].'" username="'.$user.'" class="btn-floating btn-sm"><i class="fa fa-trash red-text"></i></a></td>
     </tr>';

    } 
    unset($r);    
    }
   $a->close();

    ?>
   </tbody>

</table>

<a href="?modal=registrar" class="btn btn-indigo btn-md">Nuevo Usuario<i class="fa fa-user ml-2"></i></a>





<div class="contenedor3">
  <div class="contenido3">
    Cambiar Password
<div id="caja_usuarios" class="color-red"></div>
<form name="form-pass-usuarios" method="post" id="form-pass-usuarios">
<input type="password" class="<? echo $var_formulario ?>" id="pass1" name="pass1" placeholder="Nuevo Password" required autocomplete="off"><br />
<input type="password" class="<? echo $var_formulario ?>" id="pass2" name="pass2" placeholder="Repetir Password" required autocomplete="off"><br />

<input name="form-pass-usuarios" type="submit" id="btn-pass-usuarios" value="Cambiar" class="btn btn-indigo btn-md">
</form> 
  </div>
</div>