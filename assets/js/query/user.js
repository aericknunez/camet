$(document).ready(function()
{

	$("body").on("click","#deluser",function(){
	var op = $(this).attr('op');
	var username = $(this).attr('username');
	var iden = $(this).attr('iden');
    $.post("application/src/routes.php", {op:op, iden:iden, username:username}, function(htmlexterno){
	$("#userinfo").html(htmlexterno);
   	 });

	});


	$('#btn-pass-usuarios').click(function(e){ /// para el formulario
		e.preventDefault();
		$.ajax({
			url: "application/src/routes.php?op=1",
			method: "POST",
			data: $("#form-pass-usuarios").serialize(),
			success: function(data){
				$("#caja_usuarios").html(data);
				$("#form-pass-usuarios").trigger("reset");
			}
		})
	})
   
	
});