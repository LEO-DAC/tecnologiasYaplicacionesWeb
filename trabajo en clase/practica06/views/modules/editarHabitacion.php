
<form method="post">
	
	<?php
	//se crea una instancia para poder crear el formulario de editar habitacion
	// y poder actualizar los datos
	$editarUsuario = new MvcController();
	$editarUsuario -> editarHabitacionController();
	$editarUsuario -> actualizarHabitacionController();

	?>

</form>
