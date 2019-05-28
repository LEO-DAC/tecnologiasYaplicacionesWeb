<?php
	// Destruir todas las variables de sesión.
	$_SESSION = array();

	// Finalmente, destruir la sesión.
	session_destroy();
    // se redirecciona a la ventana del login
	$URL="index.php?action=login";
    echo "<script>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

?>