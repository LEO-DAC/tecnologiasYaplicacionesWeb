
<div id="wrapper"><br>
    <div class="col-lg-8 col-md-10 col-xs-12">
      <div class="box-content">
        <center>
         <div class="card-content">
            <form class="form-horizontal" method="post">
               <div class="form-group">
                  <div class="col-sm-10">
                     <h3 class="box-title">Registrar materia</h3>
                     <input id="ig-1" type="text" name="clave" class="form-control" placeholder="clave" required><br>
                     <select name="id_profesor" class="form-control" required>
                      <option>Ingenieria en Mecatrónica</option>
                      <option>Ingenieria en tecnologías de Manufactura</option><option>Ingenieria en tecnologías de la información</option>
                      <option>Licenciatura en Administración y Gestión empresarial</option>
                      <option>Ingenieria en sistemas automotrices</option>
                     </select> 
                     <select name="id_profesor" class="form-control" required>
                       <?php
                          $profesores = new MvcController();
                          $profesores->mostrarProfesoresController();
                       ?>
                     </select><br> 
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
  $controlador->registrarMateriaController();
  
?>