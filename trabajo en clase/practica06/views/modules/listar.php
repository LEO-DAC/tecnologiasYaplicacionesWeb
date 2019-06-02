<div class="wrapper">
	<div class="main-content">
		<div class="box-content">
			<div class="form-group margin-bottom-20">
			<form method="post">	
			   <select name="tipo" class="form-control">
					<option >Nada seleccionado</option>
					<option >simple</option>
					<option >doble</option>
					<option >matrimonial</option>
			   </select><br><br>
			   <button type="submit" name ="listar"class="btn btn-primary btn-sm waves-effect waves-light">listar</button>
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
             <?php   // se crea una tabla y se imprimen los datos de las habitaciones  
                     $controlador = new MvcController();
                     $controlador->vistaHabitacionesController();
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



