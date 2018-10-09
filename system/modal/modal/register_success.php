<?php 
 if(isset($_POST["env"])){

if($_POST["nombre"] and $_POST["tipo"]){
$user=sha1($_SESSION['newuser']);

include("application/common/mysqli.php");
$db = new dbConn();

$datos = array();
    $datos["nombre"] = $_POST["nombre"];
    $datos["tipo"] = $_POST["tipo"];
    $datos["user"] = $user;
    $datos["tkn"] = $user;
    $datos["avatar"] = "1.png";
    $datos["td"] = $_SESSION['td'];
    if ($db->insert("login_userdata", $datos)) {
        $i = $db->insert_id();

        unset($_SESSION['newuser']);
        header("location: ?user");
    } 
$db->close();
  
  }

} ?> 
  <!-- Modal para modificar la orden -->
<div class="modal" id="<? echo $_GET["modal"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Ya casi terminamos...</h5>
      </div>
      <div class="modal-body">


<!-- Default form contact -->
<form name="form1" method="post" action="?modal=register_success" id="formulario">

    <label for="nombre" class="grey-text">Nombre</label>
    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required="yes">
 
    <input type="hidden" id="env" name="env">
       
    <br>

<label>Tipo de Cuenta</label>
<select id="tipo" name="tipo" class="browser-default form-control" required="yes">
    <option value="" disabled selected>Elija una Opcion</option>
    <option value="2">Administrador</option>
    <option value="3">Usuario</option>
    <option value="4">Cocina</option>
    <option value="5">Cocina</option>
</select>
    <br>
  
    <div class="text-center mt-4">
        <button class="btn btn-outline-warning" type="submit">Terminar<i class="fa fa-paper-plane-o ml-2"></i></button>
    </div>
</form>
<!-- Default form contact -->

      </div>
    </div>
  </div>
</div>
<!-- ./  Modal -->