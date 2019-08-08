<?php

namespace App\Http\Controllers\API;
 
use App\usuarios_proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UsuariosProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request){
	
				$id = $request->id;				

				$usuarios_proyectos = DB::table('proyectos as p')
          ->where('p.id_project_manager','=',$id)
          ->join('usuarios_proyectos as up','up.id_proyecto','=','p.id')          
          ->join('users as u',[ ['u.id', '=', 'up.id_usuario'],
                                ['u.id','!=','p.id_cliente']
                              ])
          ->join('tipos as t', 't.id', '=', 'up.id_tipo')
          ->select(
                   'p.id as id_proyecto', 
                   'up.id',
                   'u.id as user_id', 
                   'up.id_proyecto',
                   'up.status',
                   'p.nombre as nombre_proyecto',
                   'up.comentarios',
                   'u.name as nombre',
                   'u.email', 
                   't.nombre as tipo')
          ->orderBy('p.id','asc')
          ->paginate(10); //se paginan los registros
			
				return $usuarios_proyectos;
			
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'id_proyecto' =>'required',
            'id_usuario' => 'required',
            'id_tipo' =>'required',
						'status' => 'required',
					 	'comentarios'=>'required'
        ]);
			
				return usuarios_proyectos::create([
            'id_proyecto' => $request['id_proyecto'],
            'id_usuario' => $request['id_usuario'],
            'id_tipo' => $request['id_tipo'],
            'status' => $request['status'],
						'comentarios'=> $request['comentarios']
        ]);
			
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $usuario_proyecto = usuarios_proyectos::findOrFail($id);

        /*$this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:6'
        ]);*/

        $usuario_proyecto->update($request->all());
        return ['mensaje' => 'informacion actualizada correctamente'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
				$id = $request->id;				
        $status = $request->status;
              
        $usuario_proyecto = usuarios_proyectos::findOrFail($id);

        // Eliminacion de proyecto
        $usuario_proyecto->status = $status;
        $usuario_proyecto->save();

        return ['mensaje' => 'estado del desarrollador modificado'];    
    }
}
