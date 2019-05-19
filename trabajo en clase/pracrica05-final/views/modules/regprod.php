<h1>REGISTRO DE PRODUCTO</h1>

<form method="post">
   <input type="text" placeholder="nombre" name="nombreRegistro" required>
   <input type="number" placeholder="precio" name="precioRegistro" required>
   <input type="submit" value="Enviar">
</form>

<?php

$registro = new MvcController();
$registro -> registroProductoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
