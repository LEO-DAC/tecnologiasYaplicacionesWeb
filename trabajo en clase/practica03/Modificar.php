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
                      <div class="col-sm-8"><h2>Modificar <b>Cliente</b></h2></div>

                </div>
            </div>
            <?php
            include ("database.php");

            $id = $_GET['id'];

            $clientes =  new Database();
            // se recupera el usuario el cual será modificado usando el id
            $cliente = $clientes->single_record($id);

            if (isset($_POST) && !empty($_POST)) {
              $nombres = $clientes->sanitize($_POST['nombres']);
              $apellidos = $clientes->sanitize($_POST['apellidos']);
              $telefono = $clientes->sanitize($_POST['telefono']);
              $direccion= $clientes->sanitize($_POST['direccion']);
              $correo_electronico = $clientes->sanitize($_POST['correo_electronico']);
              // se crea un update a la bd despues de modificar los datos
              $res = $clientes->update($nombres,$apellidos,$telefono,$direccion,$correo_electronico,$id);
              //se manda mensaje de alerta depues de modificar el usulsario
              if ($res) {
                $message = "Datos modificados con éxito";
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
            <label>Nombres:</label>
            <?php echo "<input type='text' name='nombres' id='nombres' value='$cliente[nombres]' class='form-control' maxlenght='100' required >";?>
         </div>
         <div class="col-md-6">
            <label>Apellidos:</label>
            <?php echo "<input type='text' name='apellidos' id='apellidos' class='form-control' value='$cliente[apellidos]' maxlenght='100' required>";?> 
         </div>
         <div class="col-md-12">
            <label>Dirección:</label> 
           <?php echo "<textarea name='direccion' id='direccion' class='form-control' placeholder='$cliente[direccion]' maxlenght='255' required></textarea>";?>
         </div>
         <div class="col-md-6">
            <label>Teléfono:</label>
            <?php echo "<input type='text' name='telefono' id='telefono' class='form-control' value='$cliente[telefono]' maxlenght='15' required>";?>
         </div>
         <div class="col-md-6">
            <label>Correo electrónico:</label>
            <?php echo "<input type='email' name='correo_electronico' id='correo_electronico' class='form-control' value='$cliente[correo_electronico]' maxlenght ='64' required>";?>
         
         </div>
         
         <div class ="col-md-12 pull-right">
          <hr>
            <button type="submit" class="btn btn-success">Guardar datos</button>
            <a href="index.php" type="submit" class="btn btn-primary">Regresar</a>
         </div>

         </form>
       </div>
    </div>
  </div>
</body>
</html>