<?php

namespace App\Http\Controllers\API;

use App\empresas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class empresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return empresas::latest()->paginate(10);
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
            'nombre' => 'required|string|max:50',
            'CP' => 'required|string|max:10',
            'pais' => 'required|string|max:50',
            'estado' => 'required|string|max:50',
            'ciudad' => 'required|string|max:50',
            'telefono' => 'required|string|max:25',
            'direccion' => 'required|string',
        ]);
        //return $request->all();
        return empresas::create([
            'nombre' => $request['nombre'],
            'CP' => $request['CP'],
            'pais' => $request['pais'],
            'estado' => $request['estado'],
            'ciudad' => $request['ciudad'],
            'telefono' => $request['telefono'],
            'direccion' => $request['direccion'],
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
        $empresa = empresas::findOrFail($id);

        $empresa->update($request->all());
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
        $empresa = empresas::findOrFail($id);
        // delete the user
        $empresa->delete();
        return ['message' => 'Row deleted'];
    }
}
