<div class="content">
  <?php
    //se valida si hay un a inision en curso
    if(isset($_SESSION['id_usuario'])){
      $URL="index.php?action=listar"; //y redirecciona a la pagina listar
      echo "<script>document.location.href='{$URL}';</script>";
      echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
    // se crea una instancia para validar al usuario
    $controlador = new MvcController();
    $controlador->login();
  
?>


<div class="wrapper">
 <div class="main-content">
 <div class="box-content">
  <div class="col-md-12">
  <div id="single-wrapper">
	<form  method="post" class="frm-single" >
		<div class="inside">
			<div class="title"><strong>Hotel</strong>Admin</div>
			<!-- /.title -->
			<div class="frm-title">Login</div>

	    		<!--ALERTA DE MODIFICACION DE EQUIVOCACION EN USUARIO O CONTRASEÑA-->
			<?php
				if(isset($_GET['var'])){
		 		 echo "
				 <div class='alert alert-warning alert-dismissible' role='alert'>
	  			 <strong>Contraseña o nombre de usuario incorrecto!</strong>
				 </div>";
				}
			?>

			<!-- /.frm-title -->
			<div class="frm-input"><input type="text" name="username" placeholder="Username" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input type="password" name="password" placeholder="Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="clearfix margin-bottom-20">
				<div class="pull-left">
					<div class="checkbox primary"><input type="checkbox" id="rememberme"><label for="rememberme">Remember me</label></div>
					<!-- /.checkbox -->
				</div>

			</div>
			<!-- /.clearfix -->
			<button type="submit" name="login" class="frm-submit">Entrar<i class="fa fa-arrow-circle-right"></i></button>

			<!-- /.row -->
			<a href="index.php?action=registrar" class="a-link"><i class="fa fa-key"></i>¿Erese nuevo? Registrate.</a>
			<div class="frm-footer">HotelAdmin © 2019.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
</div>
</div>
</div>
</div>
</center>