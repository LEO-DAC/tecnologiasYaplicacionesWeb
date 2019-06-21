<html>
<head>
	<title>crear grupo</title>
</head>
<body>
   <center>
	<h2>Crear grupo</h2>
   <form method="post">
   	  <label>selecciona el cuatrimestre:</label>			
   	  <select name="cuatrimestre" required>
            <option >1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
        </select>	
         <br><br>
   		<input type="text" name="nombre" placeholder="nombre" required ><br><br>
         <button name="crear" type="submit" >crear</button>
   </form>
   </center>
    <?php
      $crearGrupo = new MVC();
      $crearGrupo->crearGrupo();
    ?>
</body>
</html>