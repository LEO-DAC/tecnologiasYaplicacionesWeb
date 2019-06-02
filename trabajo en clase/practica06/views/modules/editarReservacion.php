<form method="post">
	
	<?php
	//se crea una instancia para poder crear el formulario encargado de editar los datos
	//de reservación
	$editarReservacion = new MvcController();
	$editarReservacion -> editarReservacionController();
	$editarReservacion -> actualizarReservacionController();

	?>

</form>
