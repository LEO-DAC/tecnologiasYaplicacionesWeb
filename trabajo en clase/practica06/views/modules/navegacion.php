<?php
  session_start();
?>
<nav>
	<div class="main-menu">
		<header class="header">
			<a href="#" class="logo">HotelTeam</a>
			<button type="button" class="button-close fa fa-times js__menu_close"></button>
			<div class="user">
				<a href="#" class="avatar"><img src="http://placehold.it/80x80" alt=""><span class="status online"></span></a>
				<h5 class="name">
					<a href="#">
					  
					  <?php
					    if(isset($_SESSION['id_usuario'])){ // se muestra el nombre del usaurio
					        echo "".$_SESSION['id_usuario']['username'];
					      }else{
					      	echo "iniciar sesión";
					      }
					   ?>

					</a></h5>
				<h5 class="position">
					
					<?php
					    if(isset($_SESSION['id_usuario']) AND $_SESSION['id_usuario']['admin']==1){ 
					        echo "Administrador";
					      }else{  // se muestra si el usuario es administrador o solo usuario
					      	echo "Usuario";
					      }
					   ?>
				</h5>
				<!-- /.name -->
				<div class="control-wrap js__drop_down">
					<i class="fa fa-caret-down js__drop_down_button"></i>
					<div class="control-list">
						<div class="control-item"><a href="index.php?action=session_destroy"><i class="fa fa-sign-out"></i> Salir</a></div>
					</div>
					<!-- /.control-list -->
				</div>
				<!-- /.control-wrap -->
			</div>
			<!-- /.user -->
		</header>
		<!-- /.header -->

 <?php if(isset($_SESSION['id_usuario'])){ ?>      

		<div class="content"> 
			<div class="navigation">
				<h5 class="title">Navigation</h5>
				<!-- /.title -->
				<ul class="menu js__accordion">
					<li class="current">
						<a class="waves-effect"><i class="menu-icon fa fa-home"></i><span>Operaciones</span></a>
					</li>
					<li>
						<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-hotel"></i><span>Habitaciones</span><span class="menu-arrow fa fa-angle-down"></span></a>
						<ul class="sub-menu js__content">
							<li><a href="index.php?action=listar">Listar</a></li>
							<li><a href="index.php?action=consultarHabitacion">consultar</a></li>
						</ul>
						<!-- /.sub-menu js__content -->
					</li>
					 <li>
						<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-calendar"></i><span>Reservaciones</span><span class="menu-arrow fa fa-angle-down"></span></a>
						<ul class="sub-menu js__content">
							<li><a href="index.php?action=generarReservacion">Generar</a></li>
							<li><a href="index.php?action=consultarReservacion">consultar</a></li>	
						</ul>
						<!-- /.sub-menu js__content -->
					</li>
	<?php }?>
      
	<?php //se muestra el menu de funciones de adminitrador solo para los adminitradores 
	  if(isset($_SESSION['id_usuario']) AND $_SESSION['id_usuario']['admin']==1){ 
	  	?>   		
					<li>
						<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-user-plus"></i><span>Administrador</span><span class="menu-arrow fa fa-angle-down"></span></a>
						<ul class="sub-menu js__content">
							<li><a href="index.php?action=crudHabitacion">Crud de habitaciones</a></li>
							<li><a href="index.php?action=crudCliente">Crud de clientes</a></li>
							<li><a href="">Calcular ganancias</a></li>
						</ul>
						<!-- /.sub-menu js__content -->
					</li>
				</ul>
			</div>
		</div>
	<?php }?>
	</nav>	