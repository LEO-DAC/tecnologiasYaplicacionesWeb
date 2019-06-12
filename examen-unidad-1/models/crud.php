<?php
	
	require_once "conexion.php";

	class Datos extends Conexion{

		public function registroAlumnoModel($datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO alumnos (matricula,nombres,apellidos,carrera,id_anio_ingreso,id_grupo) VALUES (:matricula,:nombres,:apellidos,:carrera,:id_anio_ingreso,:id_grupo)");	
			// se asignan los parametros para ser pasados a el insert
			$stmt->bindParam(":matricula", $datos["matricula"], PDO::PARAM_INT);
			$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
			$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
			$stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
			$stmt->bindParam(":id_anio_ingreso", $datos["id_anio_ingreso"], PDO::PARAM_INT);
			$stmt->bindParam(":id_grupo", $datos["id_grupo"], PDO::PARAM_INT);
			
			
			if($stmt->execute()){
				return "success";
			}
			else{
				return "error";
			}

			$stmt->close();

	 }


		public function registroGrupoModel($datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO grupos (cuatrimestre,nombre) VALUES (:cuatrimestre,:nombre)");	
			// se asignan los parametros para ser pasados a el insert
			$stmt->bindParam(":cuatrimestre", $datos["cuatrimestre"], PDO::PARAM_INT);
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			
			
			if($stmt->execute()){
				return "success";
			}
			else{
				return "error";
			}

			$stmt->close();

	 }


	 	//funcion para recuperar los datos completos de cualquier tabla
	public function vista($tabla){
		$stmt = Datos::conectar()->prepare("SELECT * FROM $tabla ");
		$stmt->execute();
		//se retorna el arreglo con los datos de los profesores
		return $stmt->fetchAll();
		$stmt->close();

	}

  }

?>