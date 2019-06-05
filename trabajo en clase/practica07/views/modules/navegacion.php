<header class="fixed-header">
	<div class="header-top">
		<div class="container">
			<div class="pull-left">
				<a  class="logo">Gestor de grupos</a>
			</div>
			<!-- /.pull-left -->
			<div class="pull-right">
				<div class="ico-item hidden-on-desktop">
					<button type="button" class="menu-button js__menu_button fa fa-bars waves-effect waves-light"></button>
				</div>
				<!-- /.ico-item hidden-on-desktop -->
				<div class="ico-item">
					<a href="#" class="ico-item fa fa-search js__toggle_open" data-target="#searchform-header"></a>
					<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="fa fa-search button-search" type="submit"></button></form>
					<!-- /.searchform -->
				</div>
				<!-- /.ico-item -->
				<div class="ico-item fa fa-arrows-alt js__full_screen"></div>
				<!-- /.ico-item fa fa-fa-arrows-alt -->
				<div class="ico-item toggle-hover js__drop_down ">


				<!-- /.ico-item -->
			</div>
			<!-- /.pull-right -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.header-top -->
	<nav class="nav-horizontal">
		<button type="button" class="menu-close hidden-on-desktop js__close_menu"><i class="fa fa-times"></i><span>CLOSE</span></button>
		<div class="container">
			
			<ul class="menu">
					<li class="has-sub">
						<a href="#"><i class="ico fa fa-home"></i><span>Grupos</span></a>
						<ul class="sub-menu single">
							<li class="has-sub">
								<ul class="child-list">
									<li><a href="index.php?action=registrarGrupo">registrar</a></li>
									<li><a href="index.php?action=mostrarGrupos">mostrar</a></li>
									<li><a href="index.php?action=altaGrupoMateria">Alta de materia en grupo</a></li>
								</ul>
								<!-- /.child-list -->
							</li>
						</ul>
						<!-- /.sub-menu mega -->
					</li>					
					<li class="has-sub">
						<a href="#"><i class="ico fa fa-book"></i><span>Materias</span></a>
						<ul class="sub-menu single">
							<li class="has-sub">
								<ul class="child-list">
									<li><a href="index.php?action=registrarMateria">registrar</a></li>
									<li><a href="index.php?action=mostrarMaterias">mostrar</a></li>
									<li><a href="index.php?action=altaAlumnoMateria">Alta alumno en materia</a></li>
								</ul>
								<!-- /.child-list -->
							</li>
						</ul>
						<!-- /.sub-menu mega -->
					</li>
					<li class="has-sub">
						<a href="#"><i class="ico fa fa-briefcase"></i><span>Profesores</span></a>
						<ul class="sub-menu single">
							<li><a href="index.php?action=registrarProfesor">registrar</a></li>

							<li><a href="index.php?action=mostrarProfesores">mostrar</a></li>
						</ul>
						<!-- /.sub-menu single -->
					</li>
					<li class="has-sub">
						<a href="#"><i class="ico fa fa-users"></i><span>Alumnos</span></a>
						<ul class="sub-menu single">
							<li><a href="index.php?action=registrarAlumno">registrar</a></li>
							<li><a href="index.php?action=mostrarAlumnos">mostrar</a></li>
						</ul>
						<!-- /.sub-menu single -->
					</li>
			</ul>
			<!-- /.menu -->
		</div>
		<!-- /.container -->
	</nav>
	<!-- /.nav-horizontal -->
</header>
<!-- /.fixed-header -->