<div id="wrapper"><br>
    <div class="col-lg-8 col-md-10 col-xs-12">
      <div class="box-content">
        <center>
         <div class="card-content">
            <form class="form-horizontal" method="post">
               <div class="form-group">
                  <div class="col-sm-10">
                     <h3 class="box-title">Registrar grupo</h3>
                     <select name="id_carrera" class="form-control" required>
                      <?php  echo'<option disabled selected>Selecciona la carrera</option>';
                          $carreras = new MvcController();
                          $carreras->mostrarCarrerasController();  
                      ?> 
                      </select> <br>
                     <select name="cuatrimestre" class="form-control" required>
                      <?php  echo'<option disabled selected>Selecciona el cuatrimestre</option>';?>
                        <option value="1">1er</option>
                        <option value="2">2do</option>
                        <option value="3">3er</option>
                        <option value="4">4to</option>
                        <option value="5">5to</option>
                        <option value="6">6to</option>
                        <option value="7">7mo</option>
                        <option value="8">8vo</option>
                        <option value="9">9no</option>
                     </select> <br>
                     <button type="submit" name ="registrar"class="btn btn-primary btn-sm waves-effect waves-light">Registrar</button>
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
  $controlador->registrarGrupoController();
  
?>