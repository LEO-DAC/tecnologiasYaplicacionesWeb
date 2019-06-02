<?php
//clase de manejar los controladores del sistema
 class MvcController{	

  public function pagina(){ include "views/template.php"; }


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

  public function registrarAlumnoController(){
  	if(isset($_POST["registrar"])){
  			$datos = array("nombres"=>$_POST["nombres"],
  							"apellidos"=>$_POST["apellidos"]);
  			$respuesta = Datos::registrarAlumnoModel($datos);

  			if($respuesta=="success"){
  				echo "<scritp>window.alert('se guardo el alumno de forma exitosa!');<script>";
  			}else{

  				echo "<scritp>window.alert('se presentó un problema al guardar el alumno!);<script>";
  			}							
  	}

  }


  public function registrarProfesorController(){
  	if(isset($_POST["registrar"])){
  			$datos = array("nombres"=>$_POST["nombres"],
  							"apellidos"=>$_POST["apellidos"]);
  			$respuesta = Datos::registrarProfesorModel($datos);

  			if($respuesta=="success"){
  				echo "<scritp>window.alert('se guardo el profesor de forma exitosa!');<script>";
  			}else{

  				echo "<scritp>window.alert('se presentó un problema al guardar el profesor!);<script>";
  			}							
  	}

  }

}

?>