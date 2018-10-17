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


		$('#btn-imprimir').click(function(e){ /// para el formulario
			e.preventDefault();
			$.ajax({
				url: "application/src/routes.php?op=16",
				method: "POST",
				data: $("#form-imprimir").serialize(),
				success: function(data){
					$("#ver_imprimir").html(data);
					$("#form-imprimir").trigger("reset");
				}
			})
	})

		
});
