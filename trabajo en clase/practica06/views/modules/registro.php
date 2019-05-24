
<div id="wrapper">
    <div class="main-content">
      <div class="box-content">
        <center>
         <div class="card-content">
            <form class="form-horizontal" method="post">
               <div class="form-group">
                  <div class="col-sm-10">
                     <h3 class="box-title">Registrar usuario</h3>
                     <input id="ig-1" type="text" name="username" class="form-control" placeholder="Username"><br>
                     <input type="password" name="password"class="form-control" id="inp-type-3" placeholder="Password" value="Password">
                    <div class="switch success"><br>
                      <input type="checkbox" name="admin"checked value="1" checked id="switch-3"><label for="switch-3">Administrador</label>
                    </div><br>
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
  
  $controlador = new MvcController();
  $controlador->registroUsuarioController();
  
?>