
<form method="post">
	
	<?php
   //se crea una instancia para poder mostrar el formulario para editar y poder actualizar
	//los datos del cliente
	$editarUsuario = new MvcController();
	$editarUsuario -> editarClienteController();
	$editarUsuario -> actualizarClienteController();

	?>

</form>
