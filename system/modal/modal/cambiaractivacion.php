<div class="modal" id="<? echo $_GET["modal"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
  <div class="modal-dialog modal-md modal-notify modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Nueva activaci&oacuten de contrato</h5>
      </div>
      <div class="modal-body">

<?php 
include_once 'application/common/mysqli.php';
include_once 'application/common/helpers.php';
$db = new dbConn();

if ($r = $db->select("servicio, estado, activacion", "contratos", "WHERE id = ".$_REQUEST["iden"]."")) { 
  ?>
<h4 class="text-center"><?php echo Helpers::TipoServicio($r["servicio"]) ?></h4>
<p class="text-center">Fecha Actual de activaci&oacuten:</p>
<div id="resultado" class="text-center">
  <?php echo $r["activacion"]; ?>
</div>
<form class="text-center border border-light p-2" id="form-change" name="form-change">
<input type="hidden" value="<?php echo $_REQUEST["iden"]; ?>" id="iden" name="iden">

<input placeholder="Seleccione una fecha" type="text" id="fecha" name="fecha" class="form-control datepicker">
    <label for="fecha">Fecha de activaci&oacuten</label>
    <button class="btn btn-info my-4 btn-block" type="submit" id="btn-change" name="btn-change">Cambiar Estado</button>


</form>
   <?
    } else {
        echo "- Error, no se ha encontrado ningun contrato!<br />";
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
