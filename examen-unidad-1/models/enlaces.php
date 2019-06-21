<?php 
//clase encargada de redireccionar dependiendo de la pagina pedida 
class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "crearAlumno" || $enlaces=="crearGrupo"|| $enlaces == "mostrarAlumnos" || $enlaces == "mostrarGrupos"){

			$module =  "views/modules/".$enlaces.".php";
		}

		else if($enlaces == "index"){
			$module =  "views/modules/index.php";
		}

		else{
			$module =  "views/modules/index.php";
		}

		return $module;

	}

}

?>