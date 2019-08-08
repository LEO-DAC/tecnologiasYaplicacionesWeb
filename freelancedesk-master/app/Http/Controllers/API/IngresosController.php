<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ingreso;

class IngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
				$hoy = date('Y-m-d');
        return Ingreso::create([
					'nombre' => $request['nombre'],
					'detalle' => $request['detalle'],
					'cantidad' => $request['cantidad'],
					'fecha' => $hoy,
					'id_usuario' => $request['idUsuario'],
					'id_proyecto' => $request['idProyecto']
				]);
			
				$hoy = date('Y-m-d');

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
	
		public function obtenerAbonos($id){
			return Ingreso::all()->where('id_proyecto', $id);
		}
}
