$(document).ready(function()
{

	$("body").on("click","#paginador",function(){
	var op = $(this).attr('op');
	var iden = $(this).attr('iden');
    $.post("application/src/routes.php", {op:op, iden:iden}, function(htmlexterno){
    $("#contenido_clientes").hide();
    $("#contenido_paginador").show();	
	$("#contenido_paginador").html(htmlexterno);
   	 });

	});



	$("body").on("click","#cliente",function(){
	var op = $(this).attr('op');
	var iden = $(this).attr('iden');
    $.post("application/src/routes.php", {op:op, iden:iden}, function(htmlexterno){
    $("#contenido_clientes").show();
    $("#contenido_paginador").hide();
	$("#contenido_clientes").html(htmlexterno);
   	 });
	});


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
     //window.location.href="?addcliente";
   	 });

	});



});