<?php

class Conexion{

public function conectar(){

    $link = new PDO("mysql:host=localhost;dbname=practica06","root","");
    return $link;

}

}

?>