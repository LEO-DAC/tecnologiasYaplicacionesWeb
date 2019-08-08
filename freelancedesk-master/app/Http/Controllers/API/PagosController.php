<?php

namespace App\Http\Controllers\API;

use App\pagos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PagosController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $id = $request->id;				
				$pagos = pagos::where('id_benefactor','=',$id)
                          ->orWhere('id_beneficiario',$id) // limita a solo mostrar solo usuarios involucrados con el proyecto
                     ->join('users', 'users.id', '=', 'pagos.id_beneficiario')
                     ->select('users.name as nombre',
                     'pagos.id',
                     'pagos.monto',
                     'pagos.descripcion',
                     'pagos.fecha')
                     ->paginate(10);
        //$proyectos = DB::table('proyectos')->where('id_project_manager',$id)->get();
				
			return $pagos;
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
						'id_beneficiario'=>'required',
						'id_benefactor' => 'required',
						'fecha' => 'required',
						'descripcion' => 'required',
						'monto' => 'required'
        ]);
			  
				 return  pagos::create([
						'id_beneficiario'=> $request['id_beneficiario'],
            'id_benefactor' => $request['id_benefactor'],
            'fecha' => $request['fecha'],
            'descripcion' => $request['descripcion'],
            'monto' => $request['monto']
         ]);

             
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $proyecto = pagos::findOrFail($id);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
				$id = $request->id;				

        $proyecto = pagos::findOrFail($id);

        // Eliminacion de proyecto
        $proyecto->delete();

        return ['mensjae' => 'Proyecto eliminado'];
    }
	
}
