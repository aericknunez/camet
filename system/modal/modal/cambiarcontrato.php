<div class="modal" id="<? echo $_GET["modal"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Cambiar estado de contrato</h5>
      </div>
      <div class="modal-body">

<?php 
include_once 'application/common/mysqli.php';
include_once 'application/common/helpers.php';
$db = new dbConn();

if ($r = $db->select("servicio, estado", "contratos", "WHERE id = ".$_REQUEST["iden"]."")) { 
  ?>
<h4 class="text-center"><?php echo Helpers::TipoServicio($r["servicio"]) ?></h4>
<p class="text-center">Estado actual:</p>
<div id="resultado">
  <?php echo Helpers::EstadoContrato($r["estado"]) ?>
</div>
<form class="text-center border border-light p-2" id="form-change" name="form-change">
<input type="hidden" value="<?php echo $_REQUEST["iden"]; ?>" id="iden" name="iden">
<select class="browser-default custom-select" id="cambio_estado" name="cambio_estado">
  <option selected value="0">Seleccione Opci&oacuten</option>
  <option value="1">Pendiente</option>
  <option value="2">Activo</option>
  <option value="3">Suspendido</option>
  <option value="4">Cancelado</option>
  <option value="3">Pausado</option>
</select>

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
