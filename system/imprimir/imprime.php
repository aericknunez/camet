<div id="areaImprimir">
<?php 

    $d = $db->selectGroup("cliente", "contratos", "WHERE fechaPago = '$dia' GROUP BY cliente");
    if ($d->num_rows > 0) {
        while($r = $d->fetch_assoc() ) {
           echo '<div class="col-xs-6 text-right">
            <h3><a href=" "><img alt="" src="logo.png"/> Logo aquí </a></h3>
            </div>
             <div class="panel-heading">
            <h4>Cliente: Erick Adonai Nunez Martinez</h4>
            </div>
            <div class="panel-body">Dirección: detalles más detalles</div>
            <hr />
             
            <pre>Detalles de cobro</pre>
            <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Descripci&oacuten</th>
                    <th scope="col">Precio</th>
                  </tr>
                </thead>
                <tbody>';
          // despues de agrupar busco las facturas
               $a = $db->query("SELECT * FROM contratos WHERE cliente = ".$r["cliente"]." and edo_pago = 0");
                foreach ($a as $b) {
                  echo '<tr>
                          <th scope="row">1</th>
                          <td>Television por cable</td>
                          <td>423</td>
                        </tr>';
                    //echo $b["cliente"] . "s: " . $b["servicio"] . "<br>"; 
                } $a->close();
            echo '<tr>
                     <td colspan="2" class="text-right">Subtotal</td>
                    <th scope="row">123</th>
                  </tr>
                  <tr>
                     <td colspan="2" class="text-right">Impuestos</td>
                    <th scope="row">123</th>
                  </tr>
                  <tr>
                     <td colspan="2" class="text-right"><strong>Total</strong></td>
                    <th scope="row"><strong>123</strong></th>
                  </tr>
                </tbody>
              </table>';
                
        } // while
                ?>

              </div>
                  <a onclick="printDiv('areaImprimir')" class="btn-floating btn-sm blue-gradient"><i class="fa fa-print" id="basic"></i></a>

                  <script>
                  function printDiv(nombreDiv) {
                       var contenido= document.getElementById(nombreDiv).innerHTML;
                       var contenidoOriginal= document.body.innerHTML;

                       document.body.innerHTML = contenido;

                       window.print();

                       document.body.innerHTML = contenidoOriginal;
                  } 
                  </script>
                <?
    }$d->close();
$db->close();
?>

<!-- <div id="areaImprimir">
<div class="col-xs-6 text-right">
<h3><a href=" "><img alt="" src="logo.png"/> Logo aquí </a></h3>
</div>
 <div class="panel-heading">
<h4>Cliente: Erick Adonai Nunez Martinez</h4>
</div>
<div class="panel-body">Dirección: detalles más detalles</div>
<hr />
 
<pre>Detalles de cobro</pre>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Descripci&oacuten</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Television por cable</td>
      <td>423</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Servicio de internet</td>
      <td>23</td>
    </tr>
    <tr>
       <td colspan="2" class="text-right">Subtotal</td>
      <th scope="row">123</th>
    </tr>
    <tr>
       <td colspan="2" class="text-right">Impuestos</td>
      <th scope="row">123</th>
    </tr>
    <tr>
       <td colspan="2" class="text-right"><strong>Total</strong></td>
      <th scope="row"><strong>123</strong></th>
    </tr>
  </tbody>
</table>
</div>

<a onclick="printDiv('areaImprimir')" class="btn-floating btn-sm blue-gradient"><i class="fa fa-print" id="basic"></i></a>

<script>
function printDiv(nombreDiv) {
     var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
} 
</script>
 -->