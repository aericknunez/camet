$(document).ready(function()
{

		$('.datepicker').pickadate({
		  weekdaysShort: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
		  weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
		  monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre',
		  'Noviembre', 'Diciembre'],
		  monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct',
		  'Nov', 'Dic'],
		  showMonthsShort: true,
		   formatSubmit: 'dd-mm-yyyy',
		    close: 'Cancel'
		})


		$('#btn-cable').click(function(e){ /// para el formulario
			e.preventDefault();
			$.ajax({
				url: "application/src/routes.php?op=9",
				method: "POST",
				data: $("#form-cable").serialize(),
				success: function(data){
					$("#caja_cable").html(data);
					$("#form-cable").trigger("reset");
				}
			})
	})
	

		
});
