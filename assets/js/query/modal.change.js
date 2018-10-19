$(document).ready(function()
{
	$('#btn-change').click(function(e){ /// para el formulario
		e.preventDefault();
		$.ajax({
			url: "application/src/routes.php?op=17",
			method: "POST",
			data: $("#form-change").serialize(),
			success: function(data){
				$("#resultado").html(data);
				$("#form-change").trigger("reset");
			}
		})
	})
   
	
});