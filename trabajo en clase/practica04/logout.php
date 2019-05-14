<?php
	session_start();//Inicio de session
	session_destroy();//Cierre de session
	header("location:index.php");//Redireccion hacia el index(login)
?>