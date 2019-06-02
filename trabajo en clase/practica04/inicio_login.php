<?php
	session_start();//Inicio de sesion
	$estado = false;//Variable que representa el estado de la sesion ya se true para inicio o false para logout
	if(isset($_SESSION['usuario'])){//Varible $_SESSION contiene el valor que representara el inicio de sesion de usuario
		$estado=true;
	}
?>