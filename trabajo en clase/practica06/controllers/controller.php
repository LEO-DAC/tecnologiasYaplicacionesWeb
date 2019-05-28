<?php

class MvcController{
	#LLAMADA A LA PLANTILLA
	#-------------------------------------
	//función para redireccionar al templete 
	public function pagina(){	
		
		include "views/template.php";
	
	}


    //funcion encargada de validar el usuario desde el login, reciviendo los datos del usuario y comparando
    //con los usuarios registrados en la base de datos
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
			    $URL="index.php?action=login";
			    echo "<script >document.location.href='{$URL}';</script>";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
			}
		}
	}




	#EDITAR CLIENTE
	#------------------------------------
    //función encargada de cargar el formulario para editar los datos del cliente
    //meidante el uso de la clase modelo se trae desde la base de datos la información del cliente
    //usando el id del cliente recibido por parametro url 
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
			 <br>	
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
	//funcion encargada de editar la información de la habitacion creaando un formulario
	//y obteniendo la información mediante una consulta a la base de datos 
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
			 <br>
			 <input id="ig-1" type="number" value="'.$respuesta["precio"].'" min="1" name="precioEditar" class="form-control"  required>
			 <br>
			 <input type="submit" value="Actualizar" name="actualizar" class="btn btn-primary btn-sm waves-effect waves-light">
		   </div>
		  </div>
		 </div>
	   </div>';

	}




	#EDITAR RESERVACION
	#------------------------------------
	//función encargada de editar los datos de la reservacion obtenidos atravez de una consulta a la base de 
	//datos y permitiendo editar todos los campos, al hacer uso de este fomrulario se modifica el estado de la habitacion registrada a disponible para poder registrar otra en la reservación.
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
	//se actualizan los datos de la reservacion siendo obtenidos con el metodo post desde el formulario
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
				//despues de recivir la respuesta de que la actualización fue exitosa se redirecciona
				//a la ventana de consultar reservación
			    $URL="index.php?action=consultarReservacion";
			    echo "<script >document.location.href='{$URL}';</script>";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
			}
			else{
				echo "error";
			}

		}
	
	}


	#ACTUALIZAR CLIENTE
    //funcion encargada de actualizar los datos del cliente obtenidos por el metodo post
    // y siendo enviados a la base de datos haciendo uso de la clase datos que envia los datos.
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
	//se obtienen los datos mediante el metodo post y despues se envian por la clase datos
	//para preparar la inserción haciendo uso de pdo.
	#------------------------------------
	public function actualizarHabitacionController(){

		if(isset($_POST["actualizar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "tipo"=>$_POST["tipoEditar"],
							          "disponible"=>$_POST["disponibleEditar"],
				                      "precio"=>$_POST["precioEditar"]);	

            $respuesta = Datos::actualizarHabitacionModel($datosController,"habitacion");
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
	//función encargada de redireccionar a las paginas por medio de action 
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
	//funcion encargada de registrar los datos de los usuarios registrados
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
				//se redirecciona a la pagina login para iniciar sesión despues de registrarse		
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
    //funcion encargada de guardar los datos de habitación recividos por el metodo post

	#------------------------------------
	public function registroHabitacionController(){

		if(isset($_POST["registrar"])){


			//se obtiene el nombre de la imagen
	        $nombreArchivo = basename($_FILES['imagenHabitacion']['name']);
	        //Se concatena al nombre con la carpeta en donde se guardan las imagenes
	        $directorio = 'imagenes/' . $nombreArchivo;


	        //se hace la validacion de la extencion del archivo
	        $extension = pathinfo($directorio , PATHINFO_EXTENSION);

			$datosController = array( "tipo"=>$_POST["tipo"], 
									  "precio"=>$_POST["precio"],
									  "disponible"=>1,
									  "imagenHabitacion"=>$nombreArchivo
									);

	        //la imagen s emueve a una carpeta en la que se almacenan las imagenes
	         move_uploaded_file($_FILES['imagenHabitacion']['tmp_name'], 'imagenes/'.$nombreArchivo);

			$respuesta = Datos::registroHabitacionModel($datosController, "habitacion");

			if($respuesta == "success"){

			$salida="success";
			return $salida;	
			}

			else{

				header("location:index.php");
			}

		}

	}



    #REGISTRO DE CLIENTES
	// funcion encargada de registrar los datos del cliente recividos por el metodo post
	//esto se hace despues de usar el boton registrar
	#------------------------------------
	public function registroClienteController(){

		if(isset($_POST["registrar"])){

			$datosController = array( "tipo"=>$_POST["tipo"], 
									  "nombre"=>$_POST["nombre"],
									  "apellido"=>$_POST["apellido"]
									);

			$respuesta = Datos::registroClienteModel($datosController, "cliente");

			if($respuesta == "success"){
			       
			}

		}

	}


	#REGISTRO DE RESERVACIÓN
	//funcion encargada de registrar los datos de reservación obtenidos por el metodo post
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
			    $URL="index.php?action=consultarReservacion";
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
	//funcion encargada de validar el ingreso del usuario iniciando la sesion. 
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
	//funcion que muestra la vista de las habitaciones y proporciona las opciones de editar y borrar
	//dependiendo de si es un usuario normal o un administrador
	#------------------------------------

	public function vistaHabitacionesController(){

	    if(isset($_POST['listar'])){
	    	$respuesta = Datos::vistaHabitacionesModel("habitacion",$_POST['tipo']);
	    }else{
		    $respuesta = Datos::vistaHabitacionesModel("habitacion",false);
        }

        //ciclo para iprimir los datos de las habitaciones en una tabla
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
		 echo '<td><a class="fancybox" data-fancybox="gallery" data-caption=" cuarto '. $item["id"] .'" href="imagenes/'. $item["imagenHabitacion"].'"><img style="width: 100px;" src="imagenes/'. $item["imagenHabitacion"].'" class="img"></a> </td>';

		?>
		<?php if($_SESSION['id_usuario']['admin']==1){ echo'
				<td><center><a href="index.php?action=editarHabitacion&id='.$item["id"].'"><i class="ico zmdi zmdi-edit zmdi-hc-fw"></i></a></center></td>

				<td><center><a href="index.php?action=crudHabitacion&idBorrar='.$item["id"].'" onclick="return confirmDeleteHabitacion()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
		    ';}?>
		    		
			<?php echo'</tr>';
		 }

	}



	#VISTA DE RESERVACIONES
	//funcion que muestra en una vista la informacion de las reservaciones
	//haciendo uso de una consulta por medio de la clase datos
	#------------------------------------

	public function vistaReservacionesController(){

	    	$respuesta = Datos::vistaReservacionesModel("reservacion");
	   
	    //se imprimen los datos de la consulta en un datatable	
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
	//se imprimen los datos de las habitaciones en un datatable
	//y muestra las opciones de editar o borrar dependiendo del usuario que esté logeado
	#------------------------------------

	public function vistaHabitacionesPrecioController(){

	    if(isset($_POST['consultar'])){
	    	$respuesta = Datos::vistaHabitacionesPrecioModel("habitacion",$_POST['minimo'],$_POST['maximo']);
	    }else{
		    $respuesta = Datos::vistaHabitacionesModel("habitacion",false);
        }

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
	//funcion encargada de mostrar una vista de los clientes dando las opciones de modificar
	// y elminar si un administrador está logeado
	#------------------------------------


	public function vistaClientesController(){

		$respuesta = Datos::vistaClientesModel("cliente");

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



    #BORRAR CLIENTE
    //funcion encargada de borrar un cliente por medio del id del cliente
	#------------------------------------
	public function borrarClienteController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarClienteModel($datosController, "cliente");

			if($respuesta == "success"){

			    $URL="index.php?action=crudCliente";
			    echo "<script >document.location.href='{$URL}';</script>";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
			
			
			}

		}

	}


	#BORRAR HABITACION
	//funcion encargada de borrar una habitacion por medio del id de la habitacón
	#------------------------------------
	public function borrarHabitacionController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarHabitacionModel($datosController, "habitacion");

			if($respuesta == "success"){

			    $URL="index.php?action=crudHabitacion";
			    echo "<script >document.location.href='{$URL}';</script>";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
				echo"<h1>entra a succes</h1>";

			}else{
				if($respuesta=="ErrorReservacion"){
				 echo '<script> alert("No se puede eliminar la habitación porque hay una reservación registrada") </sript>';		
				}else{
				    echo '<script> alert("Error al borrar la habitacion") </sript>';
				}
			}

		}

	}


	#BORRAR RESERVACION
	 //función encargada de borrar una reservación por medio del id de reservación
	 //despues de eso se redurecciona a la pagina de consultar reservación 
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