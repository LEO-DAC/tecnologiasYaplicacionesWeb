<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Práctica 7</title>
<?php include_once('modules/links-superiores.php');?>
</head>
<?php include_once('modules/navegacion.php');?>

<script type="text/javascript">
   // codigo js para crear alerta en caso de eliminar cliente
   function confirmDeleteRegistro(){
      var respuesta = confirm("¿Estas seguro de borrar  a este registro?");

      if(respuesta == true){
          return true;
      }else{
        return false;
      }

   }
</script>
<body>

	<?php 
	   $mvc = new MvcController();
	   $mvc -> enlacesPaginasController();
	 ?>
</body>

<?php include_once('modules/links-inferiores.php');?>
</html>