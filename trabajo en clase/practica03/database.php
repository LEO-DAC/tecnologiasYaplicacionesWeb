<?php
class Database{
    private $con;
    private $dbhost="localhost";
    private $dbuser="root";
    private $dbpass="root";
    private $dbname="poo_bd";
    function __concect_db(){
        $this->connect_db();
    }
    public function connect_db(){
        $this->con = mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
        if(mysqli_connect_errror()){
             die("Conexión a la base de datos falló". mysqli_connect_error() . mysqli_connect_errno() );   
        }
    }

    public function sanitize($var){
        $return = mysqli_real_escape_string($this->con,$var);
        return $return;
    }
    
}

?>