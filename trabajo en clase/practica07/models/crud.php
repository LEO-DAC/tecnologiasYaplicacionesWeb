<?php
require_once "conexion.php";

class Datos extends Conexion{
	//funcion para insertar datos de usuario a la base de datos	
	public function registrarAlumnoModel($datosModel){
		$stmt = Conexion::conectar()->prepare("INSERT INTO alumno (matricula,nombres,apellidos) VALUES (:matricula,:nombres,:apellidos)");

		$stmt->bindParam(":matricula",$datosModel["matricula"],PDO::PARAM_INT);
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
		$stmt = Conexion::conectar()->prepare("INSERT INTO profesor (nombres,apellidos) VALUES (:nombres,:apellidos)");
		$stmt->bindParam(":nombres",  $datosModel["nombres"],PDO::PARAM_STR);
		$stmt->bindParam(":apellidos",$datosModel["apellidos"],PDO::PARAM_STR);

		if($stmt->execute()){ //se valida si la inserción fué exitosa
			return "success";//en caso de ser así, se retorna una cadena con el mesnaje success	
		}else{
			return "error"; //de lo contrario se retorna la cadena errror
		}

		$stmt->close(); //se cierra el flujo de la conexión

	}


	//funcion para insertar datos de materia a la base de datos	
	public function registrarMateriaModel($datosModel){
		$stmt = Conexion::conectar()->prepare("INSERT INTO materia (clave,carrera,id_profesor) VALUES (:clave,:carrera,:id_profesor)");
		$stmt->bindParam(":clave",  $datosModel["clave"],PDO::PARAM_STR);
		$stmt->bindParam(":carrera",$datosModel["carrera"],PDO::PARAM_STR);
		$stmt->bindParam(":id_profesor",$datosModel["id_profesor"],PDO::PARAM_INT);

		if($stmt->execute()){ //se valida si la inserción fué exitosa
			return "success";//en caso de ser así, se retorna una cadena con el mesnaje success	
		}else{
			return "error"; //de lo contrario se retorna la cadena errror
		}

		$stmt->close(); //se cierra el flujo de la conexión

	}


	public function vistaProfesoresModel(){

		$stmt = Datos::conectar()->prepare("SELECT * FROM profesor ");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

}
?>