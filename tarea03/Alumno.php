<?php

class Alumno{
        public $nombre;
        public $calif1;
        public $calif2;
        public $calif3;
        public $promedio;

        public $nameErr;
        public $calif1Err;
        public $calif2Err;
        public $calif3Err;

        function Alumno(){
             $nombre="";
             $calif1="";
             $calif2="";
             $calif3="";
             $promedio="";
             $nameErr="";
             $calif1Err="";
             $calif2Err="";
             $calif3Err="";
        }
        //metodos set para modificar los valores de los atributos
        public function setNombre ($valor){
           $this->nombre=$valor;  
        }
        
        public function setCalif1($valor){
            $this->calif1 = $valor; 
         }
         
        public function setCalif2 ($valor){
            $this->calif2 = $valor; 
         }

         
        public function setCalif3 ($valor){
            $this->calif3 = $valor; 
         }
         
        public function setPromedio ($valor){
            $this->promedio = $valor; 
         }

        
         //metodos get para obtener los datos de los atributos
        public function getNombre(){
            return $this->nombre;
        }         

        public function getCalif1(){
            return $this->calif1;
        }

        public function getCalif2(){
            return $this->calif2;
        }

        public function getCalif3(){
            return $this->calif3;
        }

        public function getPromedio(){
            return $this->promedio;
        }



        function toString(){
            echo "Nombre:         ".$this->getNombre();
            echo "<br><br>";
            echo "Calificación 1: ".$this->getCalif1();
            echo "<br><br>";
            echo "Calificación 2: ".$this->getCalif1();
            echo "<br><br>";
            echo "Calificación 3: ".$this->getCalif3();
            echo "<br><br>";
            echo "Promédio:       ".$this->getPromedio();

        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

            //funcion que se encarga de validar los campos del fomrulario
        function validar(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nombre"])) {
               $this->nameErr = "El nombre es requerido";
               return false;
             }else{
                if (!preg_match("/^[a-zA-Z ]*$/",$this->nombre)) {
                    $this->nameErr = "Only letters and white space allowed";
                    return false;
                }else{
                    $this->nombre = $this->test_input($_POST["nombre"]);
                }
             }
        
            if (empty($_POST["calif1"])) {
                 $this->calif1Err = "La calificación es requerida";
                 return false;
               }else{
                 
                $this->calif1= $this->test_input($_POST["calif1"]);  
                 // check if name only contains letters and whitespace
                 if (!is_numeric($this->calif1)) {
                    $this->calif1Err = "solo se permiten numeros en este campo";
                    return false;
                }
             }
             if (empty($_POST["calif2"])) {
                $this->calif2Err = "La calificación es requerida";
                return false;
                }else{
                    $this->calif2 = $this->test_input($_POST["calif2"]);
     
                  // check if name only contains letters and whitespace
                  if (!is_numeric($this->calif2)) {
                     $this->calif2Err = "solo se permiten números en este campo";
                     return false;
                 }
                         }
              if (empty($_POST["calif3"])) {
                $this->calif3Err = "La calificación es requerida";
                return false;
                }else{

                    $this->calif3 = $this->test_input($_POST["calif3"]);
                    // check if name only contains letters and whitespace
                  if (!is_numeric($this->calif3)) {
                     $this->calif3Err = "solo se permiten numeros en este campo";
                     return false;
                    }         
                }

              return true;

        }else{
            return false;
        }
    }


        //metodo que calcula el promedio de las calificaciones

         function calcularPromedio(){
            if($this->getCalif1()<=6 || $this->getCalif2()<=6 || $this->getCalif3()<=6  ){
               $this->promedio = 6;
            }else{
                $this->promedio=($this->getCalif1()+$this->getCalif2()+$this->getCalif3())/3;
            }
        }
    
       function mostrarFormulario(){
    ?>
        <center>
        <h2>Formulario para agregar alumnos</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
               Nombre: <input type="text" name="nombre" value="<?php echo $this->nombre;?>">
               <span class="error">* <?php echo $this->nameErr;?></span>
                <br><br>
               Calificación 1: <input type="number" name="calif1" value="<?php echo $this->calif1?>">
               <span class="error">* <?php echo $this->calif1Err;?></span>
               <br><br>
               Calificación 2: <input type="number" name="calif2" value="<?php echo $this->calif2?>">
               <span class="error">* <?php echo $this->calif2Err;?></span>
               <br><br>
               Calificación 3: <input type="number" name="calif3" value="<?php echo $this->calif3?>">
               <span class="error">* <?php echo $this->calif3Err;?></span>
               <br><br>
               <input type="submit" name="guardar" value="guardar">
            <br><br>
        </form>
        </center>

    <?php
      }

    }
    ?>