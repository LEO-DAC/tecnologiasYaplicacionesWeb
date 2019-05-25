<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

class Datos extends Conexion{

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroUsuarioModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (username, password,admin) VALUES (:username,:password,:admin)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam("admin", $datosModel["admin"], PDO::PARAM_BOOL);
		
		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}




	public function login($datos_usuario){
		$query = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE username=:usuario AND password=:passw");

		$query->bindParam(":usuario", $datos_usuario["username"], PDO::PARAM_STR);
		$query->bindParam(":passw", $datos_usuario["password"], PDO::PARAM_STR);

		$res = $query->execute();

		return $query->fetch();
	}




	#INGRESO USUARIO
	#-------------------------------------
	public function ingresoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT username, password FROM $tabla WHERE username = :username");	
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

    }



	#REGISTRO DE HABITACIONES
	#-------------------------------------
	public function registroHabitacionModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (tipo, disponible,precio) VALUES (:tipo,:disponible,:precio)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":disponible", $datosModel["disponible"], PDO::PARAM_BOOL);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}




	#REGISTRO DE RESERVACIONES
	#-------------------------------------
	public function registroReservacionModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idCliente, idHabitacion,fechaEntrada,dias) VALUES (:idCliente, :idHabitacion,:fechaEntrada,:dias)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":idCliente", $datosModel["idCliente"], PDO::PARAM_INT);
		$stmt->bindParam(":idHabitacion", $datosModel["idHabitacion"], PDO::PARAM_INT);
		$stmt->bindParam(":fechaEntrada", $datosModel["fechaEntrada"], PDO::PARAM_STR);
		$stmt->bindParam(":dias", $datosModel["dias"], PDO::PARAM_INT);
		
		if($stmt->execute()){
			//se cambia el estado del 		
			$stmt2 = Conexion::conectar()->prepare("UPDATE habitacion SET disponible=0 WHERE id=:idHabitacion");
			$stmt2->bindParam(":idHabitacion", $datosModel["idHabitacion"], PDO::PARAM_INT);
		
			
			if($stmt2->execute()){
				return "success";
			}
		
			$stmt2->close();


			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}






	#REGISTRO DE CLIENTES
	#-------------------------------------
	public function registroClienteModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (tipo, nombre,apellido) VALUES (:tipo,:nombre,:apellido)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#VISTA HABITACION
	#-------------------------------------

	public function vistaHabitacionesModel($tabla,$tipo){
        if($tipo==false){
			$stmt = Conexion::conectar()->prepare("SELECT id, tipo, disponible, precio FROM $tabla");	
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT id, tipo, disponible, precio FROM $tabla WHERE tipo='$tipo'");	
		}
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}



	#VISTA RESERVACION
	#-------------------------------------

	public function vistaReservacionesModel($tabla){
     
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}



	#VISTA HABITACION DISPONIBLE
	#-------------------------------------

	public function vistaHabitacionesDisponiblesModel($tabla){
      
		$stmt = Conexion::conectar()->prepare("SELECT id, tipo, disponible, precio FROM $tabla WHERE disponible=1 ");	
	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}



	#VISTA HABITACION PRECIO
	#-------------------------------------

	public function vistaHabitacionesPrecioModel($tabla,$minimo,$maximo){
		$stmt = Conexion::conectar()->prepare("SELECT id, tipo, disponible, precio FROM $tabla WHERE precio>=$minimo and precio<=$maximo");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}


	#VISTA CLIENTE
	#-------------------------------------

	public function vistaClientesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, tipo, nombre,apellido FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}


	#REGISTRO DE PRODUCTO
	#-------------------------------------
	public function registroAdminModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, precio) VALUES (:nombre,:precio)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}





	#BORRAR USUARIO
	#------------------------------------
	public function borrarClienteModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}



	#BORRAR RESERVACION
	#------------------------------------
	public function borrarReservacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel["idBorrar"], PDO::PARAM_INT);

		if($stmt->execute()){


			$stmt2 = Conexion::conectar()->prepare("UPDATE habitacion SET disponible=1 WHERE id=:idHabitacion");
			$stmt2->bindParam(":idHabitacion", $datosModel["idHabitacion"], PDO::PARAM_INT);
		
			
			if($stmt2->execute()){
				return "success";
			}
		
			$stmt2->close();
			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}



	#BORRAR USUARIO
	#------------------------------------
	public function borrarHabitacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

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