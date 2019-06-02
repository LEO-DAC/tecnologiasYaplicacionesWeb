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


<!-- Main Styles -->
<link rel="stylesheet" href="assets/styles/style.min.css">
<!-- mCustomScrollbar -->
<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">
<!-- Waves Effect -->
<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">
<!-- Sweet Alert -->
<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">
<!-- Jquery UI -->
<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.structure.min.css">
<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.theme.min.css">
<!-- Dark Themes -->
<link rel="stylesheet" href="assets/styles/style-black.min.css">

</head>

<body>
    <div class= "container">
       <div class = "table-wrapper">
            <div class= "table-title">
                <div class ="row">
                      <div class="col-sm-8"><h2>Agregar <b>Cliente</b></h2></div>
                      <div class="col-sm-4">
                           <a href="login.php" class="btn btn-info add-new"><i
                           class="fa fa-arrow-left"></i>Regresar</a> 
                      </div>
                </div>
            </div>
            <?php
            include ("database.php"); //se incluye la clase para crear la conexion con la bd
            $clientes =  new Database(); //se cera instancia 
            if (isset($_POST) && !empty($_POST)) {  //se validan los campos del formulario
              $nombres = $clientes->sanitize($_POST['nombres']);
              $apellidos = $clientes->sanitize($_POST['apellidos']);
              $telefono = $clientes->sanitize($_POST['telefono']);
              $direccion= $clientes->sanitize($_POST['direccion']);
              $correo_electronico = $clientes->sanitize($_POST['correo_electronico']);
              // se crea un usuario con in insert
              $res = $clientes->create($nombres,$apellidos,$telefono,$direccion,$correo_electronico);
              if ($res) {
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
            <label>Nombres:</label>
            <input type="text" name="nombres" id="nombres" class='form-control' maxlenght="100" required >
         </div>
         <div class="col-md-6">
            <label>Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" class='form-control' maxlenght="100" required>  
         </div>
         <div class="col-md-12">
            <label>Dirección:</label> 
            <textarea name="direccion" id="direccion" class='form-control' maxlenght="255" required></textarea>
         </div>
         <div class="col-md-6">
            <label>Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class='form-control' maxlenght="15" required>
         </div>
         <div class="col-md-6">
            <label>Correo electrónico:</label>
            <input type="email" name="correo_electronico" id="correo_electronico" class='form-control' maxlenght ="64" required>
         
         </div>
         
         <div class ="col-md-12 pull-right">
          <hr>
            <button type="submit" class="btn btn-success">Guardar datos</button>
         </div>
         </form>
       </div>
    </div>
  </div>


  <script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>
	<!-- Full Screen Plugin -->
	<script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>
	<!-- Jquery UI -->
	<script src="assets/plugin/jquery-ui/jquery-ui.min.js"></script>
	<script src="assets/plugin/jquery-ui/jquery.ui.touch-punch.min.js"></script>
	<script src="assets/scripts/main.min.js"></script>
</body>
</html>