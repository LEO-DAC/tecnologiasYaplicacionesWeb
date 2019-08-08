<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tareas;
class TareasController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
                
    public function index(Request $request){
        return tareas::where('tareas.id_proyecto','=',$request->id)
               ->join('usuarios_proyectos as up','up.id','=','tareas.id_desarrollador') 
               ->join('users','users.id','=','up.id_usuario') 
               ->select('tareas.id','up.id_usuario','users.name as desarrollador','tareas.nombre','tareas.descripcion','tareas.status','tareas.monto')
               ->paginate(10);
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
    public function store(Request $request){
         
        $this->validate($request, [
            'id_proyecto'=>'required',
            'id_desarrollador'=>'required',
            'nombre' => 'required|string|max:50',          
            'descripcion' => 'required|string|max:100',
						'status' => 'required',
						'monto' => 'required'
        ]);
			  
				 return  tareas::create([
						'id_proyecto'=> $request['id_proyecto'],
            'id_desarrollador' => $request['id_desarrollador'],
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'status' => $request['status'],
            'monto' => $request['monto']
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
        $tarea = tareas::findOrFail($id);

        /*$this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:6'
        ]);*/

        $tarea->update($request->all());
        return ['mensaje' => 'tarea actualizada correctamente'];
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
              
        $tarea = tareas::findOrFail($id);

        // Eliminacion de proyecto
        $tarea->status = $status;
        $tarea->save();

        return ['mensaje' => 'estado de tarea modificado'];    
    }
}
