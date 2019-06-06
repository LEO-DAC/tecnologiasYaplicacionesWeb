<div id="wrapper"><br>
    <div class="col-lg-8 col-md-10 col-xs-12">
      <div class="box-content">
        <center>
         <div class="card-content">
            <form class="form-horizontal" method="post">
               <div class="form-group">
                  <div class="col-sm-10">
                     <h3 class="box-title">Alta de materia en grupo</h3>
                       <?php
                       echo '<select name="id_grupo" class="form-control" required>';
                       echo'  <option disabled selected>Selecciona una grupo</option>';
                          $grupos = new MvcController();
                          $grupos->mostrarGruposController();
                        echo '</select><br>';    
                        echo'<select name="id_materia" class="form-control" required>';
                         echo'  <option disabled selected>Selecciona una materia</option>';
                          $alumnos = new MvcController();
                          $alumnos->mostrarMateriasController();      
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
  $controlador->registrarGrupoMateriaController();
  
?>