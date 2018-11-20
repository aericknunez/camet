$(document).ready(function()
{
  
	$('#btn-find-cliente').click(function(e){ /// para el formulario
		e.preventDefault();
		$.ajax({
			url: "application/src/routes.php?op=7",
			method: "POST",
			data: $("#form-find-cliente").serialize(),
			success: function(data){
				$("#suggesstion-box").hide();
				$("#contenido_busqueda").show();
				$("#contenido_busqueda").html(data);
				$("#form-find-cliente").trigger("reset");
				$("#contenido_clientes").hide();
				
			}
		})
	})

$("#form-find-cliente").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
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



$("#search-box").keyup(function(){ /// para la caja de busqueda
		$.ajax({
		type: "POST",
		url: "system/findcliente/search.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(assets/img/LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
	function Esconder(val) {
	$("#search-box").val(val);
	$("#suggesstion-box").hide();
	}





	$("body").on("click","#cobrar",function(){
	var op = $(this).attr('op');
	var cliente = $(this).attr('cliente');
	var contrato = $(this).attr('contrato');
	var iden = $(this).attr('iden');
    $.post("application/src/routes.php", {op:op, cliente:cliente, contrato:contrato, iden:iden}, function(htmlexterno){
	$("#contenido_clientes").show();
    $("#contenido_paginador").hide();
	//$("#contenido_clientes").html(htmlexterno);
	$("#contenido_clientes").load('application/src/routes.php?op=6&iden='+cliente);

   	 });

	});




});

	

	







		