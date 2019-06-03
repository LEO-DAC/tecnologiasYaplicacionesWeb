<form method="post">
	
	<?php
   //se crea una instancia para poder mostrar el formulario para editar y poder actualizar
	//los datos del cliente
	$editarAlumno = new MvcController();
	$editarAlumno->editarAlumnoController();
	$editarAlumno->actualizarAlumnoController();
	?>

</form>
