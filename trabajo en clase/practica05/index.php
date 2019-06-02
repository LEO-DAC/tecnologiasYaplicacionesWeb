<?php
  //EL INDEX: En el mostraremos la salida de las vistas al usuario y tambien atravez de el enviaremos las distintas acciones que el usuario envíe al controlador

  require_once "controllers/controller.php";
  require_once "models/model.php";

  $mvc = new MVCController();
  $mvc->plantilla();

?>