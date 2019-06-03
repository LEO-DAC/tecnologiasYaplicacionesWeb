<div id="wrapper"><br>
    <div class="col-lg-8 col-md-10 col-xs-12">
      <div class="box-content">
        <center>
         <div class="card-content">
            <form class="form-horizontal" method="post">
               <div class="form-group">
                  <div class="col-sm-10">
                     <h3 class="box-title">Registrar alumno</h3>
                      <input id="ig-1" type="number"  min="1000000" max="9999999" name="matricula" class="form-control" placeholder="matricula" required><br>
                     <input id="ig-1" type="text" name="nombres" class="form-control" placeholder="nombre(s)" required><br>
                     <input id="ig-1" type="text" name="apellidos" class="form-control" placeholder="apellidos" required><br> 
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
  $controlador->registrarAlumnoController();
  
?>