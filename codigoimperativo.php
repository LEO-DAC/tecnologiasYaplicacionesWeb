<?php
  //codigo imperativo espaguetti
  $automovil1 = (object)["marca"=>"Chevrolet","modelo"=>"Chevy"];
  $automovil2 = (object)["marca"=>"Ford","modelo"=>"Lobo"];
  $automovil3 = (object)["marca"=>"Honda","modelo"=>"CRV"];

  //función que muestra parametros para imprimir determinado automovil
  function mostrar($automovi){
      echo "<p> Hola soy un $automovi->marca, modelo $automovi->modelo </p>";   
  }
   
  mostrar($automovil1);
  mostrar($automovil2);
   

?>