<?php
class Database{
    public  $con;
    private $dbhost="localhost";
    private $dbuser="root";
    private $dbpass="";
    private $dbname="tarea03";
    function __construct(){
        $this->connect_db();
    }
    public function connect_db(){
        $this->con = mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
        if(mysqli_connect_error()){
             die("Conexión a la base de datos falló". mysqli_connect_error() . mysqli_connect_errno() );   
        }
    }

    public function sanitize($var){
        $return = mysqli_real_escape_string($this->con,$var);
        return $return;
    }

    public function create($nombres, $apellidos, $telefono, $direccion,$correo_electronico){
          $sql = "INSERT INTO clientes (nombres,apellidos,telefono,direccion,correo_electronico)
                         VALUES('$nombres','$apellidos','$telefono','$direccion','$correo_electronico')";
          $res = mysqli_query($this->con, $sql);    
          
          if($res){
             echo "<script language='JavaScript'>";
             echo "alert('Cliente agregado con exito!');";
             echo "</script>";
              return true;
          }else{
            echo "<script language='JavaScript'>";
            echo "alert('Fallo algo al guardar!');";
            echo "</script>";
              return false;
          }
    }

    public function single_record($id){
         $sql ="SELECT * FROM clientes where id='$id'";
         $res =  mysqli_query($this->con,$sql);
         $persona = mysqli_fetch_object($res);
         return $persona; 
    }

    public function validar($username,$password){
        $sql ="SELECT * FROM cuentas where `username`='$username' AND `password`='$password'";
        $res =  mysqli_query($this->con,$sql);
        $persona = mysqli_fetch_object($res);
        return $persona; 
   }

   public function count($tabla){
     $result=mysqli_query($this->con,"SELECT count(*) as total from $tabla");
     $data=mysqli_fetch_assoc($result);
     $total = $data['total'];
     return $total;
   }

   public function countStatus($tabla,$status){
   //segun el estatus se devuelve la conulta con el conteo de los usuarios activos o inactivos
    if($status){
       $stat = "1";     
    }else{
       $stat="0"; 
    }

    $result=mysqli_query($this->con,"SELECT count(*) as total from $tabla where `status_id` = '$stat'");
    $data=mysqli_fetch_assoc($result);
    $total = $data['total'];
    return $total;
  }


    public function full_record($tabla){
        $sql ="SELECT * FROM $tabla";
 
        $result = mysqli_query($this->con,$sql);
        
        return $result; 
   }


    public function update($nombres,$apellidos,$telefono,$direccion,$correo_electronico,$id){
        $sql = "UPDATE clientes SET nombres='$nombres',
        apellidos='$apellidos', telefono='$telefono', direccion='$direccion',
        correo_electronico='$correo_electronico' WHERE id=$id";
        $res = mysqli_query($this->con, $sql);
        if($res){
            echo "<script language='JavaScript'>";
            echo "alert('Cliente modificado con exito!');";
            echo "</script>";
            return true;    
        }else{
            echo "<script language='JavaScript'>";
            echo "alert('fallo al guardar!');";
            echo "</script>";
            return false;    
        }
    }

    public function delete($id){
        $sql="DELETE FROM clientes WHERE id=$id";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;    
        }else{
            return false;
        }
    }
    
}

?>