<?php
  //clase encargada de la conexion con la base de datos
 class Conexion{

    public function conectar(){
      $link = new PDO("mysql:host=localhost;dbname=examen_unidad_1","leo","Besekyspod3124755");
      return $link;
    }

}

?>