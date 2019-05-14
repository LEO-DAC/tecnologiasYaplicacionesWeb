<?php
	//importa el archivo de conexion 
	include("database.php");
    $clientes =  new Database(); //se cera instancia 	
	if(isset($_POST['login'])){//Se valida si se realizo accion con el boton 'login'
		$user = $_POST['username'];//Se toma el valor del elemento 'user' del login
		$pass = $_POST['password'];//Se toma el valor del elemento 'password' del login

		$consulta = mysqli_query($clientes->con,"SELECT * FROM cuentas");//Se realiza una consulta a la BD para obtener todos los campos de la tabla 'cuentas'
		$res = mysqli_fetch_array($consulta);//Se recuperan todos los datos de la consulta anterior
        
		if($user == "$res[username]" && $pass == "$res[password]"){//Se valida si el 'user' y 'password' coinciden en la BD 
			session_start();//Se inicia sesion
			$_SESSION['usuario'] = $user;//Se declara la variable sesion que llevara el valor de la sesion iniciada del usuario
			header("location:login.php");//Se direccion hacia el index.
		
		}else{
            echo "usuario no encontrado";
            //echo "<script>document.location.href='../index.php?var=error';</script>";//Si no coinciden los datos se regresa al index del login con una variable de error.
		}	
	}
?>