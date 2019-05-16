<?php
include_once('utilities.php');
$type[] = ' ';
$type[] = 'success';
$type[] = 'secondary';
$type[] = 'alert';
$type[] = 'info';
$type[] = 'disabled';
$random_type = array_rand($type);
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>

    	<!-- Main Styles -->
	<link rel="stylesheet" href="assets/styles/style.min.css">
<!-- mCustomScrollbar -->
<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">
<!-- Waves Effect -->
<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">
<!-- Sweet Alert -->
<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">
<!-- Data Tables -->
<link rel="stylesheet" href="assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">
<!-- Dark Themes -->
<link rel="stylesheet" href="assets/styles/style-black.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="css/custom.css">
 <script crs="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script crs="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  

  </head>
  <script type="text/javascript">
   // codigo js para crear alerta en caso de eliminar usuario
   function confirmDelete(){
      var respuesta = confirm("¿Estas seguro de borrar  a este cliente?");

      if(respuesta == true){
          return true;
      }else{
        return false;
      }

   }
</script>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-9 columns">
        <h3>Array random</h3>
          <p>Color al azar</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <a href="create.php" class="button <?php echo $type[$random_type]; ?>">Agregar futbolista</a>
            </div>
            <br>
            </div>
              <a href="create_basquet.php" class="button <?php echo $type[$random_type]; ?>">Agregar basquetbolista</a>
            </div>
          </section>
        </div>
      </div>
      <br><br>

      <div class="col-sm-12">   
			<div class= "row">
            <div class = "box-content">
                     <!-- /.dropdown js__dropdown -->
            <h2>Futbolistas</h2>
        	<table id="example" class="table table-striped table-bordered display" style="width:80%">
                     <thead>
                        <tr>
                           <th>Nombre</th>
                           <th>Posición</th>
                           <th>Carrera</th>
                           <th>Email</th>
                           <th>Eliminar</th>
                           <th>Modificar</th>
                        </tr>
                     </thead>
                     <tbody>        
                          <?php
                          /* Conexion con base de datos. */
                          $conexion = new PDO('mysql:host=localhost;dbname=tarea03;charset=UTF8', 'root', '');
                          $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                          $tabla = 'futbolista';               
                          $sql = 'SELECT * FROM futbolista';
                         
                          foreach ($conexion->query($sql) as $row) {
                        ?>
                     <tr>
                        <td><?php echo $row['nombre'];?></td>
                        <td><?php echo $row['posicion'];?></td>
                        <td><?php echo $row['carrera'];?></td>
                        <td><?php echo $row['email'];?></td>  
                        <td> <?php echo" <a href='delete.php?tabla=$tabla&id=$row[id]' onclick=' return confirmDelete()' class='btn btn-danger'> <span class='glyphicon glyphicon-trash'></span></a>";?> </td>
                        <td> <?php echo" <a href='modificar.php?tabla=$tabla&id=$row[id]' class='btn btn-success'><span class='glyphicon glyphicon-wrench'></span></a>";?> </td>
                     </tr>
                     <?php
                     }
                     ?>
                     </tbody>
                  </table>
                  <br><br>   
                  <h2>Basquetbolistas</h2>    
                  <table id="example" class="table table-striped table-bordered display" style="width:80%">
                     <thead>
                        <tr>
                           <th>Nombre</th>
                           <th>Posición</th>
                           <th>Carrera</th>
                           <th>Email</th>
                           <th>Eliminar</th>
                           <th>Modificar</th>
                        </tr>
                     </thead>
                     <tbody>        
                          <?php
                          /* Conexion con base de datos. */
                          $conexion = new PDO('mysql:host=localhost;dbname=tarea03;charset=UTF8', 'root', '');
                          $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                          $tabla = 'basquetbolista';               
                          $sql = 'SELECT * FROM basquetbolista';
                         
                          foreach ($conexion->query($sql) as $row) {
                        ?>
                     <tr>
                        <td><?php echo $row['nombre'];?></td>
                        <td><?php echo $row['posicion'];?></td>
                        <td><?php echo $row['carrera'];?></td>
                        <td><?php echo $row['email'];?></td>  
                        <td> <?php echo" <a href='delete.php?tabla=$tabla&id=$row[id]' onclick=' return confirmDelete()' class='btn btn-danger'> <span class='glyphicon glyphicon-trash'></span></a>";?> </td>
                        <td> <?php echo" <a href='modificar2.php?tabla=$tabla&id=$row[id]' class='btn btn-success'><span class='glyphicon glyphicon-wrench'></span></a>";?> </td>
                     </tr>
                     <?php
                     }
                     ?>
                     </tbody>
                  </table>

                </div> 
            </div>
         </div>	



    <?php require_once('footer.php'); ?>