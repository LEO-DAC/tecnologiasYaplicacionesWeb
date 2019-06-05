<div id="wrapper"><br>
    <div class="col-lg-8 col-md-10 col-xs-12">
      <div class="box-content">
        <center>
         <div class="card-content">
            <form class="form-horizontal" method="post">
               <div class="form-group">
                  <div class="col-sm-10">
                     <h3 class="box-title">Alta de alumno en materia</h3>
                       <?php
                       $status="required";
                       if(isset($_POST["seleccionar"])){
                            $status="";    
                       }
                       echo '<select name="id_materia_select" class="form-control" '.$status.' >';
                       echo'  <option disabled selected>Selecciona una materia</option>';
                          $materias = new MvcController();
                          $materias->mostrarMateriasController();
                        echo '</select><br>';    
                        echo'<select name="id_alumno_select" class="form-control" '.$status.'>';
                        echo'  <option disabled selected>Selecciona una alumno</option>';
                          $alumnos = new MvcController();
                          $alumnos->mostrarAlumnosController();      
                        echo'</select><br>';
                        echo'<button type="submit" name ="seleccionar"  class="btn btn-primary btn-sm waves-effect waves-light" required>Seleccionar</button><br><br>';
                          $materias->MostrarProfesorAlumnoAlta(); 
                          $materias->MostrarAlumnoAlta(); 
  

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
  $controlador->registrarAlumnoMateriaController();
  
?>