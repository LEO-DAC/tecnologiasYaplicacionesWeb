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




	#EDITAR CLIENTE
	#------------------------------------

	public function editarClienteController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarClienteModel($datosController, "cliente");

		echo'
		<div class="wrapper">
		 <div class="main-content">
		  <div class="box-content">
		   <div class="form-group margin-bottom-20">
		     <h4 class="box-title">Editar Cliente</h4> 
			<form method="post">	

		     <input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

             <label>selecciona el tipo de cliente:</label> 
             <select name="tipoEditar" class="form-control" required>
             <option >habitual</option>
             <option >esporádico</option>
             </select><br>

			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" id="ig-1"  class="form-control" required>

			 <input type="text" value="'.$respuesta["apellido"].'" name="apellidoEditar" id="ig-1"  class="form-control" required>
			 <br><br>	
			 <input type="submit" value="Actualizar" name="actualizar" class="btn btn-primary btn-sm waves-effect waves-light">
		   </div>
		  </div>
		 </div>
	   </div>';

	}


	#EDITAR HABITACION
	#------------------------------------

	public function editarHabitacionController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarHabitacionModel($datosController, "habitacion");

		echo'
		<div class="wrapper">
		 <div class="main-content">
		  <div class="box-content">
		   <div class="form-group margin-bottom-20">
		     <h4 class="box-title">Editar Habitacion</h4> 
			<form method="post">	

		     <input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

	          <label>selecciona el tipo de habitación:</label>
	           <select name="tipoEditar" class="form-control" required>
	             <option >simple</option>
	             <option >doble</option>
	             <option >matrimonial</option>
	           </select><br>

			 <input id="ig-1" type="number" value="'.$respuesta["disponible"].'" min="0" max="1" name="disponibleEditar" class="form-control"  required>

			 <input id="ig-1" type="number" value="'.$respuesta["precio"].'" min="1" name="precioEditar" class="form-control"  required>

			 <input type="submit" value="Actualizar" name="actualizar" class="btn btn-primary btn-sm waves-effect waves-light">
		   </div>
		  </div>
		 </div>
	   </div>';

	}




	#EDITAR RESERVACION
	#------------------------------------

	public function editarReservacionController(){

			$datosController = array( "id"=>$_GET["id"],
							          "idHabitacion"=>$_GET["idHabitacion"]);

		$respuesta = Datos::editarReservacionModel($datosController, "reservacion");

		echo'
		<div class="wrapper">
		 <div class="main-content">
		  <div class="box-content">
		   <div class="form-group margin-bottom-20">
		     <h4 class="box-title">Editar Habitacion</h4> 
			<form method="post">	

		     <input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

                     <select name="idClienteEditar" class="form-control">';
                       
                        
                          $this->MostrarClientesController();
                         
		echo '
                     </select><br>
		             <select name="idHabitacionEditar" class="form-control">';
                       $this->MostrarHabitacionesController();
                       
		echo'
                     </select><br>


                      <div class="form-group">
                        <label class="control-label col-sm-4">Fecha de llegada</label>
                        <div class="col-sm-8">
                          <div class="input-group">
                            <input required  name="fechaEntradaEditar" type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                            <span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
                          </div>
                        </div>
                      </div>
                  
                     <div class="col-sd-10 margin-bottom-20">
                      <p>dias: </p><input  type="number" value="'.$respuesta["id"].'" name="diasEditar" class="col-md-8 form-control" required  min="1" max="100" >

			 <input type="submit" value="Actualizar" name="actualizar" class="btn btn-primary btn-sm waves-effect waves-light">
		   </div>
		  </div>
		 </div>
	   </div>';

	}




	#ACTUALIZAR RESERVACION
	#------------------------------------
	public function actualizarReservacionController(){

		if(isset($_POST["actualizar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "idCliente"=>$_POST["idClienteEditar"],
							          "idHabitacion"=>$_POST["idHabitacionEditar"],
				                      "fechaEntrada"=>$_POST["fechaEntradaEditar"],
				                  	  "dias"=>$_POST["diasEditar"]);
			
			$respuesta = Datos::actualizarReservacionModel($datosController, "reservacion");

			if($respuesta == "success"){

			    $URL="index.php?action=consultarReservacion";
			    echo "<script >document.location.href='{$URL}';</script>";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
				//header("location:index.php?action=crudCliente");

			}

			else{

				echo "error";

			}

		}
	
	}






	#ACTUALIZAR CLIENTE
	#------------------------------------
	public function actualizarClienteController(){

		if(isset($_POST["actualizar"])){


			
			$respuesta = Datos::actualizarClienteModel($datosController, "cliente");

			if($respuesta == "success"){

			    $URL="index.php?action=crudCliente";
			    echo "<script >document.location.href='{$URL}';</script>";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
				//header("location:index.php?action=crudCliente");

			}

			else{

				echo "error";

			}

		}
	
	}




	#ACTUALIZAR HABITACION
	#------------------------------------
	public function actualizarHabitacionController(){

		if(isset($_POST["actualizar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "tipo"=>$_POST["tipoEditar"],
							          "disponible"=>$_POST["disponibleEditar"],
				                      "precio"=>$_POST["precioEditar"]);
			
			$respuesta = Datos::actualizarHabitacionModel($datosController, "habitacion");

			if($respuesta == "success"){

			    $URL="index.php?action=crudHabitacion";
			    echo "<script >document.location.href='{$URL}';</script>";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

			}

			else{

				echo "error";

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

			    $URL="index.php?action=login";
			    echo "<script >document.location.href='{$URL}';</script>";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

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
									  "nombre"=>$_POST["nombre"],
									  "apellido"=>$_POST["apellido"]
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


	#REGISTRO DE RESERVACIÓN
	#------------------------------------
	public function registroReservacionController(){

		if(isset($_POST["registrar"])){
			
			$datosController = array( "idCliente"=>$_POST["idCliente"], 
									  "idHabitacion"=>$_POST["idHabitacion"],
									  "fechaEntrada"=>$_POST["fechaEntrada"],
									  "dias"=>$_POST["dias"]
									);

			$respuesta = Datos::registroReservacionModel($datosController, "reservacion");

			if($respuesta == "success"){

			    $URL="index.php?action=generarReservacion";
			    echo "<script >document.location.href='{$URL}';</script>";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

			$salida="sal-success";
			return $salida;	
			}

			else{

			//	header("location:index.php");
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

	    if(isset($_POST['listar'])){
	    	$respuesta = Datos::vistaHabitacionesModel("habitacion",$_POST['tipo']);
	    }else{
		    $respuesta = Datos::vistaHabitacionesModel("habitacion",false);
        }

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["tipo"].'</td>
		';?>
		<?php if($item["disponible"]==1){
				echo "<td>si</td>";
		}else{
			    echo '<td>no</td>';
		}
		 echo '<td>'.'$'.$item["precio"].'</td>';
		?>
		<?php if($_SESSION['id_usuario']['admin']==1){ echo'
				<td><center><a href="index.php?action=editarHabitacion&id='.$item["id"].'"><i class="ico zmdi zmdi-edit zmdi-hc-fw"></i></a></center></td>

				<td><center><a href="index.php?action=crudHabitacion&idBorrar='.$item["id"].'" onclick="return confirmDeleteHabitacion()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
		    ';}?>
		    		
			<?php echo'</tr>';
		 }

	}



	#VISTA DE RESERVACIONES
	#------------------------------------

	public function vistaReservacionesController(){

	    	$respuesta = Datos::vistaReservacionesModel("reservacion");
	   

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["idCliente"].'</td>
				<td>'.$item["idHabitacion"].'</td>
				<td>'.$item["fechaEntrada"].'</td>
				<td>'.$item["dias"].'</td>		
		';
		?>
		<?php echo'
				<td><center><a href="index.php?action=editarReservacion&id='.$item["id"].'&idHabitacion='.$item["idHabitacion"].'"><i class="ico zmdi zmdi-edit zmdi-hc-fw"></i></a></center></td>

				<td><center><a href="index.php?action=consultarReservacion&idBorrar='.$item["id"].'&idHabitacion='.$item["idHabitacion"].'" onclick="return confirmDeleteHabitacion()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
		    ';?>
		    		
			<?php echo'</tr>';
		 }

	}






	#VISTA DE HABITACIONES
	#------------------------------------

	public function vistaHabitacionesPrecioController(){

	    if(isset($_POST['consultar'])){
	    	$respuesta = Datos::vistaHabitacionesPrecioModel("habitacion",$_POST['minimo'],$_POST['maximo']);
	    }else{
		    $respuesta = Datos::vistaHabitacionesModel("habitacion",false);
        }

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["tipo"].'</td>
		';?>
		<?php if($item["disponible"]==1){
				echo "<td>si</td>";
		}else{
			    echo '<td>no</td>';
		}
		 echo '<td>'.'$'.$item["precio"].'</td>';
		?>
		<?php if($_SESSION['id_usuario']['admin']==1){ echo'
				<td><center><a href="index.php?action=editar&id='.$item["id"].'"><i class="ico zmdi zmdi-edit zmdi-hc-fw"></i></a></center></td>

				<td><center><a href="index.php?action=crudHabitacion&idBorrar='.$item["id"].'" onclick="return confirmDeleteHabitacion()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
		    ';}?>
		    		
			<?php echo'</tr>';
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
				<td>'.$item["apellido"].'</td>
				<td><center><a href="index.php?action=editarCliente&id='.$item["id"].'" ><i class="ico zmdi zmdi-edit zmdi-hc-fw"></i></a></center></td>

				<td><center><a href="index.php?action=crudCliente&idBorrar='.$item["id"].'" onclick="return confirmDeleteCliente()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
			</tr>';

		}

	}

	//funcion para llenar el campo select del formulario de reservacion y mostrar el nombre del cliente
	public function MostrarClientesController(){

		$respuesta = Datos::vistaClientesModel("cliente");
		foreach($respuesta as $row => $item){
		     echo'<option value ='.$item['id'].'>'.$item['nombre'].' '.$item['apellido'].'</option>';
		}
	}


    //función para llenar el campo select del formulario reservacion y mostrar las habitaciones disponibles
	public function MostrarHabitacionesController(){

		$respuesta = Datos::vistaHabitacionesDisponiblesModel("habitacion");
		foreach($respuesta as $row => $item){
		     echo'<option value ='.$item['id'].'>'.$item['tipo'].' $'.$item['precio'].'</option>';
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

			    $URL="index.php?action=crudCliente";
			    echo "<script >document.location.href='{$URL}';</script>";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
				//header("location:index.php?action=crudCliente");
			
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

			    $URL="index.php?action=crudHabitacion";
			    echo "<script >document.location.href='{$URL}';</script>";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		
			}

		}

	}


	#BORRAR RESERVACION
	#------------------------------------
	public function borrarReservacionController(){

		if(isset($_GET["idBorrar"])){

			$datosController = array( "idBorrar"=>$_GET["idBorrar"], 
								      "idHabitacion"=>$_GET["idHabitacion"]);

			$respuesta = Datos::borrarReservacionModel($datosController, "reservacion");

			if($respuesta == "success"){

			    $URL="index.php?action=consultarReservacion";
			    echo "<script >document.location.href='{$URL}';</script>";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		
			}

		}

	}


}

?>