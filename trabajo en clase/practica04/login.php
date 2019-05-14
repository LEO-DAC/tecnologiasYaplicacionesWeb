<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD con PHP usando Progra,ación Orientada a Objetos</title>
 <title>CRUD a bd usando POO</title>

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
    <div class= "container">
       <div class = "table-wrapper">
            <div class= "table-title">
                <div class ="row">
                      <div class="col-sm-12"><center><h2>Tabla de <b>Clientes</b></center></h2></div>
 
                </div>
            </div>
            <div class ="row">
                      <div class="col-sm-4">
                           <a href="create.php" class="btn btn-info"><i
                           class=""></i>Agregar cliente   <span class='glyphicon glyphicon-plus'></span></a> 
                           <br><br> <br>           
                          <?php echo" <a href='logout.php' class='btn btn-success'> Salir <span class='glyphicon glyphicon-off'></span></a>"?> 
                           
                      </div>
            </div>
            <br>
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:80%">
						<thead>
							<tr>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Telefono</th>
								<th>Dirección</th>
                        <th>Correo eléctronico</th>
                        <th>Eliminar</th>
                        <th>Modificar</th>
							</tr>
						</thead>
                  <tbody>        
                     <?php
                     include ("database.php");
                     $clientes =  new Database();
                     // consulta para cargar la tabla que muestra los usuarios
                     $res = $clientes->full_record();
                     
                     foreach ($res->fetch_all(MYSQLI_ASSOC) as $value) {
                     ?>
                   <tr>
                     <td><?php echo $value['nombres'];?></td>
                     <td><?php echo $value['apellidos'];?></td>
                     <td><?php echo $value['telefono'];?></td>
                     <td><?php echo $value['direccion'];?></td>  
                     <td><?php echo $value['correo_electronico'];?></td>
                     <td> <?php echo" <a href='delete.php?id=$value[id]' onclick=' return confirmDelete()' class='btn btn-danger'> <span class='glyphicon glyphicon-trash'></span></a>"?> </td>
                     <td> <?php echo" <a href='Modificar.php?id=$value[id]' class='btn btn-success'><span class='glyphicon glyphicon-wrench'></span></a>"?> </td>
                  </tr>
                  <?php
                   }
                  ?>
                  </tbody>
					</table>
        </div>
   </div>
		  
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
   <script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>
	<!-- Full Screen Plugin -->
	<script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

	<!-- Data Tables -->
	<script src="assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
	<script src="assets/scripts/datatables.demo.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>

</body>
</html>