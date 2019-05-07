<?php
  //definir la clase persona
  class Persona{
      //definir propiedades
      public $edad;
      public $altura;
      public $peso;

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
          return $this->peso/($this->altura * $this->altura);
        }
        
        
      //Método de cálculo de IMC accediendo mediante los metodos get
      public function imc2(){
        return $this->getPeso() / ($this->getAltura() * $this->getAltura());
      }

   }
?>