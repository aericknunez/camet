<div class="modal" id="<? echo $_GET["modal"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Agregar Cliente</h5>
      </div>
      <div class="modal-body">



<div id="caja_addc"></div>

<form class="text-center border border-light p-5" id="form-addc" name="form-addc">

    <div class="form-row mb-4">
        <input type="text" id="nombre" name="nombre" class="form-control mb-4" placeholder="Nombre">
        <input type="text" id="dui" name="dui"  maxlength="10" minlength="9" class="form-control mb-4" placeholder="DUI">
        <div class="col">
            <!-- First name -->
            <input type="text" id="tel_casa" name="tel_cel" class="form-control" placeholder="Telefono">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" id="tel_cel" name="tel_casa" class="form-control" placeholder="Celular">
        </div>
    </div>

    <input type="text" id="dir_casa" name="dir_casa" class="form-control mb-4" placeholder="Direccion de Residencia">

    <input type="text" id="dir_cobro" name="dir_cobro" class="form-control mb-4" placeholder="Direccion de Cobro">

    <button class="btn btn-info my-4 btn-block" type="submit" id="btn-addc" name="btn-addc">Agregar Cliente</button>


</form>








      </div>
      <div class="modal-footer">

          <a href="?addcliente" class="btn blue-gradient btn-rounded">Regresar</a>
    
      </div>
    </div>
  </div>
</div>
