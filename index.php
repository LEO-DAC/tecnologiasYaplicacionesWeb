<?php
    //icluir la clase
    include "Persona.php";
  //instanciar la clase
  $persona = new Persona();

  //asignar valores a las propiedades del objeto

  $persona->setEdad(30);
  $persona->setPeso(80);
  $persona->setAltura(1.80);

  //impresiones de los resultados
  echo "<br> Edad:".$persona->edad;
  echo "<br> Altura:".$persona->altura;
  echo "<br> Peso:".$persona->peso;
  echo "<br> IMC:".$persona->imc();
?>