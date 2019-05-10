<?php
  $id = $_GET['id'];

  include "database.php";
  $data = new Database();



  $data->delete($id);
  header("Location: index.php")
?>