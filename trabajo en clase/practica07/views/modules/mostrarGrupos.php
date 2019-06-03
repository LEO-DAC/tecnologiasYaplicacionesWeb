 <div class="wrapper">
 <div class="col-lg-12 col-md-10 col-xs-12">
 <div class="box-content">
 <center>
  <br><br><br><br><br>
   <div class="box-content card white">
     <h4 class="box-title">Grupos</h4> 

     <div class="col-sm-12">   
      <div class= "row">
      <div class = "box-content">
     <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
              <tr>
                <th>carrera</th>
                <th>cuatrimestre</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $grupos = new MvcController();
                $grupos->vistaGruposController();
                $grupos->eliminarGrupoController();
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
  