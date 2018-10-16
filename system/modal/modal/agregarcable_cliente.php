<div class="modal" id="<? echo $_GET["modal"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Agregar Contrato de cable Nuevo</h5>
      </div>
      <div class="modal-body">

<?php 
include_once 'application/common/mysqli.php';
$db = new dbConn();

if ($r = $db->select("cliente", "clientes", "WHERE id = ".$_REQUEST["iden"]."")) { 
  ?>
  <div id="caja_cable"></div>
<h1 class="text-center">Contrato de cable<br><? echo $r["cliente"]; ?></h1><br><br>
<form class="text-center border border-light p-2" id="form-cable" name="form-cable">

<input type="hidden" id="client" name="client" class="form-control mb-4" value="<? echo $_REQUEST["iden"]; ?>">
<br><br><br>

        <div class="form-row mb-4">    
        <div class="col">
            <input placeholder="Seleccione una fecha" type="text" id="fechainicio" name="fechainicio" class="form-control datepicker">
            <label for="fechainicio">Fecha Inicio</label>
        </div>
        <div class="col">
            <input placeholder="Seleccione una fecha" type="text" id="fechafin" name="fechafin" class="form-control datepicker">
            <label for="fechafin">Fecha Fin</label>
        </div>
    </div>
     <div class="form-row mb-4">
        <div class="col">
            <input type="number" maxlength="2" minlength="2" id="fechacobro" name="fechacobro" class="form-control">
            <label for="fechacobro">Fecha de cobro</label>
        </div>
        <div class="col">
           <input type="text" id="cuota" name="cuota" class="form-control">
            <label for="cuota">Cuota Establecida</label>

        </div>
    </div>
    <button class="btn btn-info my-4 btn-block" type="submit" id="btn-cable" name="btn-cable">Agregar Contrato</button>


</form>
   <?
    } else {
        echo "- Error, no se ha encontrado ningun cliente!<br />";
    }
    unset($r);  



 ?>






      </div>
      <div class="modal-footer">

          <a href="?addcliente" class="btn blue-gradient btn-rounded">Regresar</a>
    
      </div>
    </div>
  </div>
</div>
