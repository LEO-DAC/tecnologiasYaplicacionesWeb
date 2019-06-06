<?php
  //clase encargada de la conexion con la base de datos
 class Conexion{

    public function conectar(){

   		 $link = new PDO("mysql:host=localhost;dbname=bd_practica_07","leo","Besekyspod3124755");
          return $link;

    }

}

?>