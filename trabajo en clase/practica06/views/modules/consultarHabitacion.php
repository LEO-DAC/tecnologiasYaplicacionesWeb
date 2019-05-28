<div class="wrapper">
	<div class="main-content">
		<div class="box-content">
			<div class="form-group margin-bottom-20">
			<form method="post">	


           <p>precio minimo y maximo:</p>
            <div class="col-md-4 margin-bottom-20">
              <input id="demo2" type="number" value="0" min="0" name="minimo" class="col-md-8 form-control" required>
            </div>  
            <div class="col-md-4 margin-bottom-20">
              <input id="demo2" type="number" value="0" min="0" name="maximo" class="col-md-8 form-control" required>
            </div>
			      <button type="submit" name ="consultar"class="btn btn-primary btn-sm waves-effect waves-light">consultar</button>
			 </form>
			</div>
			</select><br><br><br>


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
              </tr>
            </thead>
            <tbody>
             <?php   // se crea una instancia para mostrar los datos de las habitaciones en una tabla  
                     $controlador = new MvcController();
                     $controlador->vistaHabitacionesPrecioController();
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


		</div>
	</div>	
</div>



