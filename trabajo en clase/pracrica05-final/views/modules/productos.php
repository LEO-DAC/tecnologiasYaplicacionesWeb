<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>PRODUCTOS</h1>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>nombre</th>
				<th>precio</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaProducto = new MvcController();
			$vistaProducto -> vistaProductosController();
			$vistaProducto-> borrarProductoController();

			?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>

