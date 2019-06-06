<?php
require_once "conexion.php";

class Datos extends Conexion{
	//funcion para insertar datos de usuario a la base de datos	
	public function registrarAlumnoModel($datosModel){
		$stmt = Conexion::conectar()->prepare("INSERT INTO alumno (matricula,nombres,apellidos,id_carrera,id_tutor) VALUES (:matricula,:nombres,:apellidos,:id_carrera,:id_tutor)");

		$stmt->bindParam(":matricula",$datosModel["matricula"],PDO::PARAM_INT);
		$stmt->bindParam(":nombres",  $datosModel["nombres"],PDO::PARAM_STR);
		$stmt->bindParam(":apellidos",$datosModel["apellidos"],PDO::PARAM_STR);
		$stmt->bindParam(":id_tutor",$datosModel["id_profesor"],PDO::PARAM_INT);
		$stmt->bindParam(":id_carrera",$datosModel["id_carrera"],PDO::PARAM_INT);
		
		if($stmt->execute()){ //se valida si la inserción fué exitosa
			return "success";//en caso de ser así, se retorna una cadena con el mesnaje success	
		}else{
			return "error"; //de lo contrario se retorna la cadena errror
		}

		$stmt->close(); //se cierra el flujo de la conexión

	}


	//funcion para insertar datos de profesor a la base de datos	
	public function registrarProfesorModel($datosModel){
		$stmt = Conexion::conectar()->prepare("INSERT INTO profesor (nombres,apellidos,id_carrera,correo,password) VALUES (:nombres,:apellidos,:id_carrera,:correo,:password)");

		$stmt->bindParam(":nombres",  $datosModel["nombres"],PDO::PARAM_STR);
		$stmt->bindParam(":apellidos",$datosModel["apellidos"],PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera",$datosModel["id_carrera"],PDO::PARAM_INT);
		$stmt->bindParam(":correo",$datosModel["correo"],PDO::PARAM_STR);
		$stmt->bindParam(":password",$datosModel["password"],PDO::PARAM_STR);
		if($stmt->execute()){ //se valida si la inserción fué exitosa
			return "success";//en caso de ser así, se retorna una cadena con el mesnaje success	
		}else{
			return "error"; //de lo contrario se retorna la cadena errror
		}

		$stmt->close(); //se cierra el flujo de la conexión

	}


	//funcion para insertar datos de materia a la base de datos	
	public function registrarMateriaModel($datosModel){
		$stmt = Conexion::conectar()->prepare("INSERT INTO materia (nombre,clave,id_carrera,id_profesor) VALUES (:nombre,:clave,:id_carrera,:id_profesor)");
		$stmt->bindParam(":nombre",  $datosModel["nombre"],PDO::PARAM_STR);
		$stmt->bindParam(":clave",  $datosModel["clave"],PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera",$datosModel["id_carrera"],PDO::PARAM_INT);
		$stmt->bindParam(":id_profesor",$datosModel["id_profesor"],PDO::PARAM_INT);

		if($stmt->execute()){ //se valida si la inserción fué exitosa
			return "success";//en caso de ser así, se retorna una cadena con el mesnaje success	
		}else{
			return "error"; //de lo contrario se retorna la cadena errror
		}

		$stmt->close(); //se cierra el la conexión

	}

    //recive los datos de la tutoria apra guardarla en la abse de datos
    public function registrarTutoriaModel($datosModel){
		$stmt = Conexion::conectar()->prepare("INSERT INTO sesion_tutoria (fecha,tipo,tema,id_profesor) VALUES (:fecha,:tipo,:tema,:id_profesor)");
		$stmt->bindParam(":fecha",  $datosModel["fecha"],PDO::PARAM_STR);
		$stmt->bindParam(":tipo",  $datosModel["tipo"],PDO::PARAM_STR);
		$stmt->bindParam(":tema",$datosModel["tema"],PDO::PARAM_STR);
		$stmt->bindParam(":id_profesor",$datosModel["id_profesor"],PDO::PARAM_INT);

		if($stmt->execute()){ //se valida si la inserción fué exitosa
			return "success";//en caso de ser así, se retorna una cadena con el mesnaje success	
		}else{
			return "error"; //de lo contrario se retorna la cadena errror
		}

		$stmt->close(); //se cierra la conexión

	}

  public function registrarTutoriaAlumnoModel($datosModel){
		$stmt = Conexion::conectar()->prepare("INSERT INTO sesion_alumno (id_sesion,id_alumno) VALUES (:id_tutoria,:id_alumno)");
		$stmt->bindParam(":id_tutoria",$datosModel["id_tutoria"],PDO::PARAM_INT);
		$stmt->bindParam(":id_alumno",$datosModel["id_alumno"],PDO::PARAM_INT);

		if($stmt->execute()){ //se valida si la inserción fué exitosa
			return "success";//en caso de ser así, se retorna una cadena con el mesnaje success	
		}else{
			return "error"; //de lo contrario se retorna la cadena errror
		}

		$stmt->close(); //se cierra la conexión

}

	// guarda los alumnos en la materia en base de datos
	public function registrarAlumnoMateriaModel($datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO materia_alumno (id_materia,id_alumno) VALUES (:id_materia,:id_alumno)");
		$stmt->bindParam(":id_materia",  $datos["id_materia"],PDO::PARAM_INT);
		$stmt->bindParam(":id_alumno",  $datos["id_alumno"],PDO::PARAM_INT);

	   if($stmt->execute()){ //se valida si la inserción fué exitosa
			return "success";//en caso de ser así, se retorna una cadena con el mesnaje success	
		}else{
			return "error"; //de lo contrario se retorna la cadena errror
		}

		$stmt->close(); //se cierra el flujo de la conexión
			
	}

	//funcion encargada de registrar un grupo mandando la información a la base de datos por pdo
	public function registrarGrupoModel($datosModel){
		$stmt = Conexion::conectar()->prepare("INSERT INTO grupo (id_carrera,cuatrimestre) VALUES (:id_carrera,:cuatrimestre)");
		$stmt->bindParam(":id_carrera",  $datosModel["id_carrera"],PDO::PARAM_INT);
		$stmt->bindParam(":cuatrimestre",  $datosModel["cuatrimestre"],PDO::PARAM_INT);
	
		if($stmt->execute()){ //se valida si la inserción fué exitosa
			return "success";//en caso de ser así, se retorna una cadena con el mesnaje success	
		}else{
			return "error"; //de lo contrario se retorna la cadena errror
		}

		$stmt->close(); //se cierra el flujo de la conexión

	}


	//funcion para recuperar los datos completos de cualquier tabla
	public function vista($tabla){
		$stmt = Datos::conectar()->prepare("SELECT * FROM $tabla ");
		$stmt->execute();
		//se retorna el arreglo con los datos de los profesores
		return $stmt->fetchAll();
		$stmt->close();

	}


	#RECUPERA ALUMNO
	//funcion para recuperar los datos de cualquier tabla haciendo uso del id y el nombre de la tabla
	#-------------------------------------
	public function recuperarRegistro($id,$tabla){
		if ($tabla=='alumno') {
			$clave = "matricula";
		}else{
			$clave="id";
		}
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $clave = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();

		$stmt->close();

	}

	//funcion para actualizar los datos de un cliente despues de llenar el formulario
	//los datos serán enviados a esta función la cual se encarga de actualizarlos
	public function actualizarAlumnoModel($datos){
		$stmt = Conexion::conectar()->prepare("UPDATE alumno SET nombres = :nombres, apellidos = :apellidos, id_carrera=:id_carrera, id_tutor=:id_profesor WHERE matricula = :matricula");
		
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);;
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":matricula", $datos["matricula"], PDO::PARAM_INT);

		$stmt->bindParam(":id_carrera", $datos["id_carrera"], PDO::PARAM_INT);
		$stmt->bindParam(":id_profesor", $datos["id_profesor"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();	
	}


	//función encargada de modificar los datos del alumno a modificar	
	public function actualizarProfesorModel($datos){
		$stmt = Conexion::conectar()->prepare("UPDATE profesor SET nombres = :nombres, apellidos = :apellidos, id_carrera =:id_carrera, correo=:correo, password=:password WHERE id = :id");
		
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam("correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datos["id_carrera"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();	
	}



	//función encargada de modificar los datos de la materia a editar	
	public function actualizarMateriaModel($datos){
		$stmt = Conexion::conectar()->prepare("UPDATE materia SET nombre = :nombre, clave = :clave, id_carrera = :id_carrera, id_profesor=:id_profesor WHERE id = :id");
		
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":clave", $datos["clave"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datos["id_carrera"], PDO::PARAM_INT);
		$stmt->bindParam(":id_profesor", $datos["id_profesor"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();	
	}



	//función encargada de modificar los datos del grupo a editar	
	public function actualizarGrupoModel($datos){
		$stmt = Conexion::conectar()->prepare("UPDATE grupo SET carrera = :carrera, cuatrimestre=:cuatrimestre WHERE id = :id");
		
		$stmt->bindParam(":cuatrimestre", $datos["cuatrimestre"], PDO::PARAM_INT);
		$stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();	
	}
	//función encargada de eliminar registros de cualquier tabla haciendo uso del nombre de
	//la tabla,acompañado de la clave o id del registro
	public function eliminarRegistro($id,$tabla){
		//se selecciona el tipo de clave a usar
		if ($tabla=="alumno") {
			$clave = "matricula";// para alumno
		}else{	
			$clave = "id"; //para cualquier otro tipo de tabla
		}

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $clave = :id" );
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);	
		
		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();	
	

	}


	//funcion para rMOSTRAR una sentencia en sql
	public function sentencia($sentencia){
		$stmt = Datos::conectar()->prepare($sentencia);
		$stmt->execute();
		//se retorna el arreglo con los datos de los profesores
		return $stmt->fetchAll();
		$stmt->close();

	}



	public function sentenciaDelete($sentencia){

		$stmt = Conexion::conectar()->prepare($sentencia);
		
		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();	
	

	}

	public function sentenciaInsert($sentencia){

		$stmt = Conexion::conectar()->prepare($sentencia);
		
		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();	
	

	}

}
?>