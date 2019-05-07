<?php
  //definir clase para mostrar propiedades de libros
  class libro{
      public $titulo = "titulo del libro";
      public $autor ="autor del libro";  
      public $annoPublicacion="2019";
      public $numeroHojas ="Hojas por defecto de 234";
      public $editorial ="Editorial de UPV";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
 $libro1 = new Libro(); 
?>
<h1 align="center"><?php echo $libro1->titulo;?></h1>
<h1 align="center"><?php echo $libro1->autor;?></h1>
<h1 align="center"><?php echo $libro1->annoPublicacion;?></h1>
<h1 align="center"><?php echo $libro1->numeroHojas;?></h1>
<h1 align="center"><?php echo $libro1->editorial;?></h1>

<body>
    
</body>
</html>