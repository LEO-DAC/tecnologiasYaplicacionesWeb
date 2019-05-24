<div class="wrapper">
 <div class="main-content">
 <div class="box-content">
 <center>
  <div class="box-content card white">
	  <h4 class="box-title">Registrar habitacion</h4>
	  <div class="card-content">
    <form class="form-horizontal" method="post">
        <div class="col-sm-10">
           <select name="tipo" class="form-control">
             <option >Nada seleccionado</option>
             <option >simple</option>
             <option >doble</option>
             <option >matrimonial</option>
           </select><br>
           <input id="ig-1" type="number" name="precio" class="form-control" placeholder="precio">
           <br>
           <button type="submit" name ="registrar"class="btn btn-primary btn-sm waves-effect waves-light">Registrar</button><br><br><br>
        </div>
      </form>
    </div>
   </div>

 <?php
  
  $controlador = new MvcController();
  $salida = $controlador->registroHabitacionController();
  
?>

   <div class="box-content card white">
     <h4 class="box-title">Habitaciones</h4> 

     <div class="col-sm-12">   
      <div class= "row">
      <div class = "box-content">
     <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
              <tr>
                <th>id</th>
                <th>tipo</th>
                <th>disponible</th>
                <th>precio</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
             <?php   
                     $controlador = new MvcController();
                     $controlador->vistaHabitacionesController();
                     $controlador->borrarHabitacionController();
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
   