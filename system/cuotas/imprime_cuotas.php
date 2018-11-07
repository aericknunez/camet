<a onclick="printDiv('areaImprimir')" class="btn-floating btn-sm blue-gradient"><i class="fa fa-print" id="basic"></i></a>

<div id="areaImprimir">
<?php  
    if ($r = $db->select("cliente", "clientes", "WHERE id = ".$cliente."")) { 
        echo '<h2 class="text-center">Historial de pagos</h2>';
        echo '<h2 class="text-center">Cliente: '. $r["cliente"].'<br /></h2>';
    } unset($r); 

if($inicio != NULL and $fin != NULL){
$a = $db->query("SELECT * FROM control_facturas WHERE cliente = ".$cliente." and contrato = ".$contrato." and fin_cobroF BETWEEN ".$inicio." and ".$fin."");
} else {
$a = $db->query("SELECT * FROM control_facturas WHERE cliente = ".$cliente." and contrato = ".$contrato."");
}

      echo '<table class="table table-sm">
        <thead>
          <tr>
            <th scope="col">Contrato</th>
            <th scope="col">Total</th>
            <th scope="col">Dias Facturados</th>
            <th scope="col">Mes de Cobro</th>
            <th scope="col">Fecha de Pago</th>
          </tr>
        </thead>
        <tbody>';
    foreach ($a as $b) {
      echo '<tr>
              <th scope="row">'. Helpers::TipoServicio($b["contrato"]).'</th>
              <td>'. Helpers::Format($b["subtotal"] + ($b["subtotal"] * ($b["impuestos"]/100))) .'</td>
              <td>'. $b["inicio_cobro"] .' hasta '. $b["fin_cobro"] .'</td>
              <td>'. Fechas::MesEscrito($b["mes"]) .'</td>
              <td>'. $b["fecha_pagada"] .'</td>
            </tr>';
       
    }  echo '</tbody>
        </table>';
    $a->close();

?>
</div>


      <script>
      function printDiv(nombreDiv) {
           var contenido= document.getElementById(nombreDiv).innerHTML;
           var contenidoOriginal= document.body.innerHTML;

           document.body.innerHTML = contenido;

           window.print();

           document.body.innerHTML = contenidoOriginal;
      } 
      </script>

