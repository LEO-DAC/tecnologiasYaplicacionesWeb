<?php

class Promedio{
        public $nombre;
        public $calif1;
        public $calif2;
        public $calif3;
        public $promedio;

        function Promedio(){
             $nombre="";
             $calif1="";
             $calif2="";
             $calif3="";
             $promedio="";

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


         //metodo para imprmir los datos del objeto   
        function toString(){
            echo "<br><br><br>";
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


        //metodo que calcula el promedio de las calificaciones

         function calcularPromedio(){
            if($this->getCalif1()<=60 || $this->getCalif2()<=60 || $this->getCalif3()<=60  ){
               $this->promedio = 60;
            }else{
                $this->promedio=($this->getCalif1()+$this->getCalif2()+$this->getCalif3())/3;
            }
        }
    
    }
    ?>