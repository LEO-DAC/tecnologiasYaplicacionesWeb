<?php
//clase de manejar los controladores del sistema
 class MvcController{	

  public function pagina(){ include "views/template.php"; }


  	#ENLACES
	//función encargada de redireccionar a las paginas por medio de action 
	#-------------------------------------
	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			$enlaces = $_GET['action'];
		}
		else{
			$enlaces = "login";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

  //función encargada de registrar alumnos en  la base de datos
  public function registrarAlumnoController(){
  	if(isset($_POST["registrar"])){
  			$datos = array("matricula"=>$_POST["matricula"],
                       "nombres"=>$_POST["nombres"],
  							       "apellidos"=>$_POST["apellidos"],
                       "id_carrera"=>$_POST["id_carrera"],
                       "id_profesor"=>$_POST["id_profesor"]);

  			$respuesta = Datos::registrarAlumnoModel($datos);

  			if($respuesta=="success"){
  				echo "<script type=\"text/javascript\">alert(\"Alumno guardado con exito!!\");</script>";  

          $URL="index.php?action=mostrarAlumnos";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

  			}else{
          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar!!\");</script>";  
          			}							
  	}

  }

  //funcion encargada de registrar en la base de datos la información de un nuevo profesor
  public function registrarProfesorController(){
  	if(isset($_POST["registrar"])){
  			$datos = array("nombres"=>$_POST["nombres"],
  							"apellidos"=>$_POST["apellidos"],
                "id_carrera"=>$_POST["id_carrera"],
                "correo"=>$_POST["correo"],
                "password"=>$_POST["password"]);

  			$respuesta = Datos::registrarProfesorModel($datos);

  			if($respuesta=="success"){
  			  echo "<script type=\"text/javascript\">alert(\"Profesor guardado con exito!!\");</script>"; 

          $URL="index.php?action=mostrarProfesores";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">'; 
        }else{

  	      echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar!!\");</script>";
        		}							
  	}

  }

  //funcion encargada de guardar los datos de una  nueva materia en la base de datos
  public function registrarMateriaController(){
    if(isset($_POST["registrar"])){
        $datos = array("nombre"=>$_POST["nombre"],
                       "clave"=>$_POST["clave"],
                       "id_carrera"=>$_POST["id_carrera"],
                        "id_profesor"=>$_POST["id_profesor"]);
        $respuesta = Datos::registrarMateriaModel($datos);

        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Materia guardada con exito!!\");</script>";  
          $URL="index.php?action=mostrarMaterias";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar!!\");</script>";
            }             
    }

  }


  public function registrarTutoriaController(){
    if(isset($_POST["registrar"])){
        $datos = array("fecha"=>$_POST["fecha"],
                       "tipo"=>$_POST["tipo"],
                       "tema"=>$_POST["tema"],
                        "id_profesor"=>$_POST["id_profesor"]);

        $respuesta = Datos::registrarTutoriaModel($datos);

        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Tutoria guardada con exito".$_POST["fecha"]."!!\");</script>";  
          $URL="index.php?action=mostrarTutorias";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar!!\");</script>";
            }             
    }

  }

  //funcion encargada de dar de alta a los alumnos en las materias
 public function registrarAlumnoMateriaController(){
      if(isset($_POST["registrar"]) and !isset($_POST["id_materia"])){

          echo "<script type=\"text/javascript\">alert(\"selecciona una materia y da clic en el botón seleccionar!!\");</script>";
              
      }
      elseif(isset($_POST["registrar"]) and isset($_POST["id_materia"])){
           $datos=array("id_alumno"=>$_POST["id_alumno"],
                        "id_materia"=>$_POST["id_materia"]);
           $respuesta=Datos::registrarAlumnoMateriaModel($datos);

           $materia= Datos::recuperarRegistro($_POST["id_materia"],"materia");

        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Se registró el alumno en la materia con exito!!\");</script>";  
          $URL='index.php?action=verMateriaAlumno&id='.$_POST["id_materia"].'&nombre='.$materia["nombre"].'';
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al parecer el alumno ya está dado de alta en la clase!!\");</script>";
            }  
      }    
}

  //función encargada de registrar los grupos atravez del id de materia y el id del grupo
 public function registrarGrupoMateriaController(){
      if(isset($_POST["registrar"])){
          $id_materia=$_POST["id_materia"];
          $id_grupo=$_POST["id_grupo"];


          $registrar = Datos::sentenciaInsert("INSERT INTO grupo_materia (id_materia,id_grupo) VALUES($id_materia,$id_grupo)");

        if($registrar=="success"){//si la inserción es exitosa se redirecciona a la vista de grupo
          $grupo= Datos::recuperarRegistro($id_grupo,"grupo");
          $carrera = Datos::recuperarRegistro($grupo["id_carrera"],"carrera");
          echo "<script type=\"text/javascript\">alert(\"La materia de dió de alta con exito!!\");</script>";  
          $URL='index.php?action=verGrupoMateria&carrera='.utf8_encode($carrera["nombre"]).'&cuatrimestre='.$grupo["cuatrimestre"].'&id='.$grupo["id"].'';
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar los cambios!!\");</script>";
            }  
      }
}


  //funcion para mostrar los profesores en un select en el ormulario de registrar materia
  public function mostrarProfesoresController(){
      $profesores = Datos::vista("profesor");
      foreach($profesores as $row => $item){
       echo'<option value ="'.$item['id'].'">'.$item['nombres'].' '.$item['apellidos'].'</option>';
      }
  }


  public function mostrarCarrerasController(){
      $carreras = Datos::vista("carrera");
      foreach($carreras as $row => $item){
       echo'<option value ='.$item['id'].'>'.utf8_encode($item['nombre']).'</option>';
      }
  }


  //funcion para mostrar los alumnos en un select en el formulario de Alta materia de alumno
  public function mostrarAlumnosController(){
      $alumnos = Datos::vista("alumno");
      foreach($alumnos as $row => $item){
       echo'<option value ='.$item['matricula'].'>'.$item['nombres'].' '.$item['apellidos'].'</option>';
      }
  }

  //funcion que muestra los nombres de las materias a elegir para el alumno
  public function mostrarMateriasController(){
      $materias = Datos::vista("materia");
      foreach($materias as $row => $item){  
       echo'<option value ='.$item['id'].'>'.$item['nombre'].'</option>';
      }
  }

  //funcion que muestra los grupos para dar de alta la materias en el formulario altaGrupoMateria
  public function mostrarGruposController(){
      $grupos = Datos::vista("grupo");
      foreach($grupos as $row => $item){  
        $carrera = Datos::recuperarRegistro($item["id_carrera"],"carrera");
       echo'<option value ='.$item['id'].'>'.utf8_encode($carrera['nombre']).'-cuatrimestre: '.$item["cuatrimestre"].'</option>';
      }
  }

  //funcion para mostrar las tutorias disponibles
  public function mostrarTutoriasController(){
      $tutorias = Datos::vista("sesion_tutoria");
      foreach($tutorias as $row => $item){  
        $profesor = Datos::recuperarRegistro($item["id_profesor"],"profesor");
       echo'<option value ='.$item['id'].'>'.'Profesor: '.$profesor['nombres'].' '.$profesor["apellidos"].'-fecha- '.$item["fecha"].'</option>';
      }
  }



 public function registrarTutoriaAlumnoController(){
      if (isset($_POST["registrar"])) {
        $datos = array("id_tutoria"=>$_POST["id_tutoria"],
                        "id_alumno"=>$_POST["id_alumno"]);

        $respuesta = Datos::registrarTutoriaAlumnoModel($datos);


        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Alumno agregado a tutoria con exito!!\");</script>";  
          $URL="index.php?action=mostrarTutorias";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar !!\");</script>";
            }
    }  
}


  //cunion para guardar los datos del grupo agregado
  public function registrarGrupoController(){
    if (isset($_POST["registrar"])) {
        $datos = array("id_carrera"=>$_POST["id_carrera"],
                        "cuatrimestre"=>$_POST["cuatrimestre"]);

        $respuesta = Datos::registrarGrupoModel($datos);


        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Grupo guardado con exito!!\");</script>";  
          $URL="index.php?action=mostrarGrupos";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar el grupo!!\");</script>";
            }
    }
  }

  //función para mostrar un datatable con los alumnos y poder editarlos y eliminarlos
  public function vistaAlumnosController(){
    //se recuperan los datos del alumno
    $respuesta = Datos::vista("alumno");
    foreach($respuesta as $row => $item){

    //se recupera el nobre del tutor y el nombre de la materia para mostrarlos en el datatable
    $tutor = Datos::recuperarRegistro($item["id_tutor"],"profesor");
    $carrera = Datos::recuperarRegistro($item["id_carrera"],"carrera");
    $tutor = $tutor["nombres"]." ".$tutor["apellidos"];
    $carrera="".$carrera["nombre"];
  
    echo'<tr>
        <td>'.$item["matricula"].'</td>
        <td>'.$item["nombres"].'</td>
        <td>'.$item["apellidos"].'</td>
        <td>'.utf8_encode($carrera).'</td>
        <td>'.$tutor.'</td>
        <td><center><a href="index.php?action=editarAlumno&id='.$item["matricula"].'" ><i class="ico zmdi zmdi-edit zmdi-hc-fw"></i></a></center></td>

        <td><center><a href="index.php?action=mostrarAlumnos&idBorrar='.$item["matricula"].'" onclick="return confirmDeleteRegistro()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
      </tr>';

    }
  }

  //función encargada de de mostrar un datatable con los daros de los profesores
  public function vistaProfesoresController(){
    //se recuperan los datos del alumno
    $respuesta = Datos::vista("profesor");
    foreach($respuesta as $row => $item){
    $carrera = Datos::recuperarRegistro($item["id_carrera"],"carrera"); 
    echo'<tr>
        <td>'.$item["nombres"].'</td>
        <td>'.$item["apellidos"].'</td>
        <td>'.utf8_encode($carrera["nombre"]).'</td>
        <td>'.$item["password"].'</td>
        <td>'.$item["correo"].'</td>
        <td><center><a href="index.php?action=editarProfesor&id='.$item["id"].'" ><i class="ico zmdi zmdi-edit zmdi-hc-fw"></i></a></center></td>

        <td><center><a href="index.php?action=mostrarProfesores&idBorrar='.$item["id"].'" onclick="return confirmDeleteRegistro()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
      </tr>';
   }

 }


   //función encargada de de mostrar un datatable con los datos de los Grupos
  public function vistaGruposController(){
    //se recuperan los datos del alumno
    $respuesta = Datos::vista("grupo");
    foreach($respuesta as $row => $item){
     
     $carrera = Datos::recuperarRegistro($item["id_carrera"],"carrera");
      
    echo'<tr>
        <td>'.utf8_encode($carrera["nombre"]).'</td>
        <td><center>'.$item["cuatrimestre"].'</center></td>
        <td><center><a href="index.php?action=verGrupoMateria&id='.$item["id"].'&carrera='.utf8_encode($carrera["nombre"]).'&cuatrimestre='.$item["cuatrimestre"].'" ><i class="fa fa-eye"></i></a></center></td>

        <td><center><a href="index.php?action=editarGrupo&id='.$item["id"].'" ><i class="ico zmdi zmdi-edit zmdi-hc-fw"></i></a></center></td>
        
        <td><center><a href="index.php?action=mostrarGrupos&idBorrar='.$item["id"].'" onclick="return confirmDeleteRegistro()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
      </tr>';
   }

 }



  public function vistaMateriasController(){
    //se recuperan los datos del alumno
    $respuesta = Datos::vista("materia");
    foreach($respuesta as $row => $item){
      $profesor = Datos::recuperarRegistro($item["id_profesor"],"profesor");
      $nombreMateria=$item["nombre"];
      $carrera = Datos::recuperarRegistro($item["id_carrera"],"carrera");

    echo'<tr>
        <td>'.$item["nombre"].'</td>
        <td>'.$item["clave"].'</td>
        <td>'.utf8_encode($carrera["nombre"]).'</td>
        <td>'.$profesor["nombres"].' '.$profesor["apellidos"].'</td>
      <td><center><a href="index.php?action=verMateriaAlumno&id='.$item["id"].'&nombre='.$item["nombre"].'" ><i class="fa fa-eye"></i></a></center></td>
        <td><center><a href="index.php?action=editarMateria&id='.$item["id"].'" ><i class="ico zmdi zmdi-edit zmdi-hc-fw"></i></a></center></td>

        <td><center><a href="index.php?action=mostrarMaterias&idBorrar='.$item["id"].'" onclick="return confirmDeleteRegistro()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
      </tr>';
   }

 }


  //mustra datatable con las tutorias
  public function vistaTutoriasController(){
    //se recuperan los datos del alumno
    $respuesta = Datos::vista("sesion_tutoria");

    foreach($respuesta as $row => $item){
      $profesor = Datos::recuperarRegistro($item["id_profesor"],"profesor");
      $nombreProfesor = $profesor["nombres"].' '.$profesor["apellidos"];
    echo'<tr>
        <td>'.$item["fecha"].'</td>
        <td>'.$item["tipo"].'</td>
        <td>'.$item["tema"].'</td>
        <td>'.$nombreProfesor.'</td>

      <td><center><a href="index.php?action=verTutoriaAlumno&id='.$item["id"].'&nombre='.$nombreProfesor.'"><i class="fa fa-eye"></i></a></center></td>
        <td><center><a href="index.php?action=editarTutoria&id='.$item["id"].'" ><i class="ico zmdi zmdi-edit zmdi-hc-fw"></i></a></center></td>
        <td><center><a href="index.php?action=mostrarTutorias&idBorrar='.$item["id"].'" onclick="return confirmDeleteRegistro()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
      </tr>';
   }

 }


    #EDITAR ALUMNO
  #------------------------------------
    //función encargada de cargar el formulario para editar los datos del alumno
    //meidante el uso de la clase modelo se trae desde la base de datos la información del cliente
    //usando el id del alumno recibido por parametro url 
  public function editarAlumnoController(){

    $matricula = $_GET["id"];

    $respuesta = Datos::recuperarRegistro($matricula,"alumno");
    $tutor = Datos::recuperarRegistro($respuesta["id_tutor"],"profesor");
    $carrera = Datos::recuperarRegistro($respuesta["id_carrera"],"carrera");

    echo'<div id="wrapper"><br>
    <div class="col-lg-8 col-md-10 col-xs-12">
      <div class="box-content">
        <center>
         <div class="card-content">
            <form class="form-horizontal" method="post">
               <div class="form-group">
                  <div class="col-sm-10">
                    <h3 class="box-title">Actualizar alumno</h3>
                    <input id="ig-1" type="number" value="'.$respuesta["matricula"].'"  min="1000000" max="9999999" name="matricula" class="form-control" placeholder="matricula" readonly="readonly"><br>
                     <input id="ig-1" type="text" name="nombres" value="'.$respuesta["nombres"].'" class="form-control" placeholder="nombre(s)" required><br>
                     <input id="ig-1" type="text" value="'.$respuesta["apellidos"].'" name="apellidos" class="form-control" placeholder="apellidos" required><br> 

                     <select name="id_carrera" class="form-control" required>';
                      echo'<option selected="true" value="'.$carrera["id"].'" >'.utf8_encode($carrera["nombre"]).'</option>';
                  
                          $this->mostrarCarrerasController();
                       
                     echo'     

                     </select><br>

                     <select name="id_profesor" class="form-control" required>';
                      echo'<option selected="true" value="'.$tutor["id"].'" >'.$tutor["nombres"].' '.$tutor["apellidos"].'</option>';
                    
                          $this->mostrarProfesoresController();
                       
                     echo'     
                     </select><br>

                    <button type="submit" name ="actualizar" class="btn btn-primary btn-sm waves-effect waves-light">Actualizar</button>
               
                  </div>
               </div>  
            </form>
         </div>
       </center> 
      </div>
   </div>
</div>';

  }


//función encargada de mostrar y editar los datos de un profesor
public function editarProfesorController(){
  
  $id_profesor = $_GET["id"];
  $respuesta = Datos::recuperarRegistro($id_profesor,"profesor");
  $carrera = Datos::recuperarRegistro($respuesta["id_carrera"],"carrera");
  echo '<div id="wrapper"><br>
      <div class="col-lg-8 col-md-10 col-xs-12">
        <div class="box-content">
          <center>
           <div class="card-content">
              <form class="form-horizontal" method="post">
                 <div class="form-group">
                    <div class="col-sm-10">
                       <h3 class="box-title">Actualziar profesor</h3>
                       <input name="id" type="text" value="'.$respuesta["id"].'" readonly="readonly" class="form-control"><br>
                       <input id="ig-1" type="text" value="'.$respuesta["nombres"].'"name="nombres" class="form-control" placeholder="nombre(s)" required><br>
                       <input id="ig-1" type="text" value="'.$respuesta["apellidos"].'"name="apellidos" class="form-control" placeholder="apellidos" required><br>                     

                       <select name="id_carrera" class="form-control" required>';
                       echo'<option selected="true" value="'.$carrera["id"].'" >'.utf8_encode($carrera["nombre"]).'</option>';
                  
                          $this->mostrarCarrerasController();
                       
                     echo'     
                     </select><br>

                    <input id="ig-1" type="mail" value="'.$respuesta["correo"].'"name="correo" class="form-control" placeholder="correo" required><br> 
                    <input id="ig-1" type="password" value="'.$respuesta["password"].'"name="password" class="form-control" placeholder="password" required><br> 

                      <button type="submit" name ="actualizar" class="btn btn-primary btn-sm waves-effect waves-light">Actualziar</button>
                 
                    </div>
                 </div>  
              </form>
           </div>
         </center> 
        </div>
     </div>
  </div>';

}

  //función encargada de cargar y editar los datos de la materia seleccionada
  public function editarMateriaController(){

  $respuesta = Datos::recuperarRegistro($_GET["id"],"materia");
  $id_materia =  $_GET["id"];
  //$respuesta2 = Datos::sentencia("SELECT p.id,p.nombres,p.apellidos FROM profesor as p INNER JOIN materia as m WHERE m.id=$id_materia and p.id=m.id_profesor");
  $profesor = Datos::recuperarRegistro($respuesta["id_profesor"],"profesor");
  $carrera = Datos::recuperarRegistro($respuesta["id_carrera"],"carrera");

   echo '<div id="wrapper"><br>
    <div class="col-lg-8 col-md-10 col-xs-12">
      <div class="box-content">
        <center>
         <div class="card-content">
            <form class="form-horizontal" method="post">
               <div class="form-group">
                  <div class="col-sm-10">
                     <h3 class="box-title">Actualziar materia</h3>
                     <input value="'.$respuesta["id"].'" name="id" type="hidden">
                     <input type="text" value="'.$respuesta["nombre"].'" name="nombre" placeholder="nombre de la materia" class="form-control" required><br>
                     <input id="ig-1" type="text" value="'.$respuesta["clave"].'"name="clave" class="form-control" placeholder="clave" required><br>
                     <select name="id_carrera"class="form-control" required>';
                      echo'<option selected="true" value="'.$carrera["id"].'" >'.utf8_encode($carrera["nombre"]).'</option>';
                    
                          $this->mostrarCarrerasController();
                       
                     echo'     
                     </select><br> 

                     <select name="id_profesor"class="form-control" required>';
                      echo'<option selected="true" value="'.$profesor["id"].'" >'.$profesor["nombres"].' '.$profesor["apellidos"].'</option>';
                    
                          $this->mostrarProfesoresController();
                       
                     echo'     
                     </select><br> 
                     <button type="submit" name ="actualizar"class="btn btn-primary btn-sm waves-effect waves-light">Actualziar</button>
                  </div>
               </div>  
            </form>
         </div>
       </center> 
      </div>
   </div>
</div>';

  }


//función encargada de cargar los datos de un grupo, mostrandolos y dando las opciones para editarlo
public function editarGrupoController(){
  $grupo= Datos::recuperarRegistro($_GET['id'],"grupo"); 
  
  echo '<div id="wrapper"><br>
    <div class="col-lg-8 col-md-10 col-xs-12">
      <div class="box-content">
        <center>
         <div class="card-content">
            <form class="form-horizontal" method="post">
               <div class="form-group">
                  <div class="col-sm-10">
                     <h3 class="box-title">Actualziar grupo</h3>
                     <input name="id" value="'.$grupo["id"].'" type="hidden">
                     <select name="carrera" class="form-control" required>
                        <option selected="true">'.$grupo["carrera"].'</option>
                        <option>Ingeniería en Mecatrónica</option>
                        <option>Ingeniería en tecnologías de Manufactura</option><option>Ingenieria en tecnologías de la información</option>
                        <option>Licenciatura en Administración y Gestión empresarial</option>
                        <option>Ingeniería en sistemas automotrices</option>
                      </select> <br>
                     <select name="cuatrimestre" class="form-control" required>
                        <option selected="true" value="'.$grupo["cuatrimestre"].'">'.$grupo["cuatrimestre"].'</option>
                        <option value="1">1er</option>
                        <option value="2">2do</option>
                        <option value="3">3er</option>
                        <option value="4">4to</option>
                        <option value="5">5to</option>
                        <option value="6">6to</option>
                        <option value="7">7mo</option>
                        <option value="8">8vo</option>
                        <option value="9">9no</option>
                     </select> <br>
                     <button type="submit" name ="actualizar"class="btn btn-primary btn-sm waves-effect waves-light">Actualizar</button>
                  </div>
               </div>  
            </form>
         </div>
       </center> 
      </div>
   </div>
</div>';

}
  //función para actualizar los datos del alumno
  public function actualizarAlumnoController(){
      if(isset($_POST["actualizar"])){
           $datos = array( "matricula"=>$_POST["matricula"],
                            "nombres"=>$_POST["nombres"],
                            "apellidos"=>$_POST["apellidos"],
                            "id_profesor"=>$_POST["id_profesor"],
                            "id_carrera"=>$_POST["id_carrera"]
                          );

           $registrar =  Datos::actualizarAlumnoModel($datos);

        if($registrar=="success"){
          echo "<script type=\"text/javascript\">alert(\"Alumno actualizado con exito!!\");</script>";  
          $URL="index.php?action=mostrarAlumnos";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar los cambios!!\");</script>";
            }     
       }
  }


  //función para actualizar los datos del grupo
  public function actualizarGrupoController(){
      if(isset($_POST["actualizar"])){
           $datos = array( "carrera"=>$_POST["carrera"],
                            "cuatrimestre"=>$_POST["cuatrimestre"],
                            "id"=>$_POST["id"]);

           $registrar =  Datos::actualizarGrupoModel($datos);

        if($registrar=="success"){
          echo "<script type=\"text/javascript\">alert(\"grupo actualizado con exito!!\");</script>";  
          $URL="index.php?action=mostrarGrupos";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar los cambios!!\");</script>";
            }     
       }
  }


 //función para actualizar los datos de la materia
  public function actualizarMateriaController(){
      if(isset($_POST["actualizar"])){
           $datos = array( "id"=>$_POST["id"],
                            "nombre"=>$_POST["nombre"],
                            "clave"=>$_POST["clave"],
                            "id_carrera"=>$_POST["id_carrera"],
                            "id_profesor"=>$_POST["id_profesor"]);

           $registrar =  Datos::actualizarMateriaModel($datos);

        if($registrar=="success"){
          echo "<script type=\"text/javascript\">alert(\"materia actualizada con exito!!\");</script>";  
          $URL="index.php?action=mostrarMaterias";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar los cambios!!\");</script>";
            }     
       }
  }



  //función para actualizar los datos del profesor
  public function actualizarProfesorController(){
      if(isset($_POST["actualizar"])){
           $datos = array(  "id"=>$_POST["id"],
                            "nombres"=>$_POST["nombres"],
                            "apellidos"=>$_POST["apellidos"],
                            "id_carrera"=>$_POST["id_carrera"],
                            "correo"=>$_POST["correo"],
                            "password"=>$_POST["password"]);

           $registrar =  Datos::actualizarProfesorModel($datos);

        if($registrar=="success"){
          echo "<script type=\"text/javascript\">alert(\"Profesor actualizado con exito!!\");</script>";  
         $URL="index.php?action=mostrarProfesores";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar los cambios!!\");</script>";
            }   

     }
  }

  //funcion encargada de eliminar el alumno selecionado 
  public function eliminarAlumnoController(){
    if (isset($_GET["idBorrar"])) {
          $respuesta = Datos::eliminarRegistro($_GET["idBorrar"],"alumno");

        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Se eliminó el alumno con exito!!\");</script>";  
          $URL="index.php?action=mostrarAlumnos";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al eliminar!!\");</script>";
            }

    }
  }


  //función encargada de eliminar el profesor seleccionado
  public function eliminarProfesorController(){
    if (isset($_GET["idBorrar"])) {
          $respuesta = Datos::eliminarRegistro($_GET["idBorrar"],"profesor");

        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Se eliminó el profesor con exito!!\");</script>";  
          $URL="index.php?action=mostrarProfesores";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al eliminar!!\");</script>";
            }

    }
  }


  //función encargada de eliminar la materia seleccionada
  public function eliminarMateriaController(){
    if (isset($_GET["idBorrar"])) {
          $respuesta = Datos::eliminarRegistro($_GET["idBorrar"],"materia");

        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Se eliminó la materia con exito!!\");</script>";  
          $URL="index.php?action=mostrarMaterias";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema,para eliminar una materia primero tienes que eliminar los alumnos dados de alta en ella!!\");</script>";
            }

    }
  }


  //función encargada de eliminar el grupo seleccionado
  public function eliminarGrupoController(){
    if (isset($_GET["idBorrar"])) {
          $respuesta = Datos::eliminarRegistro($_GET["idBorrar"],"grupo");

        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Se eliminó el grupo con exito!!\");</script>";  
          $URL="index.php?action=mostrarGrupos";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema,elimina las materias del grupo,antes de intentar eliminarlo!!\");</script>";
            }

    }
  }

    //funcion para mostrar el profesor a la hora de querer dar de alta un un alumno en una materia
   public function mostrarProfesorAlumnoAlta(){
      if(isset($_POST["seleccionar"])){   
        
          $materia  = Datos::recuperarRegistro($_POST["id_materia_select"],"materia");
          echo '<label>Materia:</label>';                
          echo'<input class="form-control" type="text" value="'.$materia["nombre"].'"" name="nombreMateria" readonly="readonly"><br>';
          echo'<input type="hidden" value="'.$materia["id"].'" name="id_materia" required>';                   
          $profesor = Datos::recuperarRegistro($materia["id_profesor"],"profesor");
          echo '<label>Profesor:</label>';                
          echo'<input class="form-control" type="text" value="'.$profesor["nombres"].' '.$profesor["apellidos"].'"" name="nombreProfesor" readonly="readonly"><br>'; 
       }
  }

   //funcion para mostrar el alumno a la hora de querer dar de alta un un alumno en una materia
   public function mostrarAlumnoAlta(){
      if(isset($_POST["seleccionar"])){   
        
          $alumno  = Datos::recuperarRegistro($_POST["id_alumno_select"],"alumno");
          echo '<label>Alumno:</label>';                
          echo'<input class="form-control" type="text" value="'.$alumno["nombres"].' '.$alumno["apellidos"].'"" name="nombreAlumno" readonly="readonly"><br>';
          echo'<input type="hidden" value="'.$alumno["matricula"].'" name="id_alumno" required>';                   
          echo'<button type="submit" name ="registrar"class=" btn btn-success btn-sm waves-effect waves-light">Registrar</button><br><br>';
      }
  }  
   
  public function vistaMateriaAlumnosController(){
    
    if(isset($_GET["id"])){
      $id_materia=$_GET["id"];

      $respuesta = Datos::sentencia("SELECT * FROM alumno INNER JOIN materia_alumno WHERE alumno.matricula=materia_alumno.id_alumno AND materia_alumno.id_materia=$id_materia"); 
      
      foreach($respuesta as $row => $item){
      echo'<tr>
          <td>'.$item["matricula"].'</td>
          <td>'.$item["nombres"].'</td>
          <td>'.$item["apellidos"].'</td>
          <td><center><a href="index.php?action=verMateriaAlumno&idBorrar='.$item["matricula"].'&id_materia='.$item["id_materia"].'&nombre='.$_GET["nombre"].'" onclick="return confirmDeleteRegistro()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
        </tr>';

      }
    }
  }


  public function vistaGrupoMateriasController(){
     
      if(isset($_GET["id"])){
        $id_grupo=$_GET["id"];

       $respuesta = Datos::sentencia("SELECT *  FROM materia as m 
            INNER JOIN grupo_materia as gm 
            INNER JOIN profesor as p  
                  WHERE gm.id_materia =m.id
                      and m.id_profesor=p.id  
                      and gm.id_grupo=$id_grupo");
    
      if($respuesta){
      foreach ($respuesta as $row => $item) {
         echo'<tr>
            <td>'.$item["clave"].'</td>
            <td>'.$item["nombre"].'</td>
            <td>'.$item["nombres"].' '.$item["apellidos"].'</td>
            <td><center><a href="index.php?action=verGrupoMateria&idBorrar='.$item["id_grupo"].'&id_materia='.$item["id_materia"].'&carrera='.$_GET["carrera"].'&cuatrimestre='.$_GET["cuatrimestre"].'" onclick="return confirmDeleteRegistro()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
         </tr>';
       } 
     }else{
       echo "<h2> El grupo no tiene materías</h2>";
     }

   }
  }

 //muestra los alumnos asignados a la tutoria
  public function vistaTutoriaAlumnoController(){
     
      if(isset($_GET["id"])){
        $id_tutoria=$_GET["id"];

       $respuesta = Datos::sentencia("SELECT *  FROM sesion_tutoria as st 
            INNER JOIN alumno as a 
            INNER JOIN sesion_alumno as sa  
                  WHERE sa.id_alumno=a.matricula
                  and sa.id_sesion =st.id
                  AND st.id= $id_tutoria");
    
      if($respuesta){

      foreach ($respuesta as $row => $item) {
        $carrera = Datos::recuperarRegistro($item["id_carrera"],"carrera");
        $profesor = Datos::recuperarRegistro($item["id_profesor"],"profesor");
         $nombreProfesor = "".$profesor["nombres"]." ".$profesor["apellidos"];  
         echo'<tr>
            <td>'.$item["matricula"].'</td>
            <td>'.$item["nombres"].'</td>
            <td>'.$item["apellidos"].' '.$item["apellidos"].'</td>
            <td>'.utf8_encode($carrera["nombre"]).'</td>
            <td><center><a href="index.php?action=verTutoriaAlumno&idBorrar='.$item["id_sesion"].'&nombre='.$nombreProfesor.'&id_alumno='.$item["id_alumno"].'" onclick="return confirmDeleteRegistro()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
         </tr>';
       } 
     }else{
       echo "<h2> La tutoria no tiene alumnos</h2>";
     }

   }
  }

    //función encargada de eliminar el profesor seleccionado
  public function eliminarMateriaAlumnoController(){
    if (isset($_GET["matricula"])) {
          
          $id_materia=$_GET["id_materia"];
          $nombre =$_GET["nombre"];
          $matricula=$_GET["matricula"];
          $cuatrimestre=$_GET["cuatrimestre"];
          $carrera=$_GET["carrera"];

          $respuesta = Datos::sentenciaDelete("DELETE FROM materia_alumno WHERE id_materia=$id_materia AND id_alumno= $matricula");

        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Se eliminó el alumno de la materia con exito!!\");</script>";  
          $URL='index.php?action=verMateriaAlumno&id='.$id_materia.'&nombre='.$_GET["nombre"].'& ';
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al eliminar!!\");</script>";
            }
    }
  }

 //elimina el alumno seleccionado del grupo
  public function eliminarGrupoMateriaController(){
          if (isset($_GET["idBorrar"])) {
          
          $id_grupo=$_GET["idBorrar"];
          $id_materia=$_GET["id_materia"];

          $respuesta = Datos::sentenciaDelete("DELETE FROM grupo_materia WHERE id_materia=$id_materia AND id_grupo= $id_grupo");

        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Se eliminó el alumno de la materia con exito!!\");</script>";  
          $URL='index.php?action=verGrupoMateria&id='.$id_grupo.'&carrera='.$_GET["carrera"].'&cuatrimestre='.$_GET["cuatrimestre"].'';
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al eliminar la materia!!\");</script>";
            }

    }

  }


//elimina el registro seleccionado de la tabla sesion_tutorias
 public function eliminarTutoriaController(){
    if (isset($_GET["idBorrar"])) {
          $respuesta = Datos::eliminarRegistro($_GET["idBorrar"],"sesion_tutoria");

        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Se eliminó la tutoria con exito!!\");</script>";  
          $URL="index.php?action=mostrarTutorias";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema,no se pueden eliminar tutorias si tienen alumnos asignados!!\");</script>";
          }
    }
  }

public function eliminarTutoriaAlumnoController(){
   if (isset($_GET["idBorrar"])) {
          $id_sesion =$_GET["idBorrar"];
          $id_alumno = $_GET["id_alumno"];

          $respuesta = Datos::sentenciaDelete("DELETE from sesion_alumno WHERE id_alumno = $id_alumno and id_sesion =id_sesion ");

        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Se eliminó el alumno de la tutoria con exito!!\");</script>";  
          $URL="index.php?action=mostrarTutorias";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al intentar eliminar!!\");</script>";
          }
    }
}

}
?>