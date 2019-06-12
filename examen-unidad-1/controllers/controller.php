<?php
	
	class MVC {

		public function pagina(){	
			
			include "views/template.php";
		
		}

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			$enlaces = $_GET['action'];
		}
		else{
			$enlaces = "crearAlumno";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}	


	public function crearAlumno(){
		if (isset($_POST["crear"])) {
			$datos = array("matricula"=>$_POST["matricula"],
							"nombres"=>$_POST["nombres"],
							"apellidos"=>$_POST["apellidos"],
							"id_anio_ingreso"=>$_POST["id_anio_ingreso"],
							"id_grupo"=>$_POST["id_grupo"]);

			$respuesta = Datos::registroAlumnoModel($datos);

		}
	}


	public function crearGrupo(){
		if (isset($_POST["crear"])) {
			$datos = array("cuatrimestre"=>$_POST["cuatrimestre"],
							"nombre"=>$_POST["nombre"]);
	
			$respuesta = Datos::registroGrupoModel($datos);

		}
	}
	
//funcion para mostrar los grupos en un select en el ormulario de registrar materia
  public function mostrarGruposController(){
      $grupos = Datos::vista("grupos");
      foreach($grupos as $row => $item){
	       echo'<option value ="'.$item['id'].'">'.$item['cuatrimestre'].'-'.$item['nombre'].'</option>';
      }
  }



//funcion para mostrar los grupos en un select en el ormulario de registrar materia
  public function mostrarIngresosController(){
      $ingresos = Datos::vista("ingresos");
      foreach($ingresos as $row => $item){
       echo'<option value ="'.$item['id'].'">'.$item['anio_ingreso'].'</option>';
      }
  }



  }

	


?>