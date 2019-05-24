<?php

class MvcController{
	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}



	public function login(){
		if(isset($_POST['login'])){
			$datos_usuario = array('username' => $_POST['username'],
									'password' => $_POST['password'] );
			$datos = new Datos();
			$respuesta = $datos->login($datos_usuario);
			if(!empty($respuesta)){
				$_SESSION['id_usuario']= $respuesta;					
//				$_SESSION['id_usuario'][]=$respuesta['username'];
//				$_SESSION['id_usuario'][]=$respuesta['admin'];

				#header('location:index.php?action=dashboard');
			    $URL="index.php?action=listar";
			    echo "<script >document.location.href='{$URL}';</script>";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
			}else{
				#header('location:index.php?action=registrar');
			    $URL="index.php?action=login";
			    echo "<script >document.location.href='{$URL}';</script>";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
			}
		}
	}


	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "login";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["registrar"])){

			if (!isset($_POST['admin'])){ 
					$admin = 0;
			}else{
				$admin =1;
			}		

			$datosController = array( "username"=>$_POST["username"], 
									  "password"=>$_POST["password"],
									  "admin"=>$admin
									);

			$respuesta = Datos::registroUsuarioModel($datosController, "usuario");

			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");
			}

		}

	}


#REGISTRO DE HABITACIONES
	#------------------------------------
	public function registroHabitacionController(){

		if(isset($_POST["registrar"])){

			$datosController = array( "tipo"=>$_POST["tipo"], 
									  "precio"=>$_POST["precio"],
									  "disponible"=>1
									);

			$respuesta = Datos::registroHabitacionModel($datosController, "habitacion");

			if($respuesta == "success"){

			$salida="sal-success";
			return $salida;	
			}

			else{

				header("location:index.php");
			}

		}

	}



#REGISTRO DE CLIENTES
	#------------------------------------
	public function registroClienteController(){

		if(isset($_POST["registrar"])){

			$datosController = array( "tipo"=>$_POST["tipo"], 
									  "nombre"=>$_POST["nombre"]
									);

			$respuesta = Datos::registroClienteModel($datosController, "cliente");

			if($respuesta == "success"){

			$salida="sal-success";
			return $salida;	
			}

			else{

			//	header("location:index.php");
			}

		}

	}


	#REGISTRO DE PRODUCTOS
	#------------------------------------
	public function registroProductoController(){

	  if(isset($_POST["nombreRegistro"])){
	  	  $datosController = array( "nombre"=>$_POST["nombreRegistro"], 
		                          "precio"=>$_POST["precioRegistro"]);

          $respuesta = Datos::registroProductoModel($datosController, "productos");

          if($respuesta == "success"){

             header("location:index.php?action=ok");
        }
        else{
            header("location:index.php");
	     }

	 }

	}


	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "username"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

			if($respuesta["username"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=usuarios");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}

	#VISTA DE HABITACIONES
	#------------------------------------

	public function vistaHabitacionesController(){

		$respuesta = Datos::vistaHabitacionesModel("habitacion");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["tipo"].'</td>
		';?>
		<?php if($item["disponible"]==1){
				echo "<td>si</td>";
		}else{
			    echo "<td>no</td>";
		}?>
		<?php echo'
				<td>'.'$'.$item["precio"].'</td>
				<td><center><a href="index.php?action=editar&id='.$item["id"].'"><i class="ico zmdi zmdi-edit zmdi-hc-fw"></i></a></center></td>

				<td><center><a href="index.php?action=crudHabitacion&idBorrar='.$item["id"].'"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
			</tr>';

		}

	}



	#VISTA DE CLIENTES
	#------------------------------------


	public function vistaClientesController(){

		$respuesta = Datos::vistaClientesModel("cliente");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["tipo"].'</td>
				<td>'.$item["nombre"].'</td>
				<td><center><a href="index.php?action=editar&id='.$item["id"].'"><i class="ico zmdi zmdi-edit zmdi-hc-fw"></i></a></center></td>

				<td><center><a href="index.php?action=crudHabitacion&idBorrar='.$item["id"].'"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
			</tr>';

		}

	}



	
	#VISTA DE PRODUCTOS
	#------------------------------------

	public function vistaProductosController(){

		$respuesta = Datos::vistaProductosModel("productos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["precio"].'</td>
				<td><a href="index.php?action=editarProd&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=productos&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}


		
	#VISTA DE PRODUCTOS PARA VENTA
	#------------------------------------

	public function vistaVentaProductosController(){

		$respuesta = Datos::vistaProductosModel("productos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		echo "<form method='post'>";
		echo "	<select name='productos'>";
		foreach($respuesta as $row => $item){
		echo'<tr>
				<option>'.$item["nombre"].' $'.$item["precio"].'</option>';
				$arr[$item["nombre"]] = $item["id"];
		}
		echo'</select>';
        echo '<input type="submit" value="comprar">';
        echo "</form>";


		
		if(isset($_POST["productos"])){
	  	  $datosController = array( "id_producto"=>$arr[$item["nombre"]]);

			echo "".$datosController["id_producto"];
          $respuesta = Datos::registroProductoVentaModel($datosController, "venta");

          if($respuesta == "success"){

             header("location:index.php?action=ok");
        }
        else{
            header("location:index.php");
	     }

	 }

	}


	#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["username"].'" name="usuarioEditar" required>

			 <input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>

			 <input type="submit" value="Actualizar">';

	}



	#EDITAR PRODUCTO
	#------------------------------------

	public function editarProductoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarProductoModel($datosController, "productos");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>

			 <input type="number" value="'.$respuesta["precio"].'" name="precioEditar" required>

			 <input type="submit" value="Actualizar">';

	}



	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["usuarioEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "username"=>$_POST["usuarioEditar"],
				                      "password"=>$_POST["passwordEditar"]);
			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}


	#ACTUALIZAR PRODUCTO
	#------------------------------------
	public function actualizarProductoController(){

		if(isset($_POST["nombreEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "nombre"=>$_POST["nombreEditar"],
				                      "precio"=>$_POST["precioEditar"]);
			
			$respuesta = Datos::actualizarProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}



    #BORRAR CLIENTE
	#------------------------------------
	public function borrarClienteController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarClienteModel($datosController, "cliente");

			if($respuesta == "success"){

				//header("location:index.php?action=usuarios");
			
			}

		}

	}


	#BORRAR HABITACION
	#------------------------------------
	public function borrarHabitacionController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarHabitacionModel($datosController, "habitacion");

			if($respuesta == "success"){

			//	header("location:index.php?action=usuarios");
			
			}

		}

	}

}

?>