$(document).ready(function()
{
	$('#btn-addc').click(function(e){ /// para el formulario
		e.preventDefault();
		$.ajax({
			url: "application/src/routes.php?op=4",
			method: "POST",
			data: $("#form-addc").serialize(),
			success: function(data){
				$("#caja_addc").html(data);
				$("#form-addc").trigger("reset");
			}
		})
	})
   
	
});