<?php
// se elimina un usuario pasando la variable por url y recargando la pagina de inicio
  $id = $_GET['id'];
  include "database.php";
  $data = new Database();
 
  $data->delete($id);
  header("Location: index.php")
?>