<?php

class Conexion{

public function conectar(){

    $link = new PDO("mysql:host=localhost;dbname=practica05","root","");
    return $link;

}

}

?>