<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "registrar_alumno" || $enlaces == "tutorias"|| $enlaces == "maestros"||$enlaces == "alumnos"||$enlaces == "carreras"||$enlaces == "salir"||$enlaces == "reportes" || $enlaces == "editar_alumnos"||$enlaces == "editar_carreras"||$enlaces == "editar_maestro"||$enlaces == "editar_tutoria"||$enlaces == "ingresar"||$enlaces == "registro_alumno"||$enlaces == "registro_carrera"||$enlaces == "registro_maestro"||$enlaces == "registro_tutoria"){

			$module =  "views/modules/".$enlaces.".php";
		}
		else if($enlaces == "index"){
			$module =  "views/modules/ingresar.php";
		}
		else if($enlaces == "ok"){
			$module =  "views/modules/ingresar.php";
		}else{
			$module =  "views/modules/ingresar.php";
			
		}
		
		return $module;

	}

}

?>