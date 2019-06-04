<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "registrarAlumno" || $enlaces == "registrarProfesor" || $enlaces =="registrarMateria" || $enlaces =="registrarGrupo" || $enlaces=="mostrarAlumnos" || $enlaces=="mostrarProfesores" || $enlaces == "mostrarMaterias" || $enlaces=="mostrarGrupos" || $enlaces == "editarAlumno" || $enlaces=="editarProfesor" || $enlaces=="editarMateria" || $enlaces=="editarGrupo" || $enlaces=="altaAlumnoMateria" || $enlaces =="verMateriaAlumno"){

			$module =  "views/modules/".$enlaces.".php";
		}
		else{
			$module =  "views/modules/registrarAlumno.php";
		}

		return $module;

	}

}

?>