<?php
// se elimina un usuario pasando la variable por url y recargando la pagina de inicio
  $id = $_GET['id'];
  $tabla=$_GET['tabla'];
  /* Conexion con base de datos. */
   $conexion = new PDO('mysql:host=localhost;dbname=tarea03;charset=UTF8', 'root', '');
   $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
   /* Se define la consulta para borrrar el elemento de la tabla */
   $consulta = "DELETE from $tabla WHERE id=$id";
   // se verifica si la inserción fue exitosa
   if($conexion->exec($consulta)){
        $message = "Datos borrados con éxito";
        $class = "alert alert-success";
   }else{
        $message="No se pudo borrar el usuario";
        $class="alert alert-danger";
    }


  header("Location: random.php")

?>