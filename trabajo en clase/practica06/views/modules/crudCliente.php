<div class="wrapper">
 <div class="main-content">
 <div class="box-content">
 <center>
  <div class="box-content card white">
	  <h4 class="box-title">Registrar cliente</h4>
	  <div class="card-content">
    <form class="form-horizontal" method="post">
        <div class="col-sm-10">
          <label>selecciona el tipo de cliente:</label> 
           <select name="tipo" class="form-control" required>
             <option >habitual</option>
             <option >esporádico</option>
           </select><br>
           <input id="ig-1" type="text" name="nombre" class="form-control" placeholder="nombre" required>
           <br>
            <input id="ig-1" type="text" name="apellido" class="form-control" placeholder="apellido" required>
           <br>
           <button type="submit" name ="registrar"class="btn btn-primary btn-sm waves-effect waves-light">Registrar</button>
           <br><br><br>
        </div>
      </form>
    </div>
   </div>

 <?php
  
  $controlador = new MvcController();
  $salida = $controlador->registroClienteController();
  
?>
<br><br>
   <div class="box-content card white">
     <h4 class="box-title">Clientes</h4> 

     <div class="col-sm-12">   
      <div class= "row">
      <div class = "box-content">
     <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
              <tr>
                <th>id</th>
                <th>tipo</th>
                <th>nombre</th>
                <th>apellido</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
             <?php   //
                     $controlador = new MvcController();
                     $controlador->vistaClientesController();
                     $controlador->borrarClienteController();
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
  