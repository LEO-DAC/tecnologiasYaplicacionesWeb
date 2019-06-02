<?php
  #CLASE
  // una clase es un modelo que se utiliza para crear objetos que comparten un mismo comportamiento
  class Automovil{
    //PROPIEDADES: son las caracteristicas que puede tener un objeto.
    public $marca;
    public $modelo;
    //METODOS: es el algoritmo asociado a un objeto que indica la capacidad de lo que este puede hacer, 
    //la unica diferencia entre el metodo y la funcion es que llamamos al metodo a FUNCIONES de una clase(en POO)
    // mientras que llamamos funciones a los algoritmos de la programación estructurada.

    public function mostrar(){
        echo "<p> Hola, soy un $this->marca,modelo $this->modelo</p>";
    }

  }

  #OBJETO: es una entidas provista de métodos o mensajes a los cuales responde propiedades con valores concretos.
  $a =  new Automovil();
  $a->marca ="Chevrolet";
  $a->modelo = "Chevy";
  $a->mostrar();


  $b =  new Automovil();
  $b->marca ="Ford";
  $b->modelo = "Lobo";
  $b->mostrar();

  $c =  new Automovil();
  $c->marca ="Honda";
  $c->modelo = "CRV";
  $c->mostrar();

  // principios de la programación orientada a objetos que se cumplen en este ejemplo:
  
  //1. ABSTRACCIÓN: Nuevos tipos de datos (el quieras lo creas.)
  //2. ENCAPSULACIÓN: Organiza el código en grupos lógicos.
  //3. Ocultamiento: Oculta detalles de implementacipión 
?>