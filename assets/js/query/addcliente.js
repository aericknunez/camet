$(document).ready(function()
{

	$("body").on("click","#paginador",function(){
	var op = $(this).attr('op');
	var iden = $(this).attr('iden');
    $.post("application/src/routes.php", {op:op, iden:iden}, function(htmlexterno){
	$("#contenido_usuarios").html(htmlexterno);
   	 });

	});

		
});