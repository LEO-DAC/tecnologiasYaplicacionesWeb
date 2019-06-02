<?php
  //definir la clase persona
  class Persona{
      //definir propiedades
      public $edad;
      public $altura;
      public $peso;
      public $imc;  
      function Persona(){
         $edad = "";
         $altura="";
         $peso="";
         $imc="";
      }
      //definir Metodo obtención de datos
      //getters
      public function getEdad(){
          return $this->edad;
      }

      public function getPeso(){
          return $this->peso;
      }

      public function getAltura(){
          return $this->altura;
      }

      //Definir Métodos asignación de datos
      //seters
      public function setEdad($valor){
        $this->edad=$valor;
      }

      public function setAltura($valor){
          $this->altura = $valor;
      }

      public function setPeso($valor){
          $this->peso = $valor;
      }

      //Método de cálculo de IMC accediendo a las propiedades
      public function imc(){
           
          $imc = $this->peso/($this->altura * $this->altura);
        }
        
        
      //Método de cálculo de IMC accediendo mediante los metodos get
      public function imc2(){
        return $this->getPeso() / ($this->getAltura() * $this->getAltura());
      }


  function test_input($data) { 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


// funcion para insertar en la tabla de alumnos en la bd
function insertarEnBd(){
	/* Conexion con base de datos. */
	$conexion = new PDO('mysql:host=localhost;dbname=practicaClase;charset=UTF8', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    /* Se define la consulta SQL */
	$consulta = "INSERT INTO personas (edad,altura,peso,imc) VALUES (";
	$consulta .= "'$this->edad','$this->altura','$this->peso','$this->peso/($this->altura * $this->altura)');";
	
	/* Se efectúa la consulta. */
	$conexion->exec($consulta);

}
   // funcion que muestra el fomrulario de alumnos
function mostrarFormulario(){
?>
     <br><br>
     <h2>FORMULARIO </h2>  
     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Edad: <input type="number" name="edad" value="<?php echo $this->edad;?>">
        <br><br>
        Altura: <input type="number" name="altura" step="0.01" value="<?php echo $this->altura;?>">
        <br><br>
        Peso: <input type="number" name="peso" step="any" value="<?php echo $this->peso;?>">
        <br><br>
        <input type="submit" name="submitt" value="Submit">
     </form>

<?php
  }
  
    //funcion que se encarga de validar los campos del fomrulario
function validar(){
       $contDeErrores=0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["edad"])) {
                $contDeErrores++;
                } else {
                    $this->edad = $this->test_input($_POST["edad"]);
                }

                  if (empty($_POST["altura"])) {
                      $contDeErrores++;  
                    } else {
                        $this->altura = $this->test_input($_POST["altura"]);
                      }
                   
                    if (empty($_POST["peso"])) {
                            $contDeErrores++;
                            } else {    
                                $this->peso = $this->test_input($_POST["peso"]);
                                }                            

                    if($contDeErrores===0){
                        return true;
                    }else{
                        return false;
                    }                
        }
   }

   //metodo encargado de imprimir en pantalla los atributos
function toString(){
        echo "<h2>Personas:</h2>";
            /* Conexion con base de datos. */
            $conexion = new PDO('mysql:host=localhost;dbname=practicaClase;charset=UTF8', 'root', '');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if ($conexion){
           
                /* Se define la consulta SQL */
                $consulta = "SELECT * FROM personas;";           
                $stmt = $conexion->prepare($consulta);
                $stmt->execute(); 
        
                $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($arr as $row) {
                   echo "Edad: ".$row['edad'];
                   echo "   ";
                   echo "Peso: ".$row['peso'];
                   echo "   ";  
                   echo "Altura: ".$row['altura'];
                   echo "   ";
                   echo "IMC: ".$row['imc'];
                   echo "<br>";                  
                }

            } else {
                echo "Hubo un problema con la conexión";
            }
     }
 


 }
?>