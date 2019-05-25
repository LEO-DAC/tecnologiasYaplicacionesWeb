   
<div class="wrapper">
 <div class="main-content">
 <div class="box-content">
 <center>
  <div class="box-content card white">
     <h4 class="box-title">Reservaciones</h4> 

     <div class="col-sm-12">   
      <div class= "row">
      <div class = "box-content">
     <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
              <tr>
                <th>id</th>
                <th>idCliente</th>
                <th>idHabitacion</th>
                <th>fechaEntrada</th>
                <th>dias</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
             <?php   
                     $controlador = new MvcController();
                     $controlador->vistaReservacionesController();
                     $controlador->borrarReservacionController();
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
   