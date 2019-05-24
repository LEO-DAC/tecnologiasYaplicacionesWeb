<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Práctica 6</title>
<?php include_once('modules/links-superiores.php');?>
</head>
<?php include_once('modules/navegacion.php');?>
<body>

	<?php 
	   $mvc = new MvcController();
	   $mvc -> enlacesPaginasController();
	 ?>
</body>

<?php include_once('modules/links-inferiores.php');?>
</html>