<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "registrarAlumno" || $enlaces == "registrarProfesor" || $enlaces =="registrarMateria" || $enlaces =="registrarGrupo" || $enlaces=="mostrarAlumnos" || $enlaces=="mostrarProfesores" || $enlaces == "mostrarMaterias" || $enlaces=="mostrarGrupos" || $enlaces == "editarAlumno" || $enlaces=="editarProfesor" || $enlaces=="editarMateria" || $enlaces=="editarGrupo" || $enlaces=="altaAlumnoMateria" || $enlaces=="altaGrupoMateria" ||$enlaces=="verGrupoMateria" || $enlaces =="verMateriaAlumno" || $enlaces=="registrarTutoria" || $enlaces=="mostrarTutorias" || $enlaces=="altaTutoriaAlumno" || $enlaces=="verTutoriaAlumno"){

			$module =  "views/modules/".$enlaces.".php";
		}
		else{
			$module =  "views/modules/registrarAlumno.php";
		}

		return $module;

	}

}

?>