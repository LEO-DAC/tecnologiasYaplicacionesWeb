<div id="wrapper"><br>
    <div class="col-lg-8 col-md-10 col-xs-12">
      <div class="box-content">
        <center>
         <div class="card-content">
            <form class="form-horizontal" method="post">
               <div class="form-group">
                  <div class="col-sm-10">
                     <h3 class="box-title">Registrar tutoria</h3>
                       <div class="form-group">
                        <label class="control-label col-sm-4">Fecha</label>
                        <div class="col-sm-8">
                          <div class="input-group">

                            <input required  name="fecha" type="date" class="form-control" placeholder="mm/dd/yyyy" >
                            <span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
                          </div>


                          <!-- /.input-group -->
                        </div>
                      </div>
                     
                      <input id="ig-1" type="text" name="tipo" class="form-control" placeholder="tipo" required><br>
                      <input id="ig-1" type="text" name="tema" class="form-control" placeholder="tema" required><br>

                      <select name="id_profesor" class="form-control" required>
                         <option disabled selected>Selecciona el profesor</option>'
                         <?php
                          $profesores = new MvcController();
                          $profesores->mostrarProfesoresController();  
                         ?> 
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
  $controlador->registrarTutoriaController();
  
?>