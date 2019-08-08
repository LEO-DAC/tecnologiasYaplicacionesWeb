<?php

namespace App\Http\Controllers\API;

use App\incidencias;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return incidencias::latest()->paginate(10);
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
       $this->validate($request,[
            'id_proyecto' => 'required',
            'nombre' => 'required|string',
            'status' => 'required|string|max:10',
            'descripcion' => 'required|string|max:650',
        ]);
        //return $request->all();
        return incidencias::create([
            'id_proyecto' => $request['id_proyecto'],
            'nombre' => $request['nombre'],
            'status' => $request['status'],
            'descripcion' => $request['descripcion'],
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
      
        $issue = incidencias::findOrFail($id);

        $issue->update($request->all());
        return ['mensaje' => 'informacion actualizada correctamente'];
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
        $issue = incidencias::findOrFail($id);

        $issue->delete();
        return ['mensaje' => 'Registro eliminado'];
    }
}
