<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

<?php
  //Alumnos: matricula, nombre carrera email y teléfono.
  
  
  
  class Alumno{
     public $matricula;
     public $nombre;
     public $carrera;
     public $email;
     public $telefono;
     public $nameErr;
     public $emailErr;
     public $carreraErr;
     public $telErr;
     public $conexion;
     
     //constructor que inicializa las variables
     function Alumno(){
         $matricula ="";
         $nombre="";
         $carrera="";
         $email="";
         $telefono="";
         $nameErr="";
         $emailErr="";
         $carreraErr="";
         $telErr="";    
         $conexion="";
     }

     function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

function conexion(){
    $server = "localhost";
    $user = "root"; 
    $pass = "";

    //$conexion = new mysqli($server, $user, $pass);
    try{
      $conexion = new PDO('mysql:host=localhost;dbname=tarea02', $user, $pass);
      echo "conexion exitosa";
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

function insertarEnBd(){
	/* Conexion con base de datos. */
	$conexion = new PDO('mysql:host=localhost;dbname=tarea02;charset=UTF8', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	/* Se define la consulta SQL */
	$consulta = "INSERT INTO alumno (matricula,nombre,carrera,email,telefono) VALUES (";
	$consulta .= "'.$this->matricula.','$this->nombre','$this->carrera','$this->email','$this->telefono');";
	
	/* Se efectúa la consulta. */
	$conexion->exec($consulta);

}

   function mostrarFormulario(){

      echo "<br><br>";
      echo "<h2>FORMULARIO PARA ALUMNOS</h2>";  
?>

     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Matricula: <input type="text" name="matricula" value="<?php echo $this->matricula;?>">
        <br><br>
        Nombre: <input type="text" name="nombree" value="<?php echo $this->nombre;?>">
        <br><br>
        Carrera: <input type="text" name="carreraa" value="<?php echo $this->carrera;?>">
        <br><br>
        <span class="error">* <?php echo $this->nameErr;?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $this->email;?>">
        <span class="error">* <?php echo $this->emailErr;?></span>
        <br><br>
        Telefono: <input type="tel" name="telefonoo"value="<?php echo $this->telefono;?>">
        <br><br>
        <input type="submit" name="submitt" value="Submit">
     </form>

<?php
  }
  
    //funcion que se encarga de validar los campos del fomrulario
    function validar(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["matricula"])) {
                $this->matriculaErr = "La matricula es requerida";
                } else {
                    $this->matricula = $this->test_input($_POST["matricula"]);
                    // check if name only contains letters and whitespace
                    if (is_numeric($this->matricula)) {
                        $this->nameErr = "Solo se permiten numeros";
                    }
                }

            if (empty($_POST["nombree"])) {
            $this->nameErr = "El nombre es requerido";
            } else {
                $this->nombre = $this->test_input($_POST["nombree"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$this->nombre)) {
                    $this->nameErr = "Solo se permiten letras y espacios en blanco";
                }
            }

            if (empty($_POST["carreraa"])) {
                $this->nameErr = "La carrera es requerida";
                } else {
                    $this->carrera = $this->test_input($_POST["carreraa"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/",$this->carrera)) {
                        $this->carreraErr = "Solo se permiten letras y espacios en blanco";
                    }
                }

            if (empty($_POST["email"])) {
                $this->emailErr = "Email is required";
            } else {
                $this->email = $this->test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                    $this->emailErr = "Invalid email format";
                }
            }

            if (empty($_POST["telefonoo"])) {
                $this->telErr = "El telefono es requerido";
                } else {
                    $this->telefono = $this->test_input($_POST["telefonoo"]);
                    // check if name only contains letters and whitespace
                    if (is_numeric($this->telefono)) {
                        $this->telErr = "Solo se permiten numeros";
                    }
                }

    }
  }

   //metodo encargado de imprimir en pantalla los atributos
    function toString(){
        echo "<h2>Alumnos:</h2>";
            /* Conexion con base de datos. */
            $conexion = new PDO('mysql:host=localhost;dbname=tarea02;charset=UTF8', 'root', '');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            

            if ($conexion){
           
                /* Se define la consulta SQL */
                $consulta = "SELECT * FROM alumno;";           
                $stmt = $conexion->prepare($consulta);
                $stmt->execute(); 
        
                $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($arr as $row) {
                   echo $row['matricula'];
                   echo "  ";
                   echo $row['nombre'];
                   echo "  ";  
                   echo $row['carrera'];
                   echo "   ";  
                   echo $row['email'];
                   echo "  ";  
                   echo $row['telefono'];
                   echo "<br>";  
                   
                   
                }

            } else {
                echo "Hubo un problema con la conexión";
            }
     }
 }

  class Maestro{
      public $noEmpleado;
      public $carrera;
      public $nombre;
      public $telefono;
      public $numEmpErr;
      public $carreraErr;
      public $nombreErr;
      public $telErr;    
      public $conexion;

     
     //constructor que inicializa las variables
     function Maestro(){
        $noEmpleado ="";
        $carrera="";
        $nombre="";
        $telefono="";
        $numEmpErr="";
        $carreraErr="";
        $nombreErr="";
        $telErr="";    
        $conexion="";
    }

    function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
   }

function conexion(){
   $server = "localhost";
   $user = "root"; 
   $pass = "";

   //$conexion = new mysqli($server, $user, $pass);
   try{
     $conexion = new PDO('mysql:host=localhost;dbname=tarea02', $user, $pass);
    // echo "conexion exitosa";
   } catch (PDOException $e) {
       print "¡Error!: " . $e->getMessage() . "<br/>";
       die();
   }
}

function insertarEnBd(){
   /* Conexion con base de datos. */
   $conexion = new PDO('mysql:host=localhost;dbname=tarea02;charset=UTF8', 'root', '');
   $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
   /* Se define la consulta SQL */
   $consulta = "INSERT INTO maestro (noEmpleado,carrera,nombre,telefono) VALUES (";
   $consulta .= "'$this->noEmpleado','$this->carrera','$this->nombre','$this->telefono');";
   
   /* Se efectúa la consulta. */
   $conexion->exec($consulta);

}

  function mostrarFormulario(){
      
    echo "<br><br>";
    echo "<h2>FORMULARIO PARA PROFESORES</h2>";
?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
       noEmpleado: <input type="text" name="noEmpleado" value="<?php echo $this->noEmpleado;?>">
       <br><br>
       Carrera: <input type="text" name="carrera" value="<?php echo $this->carrera;?>">
       <br><br>
       Nombre: <input type="text" name="nombre" value="<?php echo $this->nombre;?>">
       <br><br>
       <span class="error">* <?php echo $this->nombreErr;?></span>
       <br><br>
       Telefono: <input type="tel" name="telefono"value="<?php echo $this->telefono;?>">
       <br><br>
       <input type="submit" name="submit" value="Submit">
    </form>

<?php
 }
 
   //funcion que se encarga de validar los campos del fomrulario
   function validar(){
       if ($_SERVER["REQUEST_METHOD"] == "POST") {

           if (empty($_POST["noEmpleado"])) {
               $this->numEmpErr = "El numero de empleado es requerido";
               } else {
                   $this->noEmpleado = $this->test_input($_POST["noEmpleado"]);
                   // check if name only contains letters and whitespace
                   if (is_numeric($this->noEmpleado)) {
                       $this->numEmpErr = "Solo se permiten numeros";
                   }
               }

           if (empty($_POST["nombre"])) {
           $this->nameErr = "El nombre es requerido";
           } else {
               $this->nombre = $this->test_input($_POST["nombre"]);
               // check if name only contains letters and whitespace
               if (!preg_match("/^[a-zA-Z ]*$/",$this->nombre)) {
                   $this->nameErr = "Solo se permiten letras y espacios en blanco";
               }
           }

           if (empty($_POST["carrera"])) {
               $this->carreraErr = "La carrera es requerida";
               } else {
                   $this->carrera = $this->test_input($_POST["carrera"]);
                   // check if name only contains letters and whitespace
                   if (!preg_match("/^[a-zA-Z ]*$/",$this->carrera)) {
                       $this->carreraErr = "Solo se permiten letras y espacios en blanco";
                   }
               }

           if (empty($_POST["telefono"])) {
               $this->telErr = "El telefono es requerido";
               } else {
                   $this->telefono = $this->test_input($_POST["telefono"]);
                   // check if name only contains letters and whitespace
                   if (is_numeric($this->telefono)) {
                       $this->telErr = "Solo se permiten numeros";
                   }
               }

   }
 }

  //metodo encargado de imprimir en pantalla los atributos
   function toString(){
       echo "<br><br><br>";
       echo "<h2>Maestros:</h2>";
           /* Conexion con base de datos. */
           $conexion = new PDO('mysql:host=localhost;dbname=tarea02;charset=UTF8', 'root', '');
           $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           

           if ($conexion){
          
               /* Se define la consulta SQL */
               $consulta = "SELECT * FROM maestro;";           
               $stmt = $conexion->prepare($consulta);
               $stmt->execute(); 
       
               $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
               foreach ($arr as $row) {
                  echo $row['noEmpleado'];
                  echo "  ";
                  echo $row['carrera'];
                  echo "  ";  
                  echo $row['nombre'];
                  echo "   ";  
                  echo $row['telefono'];
                  echo "<br>";  
                  
                  
               }
            

           } else {
               echo "Hubo un problema con la conexión";
           }
    }

  }
  //Maestros: no. empleado, carrera, nombre, teléfono.


$alumno = new Alumno();
$maestro = new Maestro();

$maestro->conexion();
$alumno->conexion();


$alumno->mostrarFormulario();
$maestro->mostrarFormulario();


$alumno->validar();
$maestro->validar();

$alumno->insertarEnBd();
$maestro->insertarEnBd();


$alumno->toString();
$maestro->toString();
?>



</body>
</html>