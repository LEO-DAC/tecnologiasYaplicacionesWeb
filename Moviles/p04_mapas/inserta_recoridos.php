<?php
	$servername = "localhost";
	$username = "leo";
	$dbname   = "p04_mapas";
	$password = "Besekyspod3124755";	

	$nombre    = $_POST['nombre'];
	$duracion  = $_POST['duracion'];	

	echo "Registro Recibido"."\n"."nombre: ".$nombre."\n duracion: ".$duracion."\n";	


	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 	
	

	$sql = "INSERT INTO recorridos (nombre,duracion)
	VALUES ('$nombre','$duracion')";

	if ($conn->query($sql) === TRUE) {
		echo "Registro Insertado de Manera Exitosa"."\n";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	die ('Finalizando...');

 
?>
