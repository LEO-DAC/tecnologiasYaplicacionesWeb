<h1>venta de productos</h1>

<?php

$registro = new MvcController();

echo "<center>";
$registro -> vistaVentaProductosController();
echo "</center>";


if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
