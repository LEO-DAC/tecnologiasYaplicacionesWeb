<?php



require_once "conexion.php";

class Datos extends Conexion{

	#REGISTRO DE USUARIOS
	//funcion encargada de registrar usuario en la base de datos por medio de pdo
	#-------------------------------------
	public function registroUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (username, password,admin) VALUES (:username,:password,:admin)");	
		// se asignan los parametros para ser pasados a el insert
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



	//función login para validar el usuario que inicia sesión
	public function login($datos_usuario){
		$query = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE username=:usuario AND password=:passw");

		$query->bindParam(":usuario", $datos_usuario["username"], PDO::PARAM_STR);
		$query->bindParam(":passw", $datos_usuario["password"], PDO::PARAM_STR);

		$res = $query->execute();

		return $query->fetch();
	}




	#EDITAR CLIENTE
	//funcion para editar los datos del cliente obteniendolos y retornandolor en un arreglo
	#-------------------------------------

	public function editarClienteModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}


	#EDITAR CLIENTE
	//funcion que obtiene losd atos de la reservacion en un arreglo para
	//mostrarlos en el formulario para poder ser editados
	#-------------------------------------

	public function editarReservacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

			
		//update para cambiar el estado de la habitacion a editar a disponible
		$stmt2 = Conexion::conectar()->prepare("UPDATE habitacion SET disponible=1 WHERE id=:idHabitacion");
		$stmt2->bindParam(":idHabitacion", $datosModel["idHabitacion"], PDO::PARAM_INT);
		$stmt2->execute();
		
		return $stmt->fetch();
		
		$stmt2->close();
		
		$stmt->close();
	
		
	}

	#EDITAR HABITACION
	//función editar habitación para resivir los datos de la habitación y ser retornados en un arreglo
	#-------------------------------------

	public function editarHabitacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#INGRESO USUARIO
	//se retornan los datos del usuario que ingresa para asi poder ser obtenidos y guardados en la sesión
	#-------------------------------------
	public function ingresoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT username, password FROM $tabla WHERE username = :username");	
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

    }


	#ACTUALIZAR CLIENTE
	//funcón que actualiza los datos del cliente por medio de un UPDATE 
	#-------------------------------------

	public function actualizarClienteModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo=:tipo, nombre = :nombre, apellido = :apellido WHERE id = :id");
		
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}	



	#ACTUALIZAR RESERVACION
	// se actualzian los datos de la reservación por medio de esta función
	#-------------------------------------

	public function actualizarReservacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idCliente=:idCliente, idHabitacion = :idHabitacion, fechaEntrada = :fechaEntrada, dias=:dias WHERE id = :id");
		
		$stmt->bindParam(":idCliente", $datosModel["idCliente"], PDO::PARAM_INT);
		$stmt->bindParam(":idHabitacion", $datosModel["idHabitacion"], PDO::PARAM_INT);
		$stmt->bindParam(":fechaEntrada", $datosModel["fechaEntrada"], PDO::PARAM_STR);
		$stmt->bindParam(":dias", $datosModel["dias"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}	




	#ACTUALIZAR HABITACION
	// se actualizan los datos de la habitacíon obtenidos por medio de un arreglo recivido
	// acompañado del nombre de la tabla
	#-------------------------------------

	public function actualizarHabitacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo=:tipo, disponible = :disponible, precio = :precio WHERE id = :id");
		
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":disponible", $datosModel["disponible"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}	

	#REGISTRO DE HABITACIONES
	//funcion para registrar los datos de la habitacion a reggistrar
	#-------------------------------------
	public function registroHabitacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (tipo, disponible,precio,imagenHabitacion) VALUES (:tipo,:disponible,:precio,:imagenHabitacion)");	

		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":disponible", $datosModel["disponible"], PDO::PARAM_BOOL);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":imagenHabitacion", $datosModel["imagenHabitacion"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}




	#REGISTRO DE RESERVACIONES
	//funcion que ayuda  aregistrar los datos de la reservación 
	#-------------------------------------
	public function registroReservacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (idCliente, idHabitacion,fechaEntrada,dias) VALUES (:idCliente, :idHabitacion,:fechaEntrada,:dias)");	

		//se asignan los datos que se van a insertar
		$stmt->bindParam(":idCliente", $datosModel["idCliente"], PDO::PARAM_INT);
		$stmt->bindParam(":idHabitacion", $datosModel["idHabitacion"], PDO::PARAM_INT);
		$stmt->bindParam(":fechaEntrada", $datosModel["fechaEntrada"], PDO::PARAM_STR);
		$stmt->bindParam(":dias", $datosModel["dias"], PDO::PARAM_INT);
		
		if($stmt->execute()){
			//se cambia el estado de la habitacion a no disponible por medio de este update 		
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
	//funcion encargada de registrar los datos del cliente resividos por medio de un arreglo
	//acompañado del nombre de la tabla
	#-------------------------------------
	public function registroClienteModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (tipo, nombre,apellido) VALUES (:tipo,:nombre,:apellido)");	

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
	//función que obtiene los datos de las habitaciones
	//dependiendo del tipo de habitaciones
	#-------------------------------------

	public function vistaHabitacionesModel($tabla,$tipo){
        if($tipo==false){
			$stmt = Conexion::conectar()->prepare("SELECT id, tipo, disponible, precio, imagenHabitacion FROM $tabla");	
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT id, tipo, disponible, precio,imagenHabitacion FROM $tabla WHERE tipo='$tipo'");	
		}
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}



	#VISTA RESERVACION
	//función que obtiene los datos re las reservaciones siendo retornados en un arreglo
	#-------------------------------------

	public function vistaReservacionesModel($tabla){
     
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}



	#VISTA HABITACION DISPONIBLE
	//funcion que muestra los datos de las habitaciones disponibles siendo retornados, solo se muestran las habitaciones disponibles
	#-------------------------------------

	public function vistaHabitacionesDisponiblesModel($tabla){
      
		$stmt = Conexion::conectar()->prepare("SELECT id, tipo, disponible, precio FROM $tabla WHERE disponible=1 ");	
	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}



	#VISTA HABITACION PRECIO
	//se obtienen las habitaciones dependiendo de un rango de precio obtenido por parametro
	#-------------------------------------

	public function vistaHabitacionesPrecioModel($tabla,$minimo,$maximo){
		$stmt = Conexion::conectar()->prepare("SELECT id, tipo, disponible, precio FROM $tabla WHERE precio>=$minimo and precio<=$maximo");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}



	#VISTA CLIENTE
	//funcion  que obtiene los datos de los clientes para ser mostrados en una vista
	#-------------------------------------

	public function vistaClientesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, tipo, nombre,apellido FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}


	#BORRAR USUARIO
	//funcion para borrar clientes reciviendo el id del cliente 
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
	//función que borra los datos de la reservación por medio del id 
	#------------------------------------
	public function borrarReservacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel["idBorrar"], PDO::PARAM_INT);

		if($stmt->execute()){

			// se cambia el estado de la habitación a disponible	
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
	//se borra la información de la habitación
	#------------------------------------
	public function borrarHabitacionModel($datosModel, $tabla){

        //se comprueba si hay una reservación activa con esa habitación para evitar un error   
		$stmtExist = Conexion::conectar()->prepare("SELECT * FROM 'reservacion' where idHabitacion=:id");	
		$stmtExist->bindParam(":id", $datosModel, PDO::PARAM_INT);		
		$e=$stmtExist->execute();
 
		if($e){
			return "ErrorReservacion";
		}else{

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
    
 }

?>