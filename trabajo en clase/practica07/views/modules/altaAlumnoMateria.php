<div id="wrapper"><br>
    <div class="col-lg-8 col-md-10 col-xs-12">
      <div class="box-content">
        <center>
         <div class="card-content">
            <form class="form-horizontal" method="post">
               <div class="form-group">
                  <div class="col-sm-10">
                     <h3 class="box-title">Alta de alumno en materia</h3>
                      <label>Selecciona la materia: </label>
                       <?php
                       echo '<select name="id_materia" class="form-control" required>';
                          $materias = new MvcController();
                          $materias->mostrarMateriasController();
                        echo '</select><br>';    
                        $materias->MostrarProfesorAlumnoAlta(); 

                        echo'<button type="submit" name ="seleccionar" class="btn btn-primary btn-sm waves-effect waves-light">Seleccionar</button><br><br>';

                        echo'<label>Selecciona el alumno para agregar:</label>
                           <select name="id_alumno" class="form-control" required>';
                          $alumnos = new MvcController();
                          $alumnos->mostrarAlumnosController();      
                         echo'</select><br>';
                        

                     ?>
                    <button type="submit" name ="registrar"class="btn btn-success btn-sm waves-effect waves-light">Registrar</button><br>
               
                  </div>
               </div>  
            </form>
         </div>
       </center> 
      </div>
   </div>
</div>
 <?php
  //se crea una instancia para poder registrar a los usuarios y administradores del sistema  
  $controlador = new MvcController();
  $controlador->registrarAlumnoMateriaController();
  
?>