<div id="wrapper"><br>
    <div class="col-lg-8 col-md-10 col-xs-12">
      <div class="box-content">
        <center>
         <div class="card-content">
            <form class="form-horizontal" method="post">
               <div class="form-group">
                  <div class="col-sm-10">
                     <h3 class="box-title">Agregar alumno a tutoria</h3>
                       <?php

                       echo '<select name="id_tutoria" class="form-control" >';
                       echo'  <option disabled selected>Selecciona una tutoria</option>';
                          $tutorias = new MvcController();
                          $tutorias->mostrarTutoriasController();
                        echo '</select><br>';    
                        echo'<select name="id_alumno" class="form-control">';
                        echo'  <option disabled selected>Selecciona una alumno</option>';
                          $alumnos = new MvcController();
                          $alumnos->mostrarAlumnosController();      
                        echo'</select><br>';
                        echo'<button type="submit" name ="registrar"  class="btn btn-primary btn-sm waves-effect waves-light" required>Registrar</button><br><br>';
                     ?>
               
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
  $controlador->registrarTutoriaAlumnoController();
  
?>