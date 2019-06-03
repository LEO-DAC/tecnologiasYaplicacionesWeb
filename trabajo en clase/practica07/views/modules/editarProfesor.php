<form method="post">
	
	<?php
   //se crea una instancia para poder mostrar el formulario para editar y poder actualizar
	//los datos del cliente
	$editarProfesor = new MvcController();
	$editarProfesor->editarProfesorController();
	$editarProfesor->actualizarProfesorController();
	?>

</form>
