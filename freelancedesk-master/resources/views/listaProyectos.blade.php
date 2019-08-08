@extends('layouts.principal')

@section('user')
 {{Auth::user()->name}} 
@endsection

@section('email')
 {{Auth::user()->email}} 
@endsection

@section('principal')

<div class="page-content d-flex align-items-stretch" id="app">
        <div class="page-content d-flex align-items-stretch">
            <div class="default-sidebar">
                <nav class="side-navbar box-scroll sidebar-scroll">
                    <ul class="list-unstyled">
                        <li><a  href="#" ><i class="nav-icon fas fa-tachometer-alt  active router-link-active"></i> Dashboard</a></li>
                        <li><router-link to="/proyectos"><i class="ion-hammer"></i><span>Proyectos</span></router-link></li>
                        <li><router-link v-show="{{ $tipo=='ProjectManager'}}" to="/empresas"><i class="ion-briefcase"></i><span>Empresas</span></router-link></li>
                        <li><router-link v-show="{{ $tipo=='ProjectManager'}}" to="/clientes"><i class="fas fa-user-tie"></i><span>Clientes</span></router-link></li>
                        <li><router-link v-show="{{ $tipo=='ProjectManager'}}" to="/desarrolladores"><i class="fas fa-laptop-code"></i><span>Desarrolladores</span></router-link></li>
                    <!--    <li><router-link to="/tickets"><i class="ion-chatboxes"></i><span>Tickets</span></router-link></li> -->
                        <li><router-link v-show="{{ $tipo=='ProjectManager' || $tipo=='Desarrollador' }}" to="/issues"><i class="fas fa-code-branch"></i><span>Issues</span></router-link></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="content-inner mt-5">
            <div class="container-fluid">
                <div>
                    <router-view tipo-usuario="{{ $tipo }}" id-user-sesion="{{ Auth::user()->id}}" ></router-view>
                </div>
            </div>

@endsection