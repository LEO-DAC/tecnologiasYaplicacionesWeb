<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD con PHP usando Progra,ación Orientada a Objetos</title>
 <title>CRUD a bd usando POO</title>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="css/custom.css">
 <script crs="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script crs="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  


</head>

<body>
    <div class= "container">
       <div class = "table-wrapper">
            <div class= "table-title">
                <div class ="row">
                      <div class="col-sm-8"><h2>Agregar <b>futbolista</b></h2></div>
                      <div class="col-sm-4">
                           <a href="random.php" class="btn btn-info add-new"><i
                           class="fa fa-arrow-left"></i>Regresar</a> 
                      </div>
                </div>
            </div>
            <?php
            if (isset($_POST) && !empty($_POST)) {  //se validan los campos del formulario

              $nombre = $_POST['nombre'];
              $posicion = $_POST['posicion'];
              $carrera = $_POST['carrera'];
              $email = $_POST['email'];

            /* Conexion con base de datos. */
            $conexion = new PDO('mysql:host=localhost;dbname=tarea03;charset=UTF8', 'root', '');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
            /* Se define la consulta SQL */
            $consulta = "INSERT INTO futbolista (nombre,posicion,carrera,email) VALUES (";
            $consulta .= "'$nombre','$posicion','$carrera','$email');";
            /* Se efectúa la consulta. */
            //$conexion->exec($consulta);
          // se verifica si la inserción fue exitosa
              if($conexion->exec($consulta)){
                $message = "Datos insertados con éxito";
                $class = "alert alert-success";
              }else{
                $message="No se pudieron insertar los datos";
                $class="alert alert-danger";
              }
             ?>
           
           <div class="<?php echo $class?>">
             <?php echo $message;?>
           </div>
              <?php
          }
        
        
        ?>
        <div class="row">
         <form method="post">
         <div class="col-md-6">
            <label>Nombre:</label>
            <input type="text" name="nombre" id="nombre" class='form-control' maxlenght="100" required >
         </div>
         <div class="col-md-6">
            <label>Posición:</label>
            <input type="text" name="posicion" id="posicion" class='form-control' maxlenght="100" required>  
         </div>
         <div class="col-md-6">
            <label>Carrera:</label>
            <input type="text" name="carrera" id="carrera" class='form-control' maxlenght="100" required>  
         </div>

         <div class="col-md-6">
            <label>Email:</label>
            <input type="email" name="email" id="email" class='form-control' maxlenght ="64" required>
         
         </div>
         
         <div class ="col-md-12 pull-right">
          <hr>
            <button type="submit" class="btn btn-success">Guardar datos</button>
         </div>
         </form>
       </div>
    </div>
  </div>
</body>
</html>