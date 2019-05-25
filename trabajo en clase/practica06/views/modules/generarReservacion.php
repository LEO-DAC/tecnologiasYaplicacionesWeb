
<div id="wrapper">
    <div class="main-content">
      <div class="box-content">
        <center>
         <div class="card-content">
            <form class="form-horizontal" method="post">
               <div class="form-group">
                  <div class="col-sm-10">
                     <h3 class="box-title">Generar reservacion</h3>
                     <select name="idCliente" class="form-control">
                       
                        <?php
                          $controlador = new MvcController();
                          $salida = $controlador->MostrarClientesController();
                        ?> 

                     </select><br>

                     <select name="idHabitacion" class="form-control">
                       
                        <?php
                          $controlador = new MvcController();
                          $salida = $controlador->MostrarHabitacionesController();
                        ?> 

                     </select><br>
                      <div class="form-group">
                        <label class="control-label col-sm-4">Fecha de llegada</label>
                        <div class="col-sm-8">
                          <div class="input-group">
                            <input required  name="fechaEntrada" type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                            <span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
                          </div>
                          <!-- /.input-group -->
                        </div>
                      </div>
                  
                     <div class="col-sd-10 margin-bottom-20">
                      <p>dias: </p><input  type="number" value="1" name="dias" class="col-md-8 form-control" required  min="1" max="100" >
                    </div>
                    <br><br><br><br><br><button type="submit" name ="registrar"class="btn btn-primary btn-sm waves-effect waves-light">Registrar</button>
                  </div>
               </div>  
            </form>
         </div>
       </center> 
      </div>
   </div>
</div>

 <?php
  
  $controlador = new MvcController();
  $salida = $controlador->registroReservacionController();
  
?>
