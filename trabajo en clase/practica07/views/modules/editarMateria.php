<form method="post">
	
	<?php
   //se crea una instancia para poder mostrar el formulario para editar y poder actualizar
	//los datos del cliente
	$editarMateria = new MvcController();
	$editarMateria->editarMateriaController();
	$editarMateria->actualizarMateriaController();
	?>

</form>

