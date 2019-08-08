<?php

namespace App\Http\Controllers\API;

use App\proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClientesController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
      
              $id_project_manager = $request->id_project_manager;
      
      /*
      SELECT u.id,u.name, count(*) as total,
					count(  IF(p.status='Activo',1, NULL)) as activos, 
					count(  IF(p.status='Terminado',1, NULL)) as terminados, 
                    count(  IF(p.status='Inactivo',1, NULL)) as inactivos 
                FROM proyectos as p
			INNER JOIN users as u on u.id = p.id_cliente
            WHERE p.id_project_manager=2
            GROUP by u.id	
      
      
      */
              return $clientes =proyectos::where('id_project_manager', '=', $id_project_manager)
                        ->join('users','users.id','=','proyectos.id_cliente')
                        ->select('users.name',DB::raw('count(*) as total'),
                                              DB::raw("count(IF(proyectos.status='Activo',1, NULL)) as activos"),
                                              DB::raw("count(IF(proyectos.status='Inactivo',1, NULL)) as inactivos"),
                                              DB::raw("count(IF(proyectos.status='Terminado',1, NULL)) as terminados"))
                         ->groupBy('name')
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
