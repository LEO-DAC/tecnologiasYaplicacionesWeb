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
  			$datos = array("matricula"=>$_POST["matricula"],
                       "nombres"=>$_POST["nombres"],
  							       "apellidos"=>$_POST["apellidos"]);
  			$respuesta = Datos::registrarAlumnoModel($datos);

  			if($respuesta=="success"){
  				echo "<script type=\"text/javascript\">alert(\"Alumno guardado con exito!!\");</script>";  
  			}else{
          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar!!\");</script>";  
          			}							
  	}

  }


  public function registrarProfesorController(){
  	if(isset($_POST["registrar"])){
  			$datos = array("nombres"=>$_POST["nombres"],
  							"apellidos"=>$_POST["apellidos"]);
  			$respuesta = Datos::registrarProfesorModel($datos);

  			if($respuesta=="success"){
  			  echo "<script type=\"text/javascript\">alert(\"Profesor guardado con exito!!\");</script>";  
        }else{

  	      echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar!!\");</script>";
        		}							
  	}

  }


    public function registrarMateriaController(){
    if(isset($_POST["registrar"])){
        $datos = array("clave"=>$_POST["clave"],
                       "carrera"=>$_POST["carrera"],
                        "id_profesor"=>$_POST["id_profesor"]);
        $respuesta = Datos::registrarMateriaModel($datos);

        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Materia guardada con exito!!\");</script>";  
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar!!\");</script>";
            }             
    }

  }

  public function mostrarProfesoresController(){
    
      $profesores = Datos::vistaProfesoresModel();
      foreach($profesores as $row => $item){
       echo'<option value ='.$item['id'].'>'.$item['nombres'].' '.$item['apellidos'].'</option>';
      }
  }

}

?>