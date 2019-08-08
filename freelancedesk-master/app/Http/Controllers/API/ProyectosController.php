<?php

namespace App\Http\Controllers\API;

use App\proyectos;
use App\usuarios_proyectos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ProyectosController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){				

      /*
          SELECT p.*, count(*) as total,
					            count(  IF(t.status='Activa',1, NULL)) as activas, 
					            count(  IF(t.status='Terminada',1, NULL)) as terminadas, 
                      count(  IF(t.status='Inactiva',1, NULL)) as inactivas 
                FROM proyectos as p
			          INNER JOIN tareas as t on p.id = t.id_proyecto
            GROUP by p.id */ 
      
                      /*  
      return proyectos::where('id_project_manager','=', $request->id) // limita a solo mostrar solo usuarios involucrados con el proyecto
                              ->orWhere('id_cliente',$request->id)
                              ->join('tareas as t','proyectos.id','=','t.id_proyecto')
                              ->select('proyectos.*',DB::raw('count(*) as total') ,
                                                    DB::raw("count(IF(t.status='Activa',1, 0)) as activas"),
                                                    DB::raw("count(IF(t.status='Inactiva',1, 0)) as inactivas"),
                                                    DB::raw("count(IF(t.status='Terminada',1, 0)) as terminadas"))
                              ->groupBy('proyectos.id')        
                              ->paginate(10);      
      */
     
      
     return proyectos::where('id_project_manager','=',$id = $request->id) // limita a solo mostrar solo usuarios involucrados con el proyecto
                              ->orWhere('id_cliente',$id = $request->id)
                              ->paginate(10);
		//	return var_dump($proyectos); 
     
    
    }
    
    public function obtenerProyectosDesarrollador(Request $request){
      
        /*$proyectos = usuarios_proyectos::where('id_usuario','=',$id = $request->id) // limita a solo mostrar solo usuarios involucrados con el proyecto
                              ->join('proyectos as p','p.id','=','usuarios_proyectos.id_proyecto')
                              ->join('tareas as t','p.id','=','t.id_proyecto')
                              ->select('p.*',DB::raw('count(*) as total'),
                                                    DB::raw("count(IF(t.status='Activa',1, NULL)) as activas"),
                                                    DB::raw("count(IF(t.status='Inactiva',1, NULL)) as inactivas"),
                                                    DB::raw("count(IF(t.status='Terminada',1, NULL)) as terminadas"))
                              ->groupBy('p.id')    
                              ->paginate(10);*/
			
			
			        $proyectos = usuarios_proyectos::where('id_usuario','=',$id = $request->id) // limita a solo mostrar solo usuarios involucrados con el proyecto
                              ->join('proyectos as p','p.id','=','usuarios_proyectos.id_proyecto')
                              ->select('p.*')    
                              ->paginate(10);
			  return $proyectos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'required|string|max:50',
						'id_project_manager'=>'required',
            'id_cliente' => 'required',
						'fecha_inicio' => 'required',
						'fecha_fin' => 'required',
						'status' => 'required',
						'precio' => 'required'
        ]);
			  
				 return  proyectos::create([
						'id_project_manager'=> $request['id_project_manager'],
            'id_cliente' => $request['id_cliente'],
            'nombre' => $request['nombre'],
            'fecha_inicio' => $request['fecha_inicio'],
            'fecha_fin' => $request['fecha_fin'],
            'status' => $request['status'],
            'precio' => $request['precio']
        ]);
      
      
        
/*
         $proyectos = proyectos::all();
         $ultimoid =  $proyectos->last()->id;
     
			  $cliente = new usuarios_proyectos();
        $cliente->id_proyecto = $ultimoid;
        $cliente->id_usuario = $request['id_cliente']; 
        $cliente->id_tipo =1;
        $cliente->status  = 'Activo';
        $cliente->comentarios = 'Cliente del proyecto';
        $cliente->save();

			  $projectManager = new usuarios_proyectos();
        $projectManager->id_proyecto = $ultimoid;
        $projectManager->id_usuario = $request['id_project_manager']; 
        $projectManager->id_tipo =2;
        $projectManager->status  = 'Activo';
        $projectManager->comentarios = 'Administrador del proyecto';
        $projectManager->save();
      
            
      
      	return $creado;*/
			//return $request['nombre'];
			//echo '<script> console.log("Algo") </script>';
			
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ){
         $idUsuario = $request->idUsuario;
         $idProyecto = $request->idProyecto; 
         $proyecto = proyectos::where([
                          ['id','=',$idUsuario],
                          ['id_project_manager','=',$idProyecto]
                          ])
                  ->paginate(10); //se paginan los registros  
    
        return $proyecto; 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proyecto = proyectos::findOrFail($id);

        /*$this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:6'
        ]);*/

        $proyecto->update($request->all());
        return ['mensaje' => 'informacion actualizada correctamente'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
				$id = $request->id;				
        $status = $request->status;
      
        $proyecto = proyectos::findOrFail($id);

        // Eliminacion de proyecto
        $proyecto->status = $status;
        $proyecto->save();

        return ['mensjae' => 'Proyecto desactivado'];
    }
	
		public function proyectos(Request $request){
        //echo 'VENGO DE LA VISTA DONDE SE ELIGE EL TIPO DE PROYECTO';
				//se guarda el id del usuario logueado y se crea una variable global con el tipo de usuario logueado
        if(isset($request['btn_click'])){
          $GLOBALS['user_type'] = $request['tipo'];
        }else
          echo "<script>console.log('NO se detectó la funcion proyectos');</script>";
        #echo "globals: ".$GLOBALS['user_type'];
				$id=	Auth::user()->id;
				//$proyectos = DB::table('proyectos')->get();
				
        $proyectos = DB::table('proyectos')->where('id_project_manager',$id)->get();
				
        //return view('user.index', ['users' => $users]);

        //print_r( $request->all() );
				//print_r($id);
        //print_r( $proyectos );

        //echo $request['tipo'];

        if( $request['tipo'] == 'freelancer' ){

        }else{

        }
        return view('listaProyectos', ['proyectos' => $proyectos, 'tipo' => $GLOBALS['user_type'] ] );
    }


    public function mostrarProyecto(Request $request)
    {
				/*print $request['idProyecto'];
				print $request['tipo'];*/
				$user = Auth::user();
				$idUsuario = $user->id;
				$nombreUSuario = $user->name; 
				return view('dentroDeSistema', ['idProyecto' => $request['idProyecto'], 'tipo' => $request['tipo'], 'idUsuario' => $idUsuario, 'nombreUsuario'=>$nombreUSuario ]  );
				//print_r($user->id);
        //return view('dentroDelSistema');
    }
	
	
		public function obtenerProyecto($id){
				$p = Proyectos::findOrFail($id);
      
        return $p;
		}
	

}