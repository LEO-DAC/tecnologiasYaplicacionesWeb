<?php

class Conexion{
	public function conectar(){
			$link = new PDO("mysql:host=localhost;dbname=bd_tutorias","leo","Besekyspod3124755");
		return $link;

	}

}


//Verificar conexión correcta
//$a= new Conexion();
//$a -> conectar();

?>
