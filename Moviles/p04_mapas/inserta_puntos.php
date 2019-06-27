<?php
	$servername = "localhost";
	$username = "leo";
	$dbname   = "p04_mapas";
	$password = "Besekyspod3124755";	

	$nombre    = $_POST['nombre'];
	$latitud   = $_POST['latitud'];
	$longitud  = $_POST['longitud'];
	$longitud  = $_POST['id'];
	
	echo "Registro Recibido"."\n"."Nombre: ".$nombre."\n latitud: ".$latitud."\n longitud: ".$longitud."\n";	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 	
	

	$sql = "INSERT INTO puntos (nombre,latitud,longitud,id) VALUES ('$nombre','$latitud','$longitud','id')";

	if ($conn->query($sql) === TRUE) {
		echo "Registro Insertado de Manera Exitosa"."\n";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	die ('Finalizando...');

 
?>
