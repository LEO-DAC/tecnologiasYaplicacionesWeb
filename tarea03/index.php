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
    include "Alumno.php";

    //clase para manejar datos de alumnos
    
    //contador para controlar el arreglo y el ciclo

        //instancia la clase alumno y se manda llamar al metodo para mostrar el formulario
        $alumno1= new Alumno();
        $alumno1->mostrarFormulario();   
        $alumno1->validar();         
        $alumno1->calcularPromedio();   
        $alumno1->toString();

  ?>

</body>
</html>

