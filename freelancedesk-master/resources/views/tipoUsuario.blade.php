@extends('layouts.principal')
@section('principal')


<div class="row">
	
	
        <div class="content mt-5 col align-self-center">
            <div class="container">
                <!-- Begin Page Header-->
                <div class="row">
                    <div class="page-header">
                        <div class="d-flex align-items-center">
                            <h2 class="page-header-title"><i class="fas fa-users"></i>Iniciar sesión como</h2>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->
                <!-- Begin Row -->
                <div class="row flex-row">



                    

                    <div class="col-xl-4 col-md-4">
                        <div class="widget-39 widget d-flex align-items-center justify-content-center bg-dark has-shadow">
                            <div class="widget-effect">
                                <i class="ti-briefcase"></i>
                            </div>
                            
                            <div class="widget-body text-center">
                                <i class="ti ti-briefcase mb-3 text-gradient-01"></i>
                                    <div class="congrats-name mb-2">Jefe de proyecto</div>
                                <p>Administracion proyectos de los que estas a cargo</p>

                                <form action="/proyectos" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="tipo" value="ProjectManager">
                                    <button name="btn_click" class="btn btn-primary btn-lg mr-1 mb-2"> Entrar </button>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-4">
                        <div class="widget-39 widget d-flex align-items-center justify-content-center bg-dark has-shadow">
                            <div class="widget-effect">
                                <i class="ti ti-hummer"></i>
                            </div>
                            
                            <div class="widget-body text-center">
                                <i class="ti ti-hummer mb-3 text-gradient-01"></i>
                                    <div class="congrats-name mb-2">Desarrollador</div>
                                <p>Administracion proyectos en los que estas trabajando</p>

                                <form action="/proyectos" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="tipo" value="Desarrollador">
                                    <button name="btn_click" class="btn btn-primary btn-lg mr-1 mb-2"> Entrar </button>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-4">
                        <div class="widget-39 widget d-flex align-items-center justify-content-center bg-dark has-shadow">
                            
                            <div class="widget-effect">
                                <i class="ti ti-user"></i>
                            </div>
                            <div class="widget-body text-center">
                                <i class="ti ti-user mb-3 text-gradient-01"></i>
                                    <div class="congrats-name mb-2">Cliente</div>
                                <p>Ve el avance de los proyectos que ordenaste</p>

                                <form action="/proyectos" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="tipo" value="Cliente">
                                    <button name="btn_click" class="btn btn-primary btn-lg mr-1 mb-2"> Entrar </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
                
            </div>
            <!-- End Container -->

            
        </div>
        <!-- End Content -->
    </div>

  <script>console.log(window.flag);</script>
@endsection