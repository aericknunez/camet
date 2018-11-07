$(document).ready(function()
{
  
	$('#btn-extrapagos').click(function(e){ /// para el formulario
		e.preventDefault();
		$.ajax({
			url: "application/src/routes.php?op=20",
			method: "POST",
			data: $("#form-extrapagos").serialize(),
			success: function(data){
				$("#ver_total").html(data);
				$("#form-extrapagos").trigger("reset");
				//$("#contenido_clientes").hide();
				
			}
		})
	})

$("#form-extrapagos").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
if (e.which == 13) {
return false;
}
});
	

$("body").on("click","#cliente",function(){ // ver cliente
	Esconder();
	var op = $(this).attr('op');
	var iden = $(this).attr('iden');
    $.post("application/src/routes.php", {op:op, iden:iden}, function(htmlexterno){
    $("#contenido_clientes").show();
    $("#contenido_busqueda").hide();
	$("#contenido_clientes").html(htmlexterno);
   	 });

	});







});

	

	







		