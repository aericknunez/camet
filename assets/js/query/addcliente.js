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




});