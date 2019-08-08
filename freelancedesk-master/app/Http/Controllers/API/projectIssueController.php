<?php

namespace App\Http\Controllers\API;

use App\incidencias;
use App\proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class projectIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if(!empty($request->id_project_manager)){
           $id_project_manager = $request->id_project_manager;
           $return = proyectos::where('id_project_manager','=',$id_project_manager)
            ->join('incidencias','incidencias.id_proyecto','=','proyectos.id')
            ->select('proyectos.nombre','proyectos.id',DB::raw("count(*) as total"),
                      DB::raw("count(IF(incidencias.status='Atendido',1, NULL)) as atendidos"),
                      DB::raw("count(IF(incidencias.status='Pendiente',1, NULL)) as pendientes")
            )->groupBy('proyectos.nombre')
            ->paginate(10);
         return $return;
      }
      if(!empty($request->id_proyecto)){
        $return = incidencias::where('id_proyecto','=',$request->id_proyecto)
          ->select('incidencias.*')
          ->paginate(10);
        return $return;
      }
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
