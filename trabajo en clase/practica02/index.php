<?php
include "Persona.php";
 //se declara un objeto de la clase persona
$persona1 =  new Persona();

$persona1->mostrarFormulario();
//se valida el formulario
if($persona1->validar()){

    //se inserta a la base de datos si se cumplen con las validaciones
    $persona1->insertarEnBd();
}
//se consultan a la base de datos y se imprimen en panatlla los datos
$persona1->toString();
?>