<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "registrarAlumno" || $enlaces == "registrarProfesor" || $enlaces =="registrarMateria"){

			$module =  "views/modules/".$enlaces.".php";
		}
		else{
			$module =  "views/modules/registrarAlumno.php";
		}

		return $module;

	}

}

?>