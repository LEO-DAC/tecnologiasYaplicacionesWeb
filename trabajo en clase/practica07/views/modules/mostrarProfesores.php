 <div class="wrapper">
 <div class="col-lg-12 col-md-10 col-xs-12">
 <div class="box-content">
 <center>
  <br><br><br><br><br>
   <div class="box-content card white">
     <h4 class="box-title">Profesores</h4> 

     <div class="col-sm-12">   
      <div class= "row">
      <div class = "box-content">
     <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
              <tr>
                <th>nombres</th>
                <th>apellidos</th>
                <th>Carrera</th>
                <th>password</th>
                <th>correo</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $alumnos = new MvcController();
                $alumnos->vistaProfesoresController();
                $alumnos->eliminarProfesorController();
                ?>
           </tbody>
      </table>
   </div>
   </div>
   </div>   
   </div>
   </center>     
  </div>     
 </div>     
</div>     
  