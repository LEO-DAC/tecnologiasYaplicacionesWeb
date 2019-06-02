<?php
require_once "conexion.php";

class Datos extends Conexion{
	//funcion para insertar datos de usuario a la base de datos	
	public function registrarAlumnoModel($datosModel){
		$stmt = Conexion::conectar()->prepare("INSERT INTO 'alumno' (nombres,apellidos) VALUES (:nombres,:apellidos)");
		$stmt->bindParam(":nombres",  $datosModel["nombres"],PDO::PARAM_STR);
		$stmt->bindParam(":apellidos",$datosModel["apellidos"],PDO::PARAM_STR);

		if($stmt->execute()){ //se valida si la inserción fué exitosa
			return "success";//en caso de ser así, se retorna una cadena con el mesnaje success	
		}else{
			return "error"; //de lo contrario se retorna la cadena errror
		}

		$stmt->close(); //se cierra el flujo de la conexión

	}


	//funcion para insertar datos de profesor a la base de datos	
	public function registrarProfesorModel($datosModel){
		$stmt = Conexion::conectar()->prepare("INSERT INTO 'profesor' (nombres,apellidos) VALUES (:nombres,:apellidos)");
		$stmt->bindParam(":nombres",  $datosModel["nombres"],PDO::PARAM_STR);
		$stmt->bindParam(":apellidos",$datosModel["apellidos"],PDO::PARAM_STR);

		if($stmt->execute()){ //se valida si la inserción fué exitosa
			return "success";//en caso de ser así, se retorna una cadena con el mesnaje success	
		}else{
			return "error"; //de lo contrario se retorna la cadena errror
		}

		$stmt->close(); //se cierra el flujo de la conexión

	}


}
?>