@extends('layouts.principal')

@section('principal')

    <div id="app">
        @if($tipo)
            @if ($tipo == 'Cliente')
                @include('contenido.customer')
            @elseif ($tipo== 'Desarrollador')
                @include('contenido.developer')
            @elseif ($tipo == 'ProjectManager')
                @include('contenido.projectManager') 
            @else
            @endif
        @endif
        <div class="content-inner">
            <div class="container-fluid">
                <router-view tipo-usuario="{{ $tipo }}"  id-proyecto="{{ $idProyecto }}"  id-usuario-loggeado="{{ $idUsuario }}" nombre-usuario="{{$nombreUsuario}}"></router-view>
                <vue-progress-bar></vue-progress-bar>
            </div>
        </div>
    </div>

@endsection
  
