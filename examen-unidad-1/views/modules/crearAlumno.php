<!DOCTYPE html>
<html>
<head>
	<title>crear Alumno</title>
</head>
<body>
   <center>
	<h2>Crear alumno</h2>
   <form method="post">
   				
   		<input type="number"  min="7" name="matricula" placeholder="matricula" required><br><br>
   		<input type="text" name="nombres" placeholder="nombres" required ><br><br>
   		<input type="text" name="apellidos" placeholder="apellidos" required><br><br>

   		<select name="carrera" required>
   			<option>Ingenieria en tecnologias de la información</option>
   			<option>Ingenieria en mecatronica</option>
   			<option>Ingenieria en Manufactura</option>
   			<option>Inenieria en mecanica automotriz</option>
   			<option>Licenciatua en gestion de pequeñas y medianas empresas</option>
   		</select><br><br>
         <label>selecciona el año de ingreso: </label>
         <select name="id_anio_ingreso" required>
            <?php
                $crearAlumno = new MVC();
                 $crearAlumno->mostrarIngresosController(); 
            ?>
         </select><br><br>
         <label>selecciona el grupo: </label>
         <select name="id_grupo" required>
            <?php
                 $crearAlumno->mostrarGruposController(); 
            ?>
         </select><br><br>
         <button name="crear" type="submit" >crear</button>
   </form>
   </center>
   <?php
      $crearAlumno->crearAlumno();
    ?>
</body>
</html>