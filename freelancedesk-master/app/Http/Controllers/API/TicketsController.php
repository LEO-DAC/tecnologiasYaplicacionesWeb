<?php
namespace App\Http\Controllers\API;

use App\proyectos;
use App\tickets;
use App\usuarios_proyectos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProyectos(Request $request){
      $proyectos = proyectos::where('proyectos.id_cliente','=',$request->id_cliente)
        ->select("proyectos.id",'proyectos.nombre')
        ->paginate(10);
      return $proyectos;
    }
    public function index(Request $request)
    {
        //
        $return = proyectos::where('proyectos.id_cliente','=',$request->id_cliente)
          ->join('tickets as t','t.id_proyecto','=','proyectos.id')
          ->select('proyectos.nombre as nombre_proyecto','t.id as id_ticket','t.descripcion','t.fecha')
          ->paginate(10);
      
        return $return;
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'id_cliente' => 'required',
            'descripcion' => 'required',
						'fecha' => 'required',
						'status' => 'required'
        ]);
      
       return  tickets::create([
         'id_cliente' => $request['id_cliente'],
         'id_proyecto' => $request['id_proyecto'],
         'descripcion' => $request['descripcion'],
         'status' => $request['status'],
         'archivo' => $request['archivo'],
         'fecha' => $request['fecha']
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
