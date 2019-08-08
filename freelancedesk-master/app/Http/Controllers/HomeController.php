<?php

namespace App\Http\Controllers;

use App\proyectos;
use App\usuarios_proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return view('selector');
        $id=	Auth::user()->id;
				//$proyectos = DB::table('proyectos')->get();
				
        $proyectos = DB::table('proyectos')->where('id_project_manager',$id)->get();
				
				$user = Auth::user();
        
      if(empty($GLOBALS['user_type']))
				  return view('tipoUsuario');
      else{
          //echo "<script>console.log('exxiste la cookie: $GLOBALS[user_type]'); </script>";
          if($GLOBALS['user_type']=="ProjectManager")
              return view('listaProyectos', ['proyectos' => $proyectos, 'tipo' => $GLOBALS['user_type'] ] );
          if($GLOBALS['user_type']=="Desarrollador")
              echo "developer";
          if($GLOBALS['user_type']=="Cliente")
              echo "customer";
      }

    }
}
?>