<div class="modal" id="<? echo $_GET["modal"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Agregar Contrato de cable Nuevo</h5>
      </div>
      <div class="modal-body">



<div id="caja_cable"></div>

<form class="text-center border border-light p-2" id="form-cable" name="form-cable">

    <div class="form-row mb-2">
        <input type="text" id="dui" name="dui" maxlength="10" minlength="9" class="form-control mb-2" placeholder="DUI">
         <input type="text" id="nombre" name="nombre" class="form-control mb-4" placeholder="Nombre">
        <div class="col">
<!-- First name -->
            <input type="text" id="tel_casa" name="tel_cel" class="form-control" placeholder="Telefono">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" id="tel_cel" name="tel_casa" class="form-control" placeholder="Celular">
        </div>
    </div>

    <input type="text" id="dir_casa" name="dir_casa" class="form-control mb-2" placeholder="Direccion de Residencia">

    <input type="text" id="dir_cobro" name="dir_cobro" class="form-control mb-4" placeholder="Direccion de Cobro">


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
            <input placeholder="04" type="number" maxlength="2" minlength="2" id="fechacobro" name="fechacobro" class="form-control">
            <label for="fechacobro">Fecha de cobro</label>
        </div>
        <div class="col">
           <input placeholder="15.00" type="text" id="cuota" name="cuota" class="form-control">
            <label for="cuota">Cuota Establecida</label>

        </div>
    </div>
    <button class="btn btn-info my-4 btn-block" type="submit" id="btn-cable" name="btn-cable">Agregar Contrato</button>


</form>








      </div>
      <div class="modal-footer">

          <a href="?cable" class="btn blue-gradient btn-rounded">Regresar</a>
    
      </div>
    </div>
  </div>
</div>
