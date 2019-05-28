<?php 
//clase encargada de redireccionar dependiendo de la pagina pedida 
class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "crudHabitacion" || $enlaces=="crudCliente" || $enlaces=="listar"|| $enlaces == "usuarios" || $enlaces == "salir" || $enlaces=="login" || $enlaces=="session_destroy" || $enlaces=="consultarHabitacion" || $enlaces=="generarReservacion" || 
			 $enlaces=="consultarReservacion" || $enlaces=="editarCliente" || $enlaces=="editarHabitacion"
			 || $enlaces=="editarReservacion" ){

			$module =  "views/modules/".$enlaces.".php";
		}

		else if($enlaces == "index"){
			$module =  "views/modules/login.php";
		}

		else if($enlaces == "ok"){
			$module =  "views/modules/login.php";
		}

		else if($enlaces == "fallo"){
			$module =  "views/modules/login.php";
		}

		else if($enlaces == "cambio"){
			$module =  "views/modules/usuarios.php";
		}

		else{
			$module =  "views/modules/registro.php";
		}

		return $module;

	}

}

?>