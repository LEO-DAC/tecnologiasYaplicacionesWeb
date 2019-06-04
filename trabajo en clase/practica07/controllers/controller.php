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
  							       "apellidos"=>$_POST["apellidos"]);
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
  							"apellidos"=>$_POST["apellidos"]);
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
                       "carrera"=>$_POST["carrera"],
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

  //funcion encargada de dar de alta a los alumnos en las materias
 public function registrarAlumnoMateriaController(){
      if(isset($_POST["registrar"])){
           $datos=array("id_alumno"=>$_POST["id_alumno"],
                        "id_materia"=>$_POST["id_materia"]);
           $respuesta=Datos::registrarAlumnoMateriaModel($datos);

        if($respuesta=="success"){
          echo "<script type=\"text/javascript\">alert(\"Se registró el alumno en la materia con exito!!\");</script>";  
          $URL="index.php?action=mostrarMaterias";
          echo "<script >document.location.href='{$URL}';</script>";
          echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        }else{

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al guardar!!\");</script>";
            }  
      }    
}

  //funcion para mostrar los profesores en un select en el ormulario de registrar materia
  public function mostrarProfesoresController(){
      $profesores = Datos::vista("profesor");
      foreach($profesores as $row => $item){
       echo'<option value ='.$item['id'].'>'.$item['nombres'].' '.$item['apellidos'].'</option>';
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


  //cunion para guardar los datos del grupo agregado
  public function registrarGrupoController(){
    if (isset($_POST["registrar"])) {
        $datos = array("carrera"=>$_POST["carrera"],
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
    echo'<tr>
        <td>'.$item["matricula"].'</td>
        <td>'.$item["nombres"].'</td>
        <td>'.$item["apellidos"].'</td>
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
    echo'<tr>
        <td>'.$item["nombres"].'</td>
        <td>'.$item["apellidos"].'</td>
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
    echo'<tr>
        <td>'.$item["carrera"].'</td>
        <td><center>'.$item["cuatrimestre"].'</center></td>
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
    echo'<tr>
        <td>'.$item["nombre"].'</td>
        <td>'.$item["clave"].'</td>
        <td>'.$item["carrera"].'</td>
        <td>'.$profesor["nombres"].' '.$profesor["apellidos"].'</td>
      <td><center><a href="index.php?action=verMateriaAlumno&id='.$item["id"].'&nombre='.$item["nombre"].'" ><i class="fa fa-eye"></i></a></center></td>
        <td><center><a href="index.php?action=editarMateria&id='.$item["id"].'" ><i class="ico zmdi zmdi-edit zmdi-hc-fw"></i></a></center></td>

        <td><center><a href="index.php?action=mostrarMaterias&idBorrar='.$item["id"].'" onclick="return confirmDeleteRegistro()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
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


//función encargada de mostrar y editar los datos de un profesor
public function editarProfesorController(){
  
  $id_profesor = $_GET["id"];
  $respuesta = Datos::recuperarRegistro($id_profesor,"profesor");
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
                     <select name="carrera" class="form-control" required>
                      <option selected="true" disabled="disabled">'.$respuesta["carrera"].'</option>
                      <option>Ingeniería en Mecatrónica</option>
                      <option>Ingeniería en tecnologías de Manufactura</option>
                      <option>Ingeniería en tecnologías de la información</option>
                      <option>Licenciatura en Administración y Gestión empresarial</option>
                      <option>Ingeniería en sistemas automotrices</option>
                     </select> <br>
                     <select name="id_profesor" class="form-control" required>';
                          $profesores = new MvcController();
                          $profesores->mostrarProfesoresController();
                       
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
                        <option selected="true" disabled="disabled">'.$grupo["carrera"].'</option>
                        <option>Ingeniería en Mecatrónica</option>
                        <option>Ingeniería en tecnologías de Manufactura</option><option>Ingenieria en tecnologías de la información</option>
                        <option>Licenciatura en Administración y Gestión empresarial</option>
                        <option>Ingeniería en sistemas automotrices</option>
                      </select> <br>
                     <select name="cuatrimestre" class="form-control" required>
                        <option selected="true" disabled="disabled">'.$grupo["cuatrimestre"].'</option>
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
                            "apellidos"=>$_POST["apellidos"]);

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
                            "carrera"=>$_POST["carrera"],
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
                            "apellidos"=>$_POST["apellidos"]);

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

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al eliminar!!\");</script>";
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

          echo "<script type=\"text/javascript\">alert(\"Se presentó un problema al eliminar!!\");</script>";
            }

    }
  }

    //funcion para mostrar el profesor a la hora de querer dar de alta un un alumno en una materia
   public function mostrarProfesorAlumnoAlta(){
      if(isset($_POST["seleccionar"])){   
        
          $materia  = Datos::recuperarRegistro($_POST["id_materia"],"materia");
                      
          $profesor = Datos::recuperarRegistro($materia["id_profesor"],"profesor");
          echo '<label>Profesor:</label>';                
          echo'<input class="form-control" type="text" value="'.$profesor["nombres"].' '.$profesor["apellidos"].'"" name="nombreProfesor" readonly="readonly"><br>'; 
       }
  }

  public function vistaMateriaAlumnosController(){
    
    $id_materia=$_GET["id"];

    $respuesta = Datos::sentencia("SELECT * FROM alumno INNER JOIN materia_alumno WHERE alumno.matricula=materia_alumno.id_alumno AND materia_alumno.id_materia=$id_materia"); 
    
    foreach($respuesta as $row => $item){
    echo'<tr>
        <td>'.$item["matricula"].'</td>
        <td>'.$item["nombres"].'</td>
        <td>'.$item["apellidos"].'</td>
        <td><center><a href="index.php?action=editarAlumno&id='.$item["matricula"].'" ><i class="ico zmdi zmdi-edit zmdi-hc-fw"></i></a></center></td>

        <td><center><a href="index.php?action=mostrarAlumnos&idBorrar='.$item["matricula"].'" onclick="return confirmDeleteRegistro()"><i class="ico zmdi zmdi-delete zmdi-hc-fw"></i></a></center></td>
      </tr>';

    }

  }



}
?>