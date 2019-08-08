@extends('auth.contenido')
@section('login')
    <div class="container-fluid no-padding h-100">

            <div class="row flex-row h-100 bg-white">
                <!-- Begin Left Content -->
                <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12 col-12 no-padding">
                    <div class="elisyam-bg background-03">
                        <div class="elisyam-overlay overlay-08"></div>
                        <div class="authentication-col-content-2 mx-auto text-center">
                            <div class="logo-centered">
                                <a href="db-default.html">
                                    <img src="logo.png" alt="logo">
                                </a>
                            </div>
                            <h1>Accede a FreelanceDesk</h1>
                            <span class="description">
                               Esta aplicación web fue creada para administrar proyectos de desarrollo software. 
                            </span>
                            <ul class="login-nav nav nav-tabs mt-5 justify-content-center" role="tablist" id="animate-tab">
                                <li><a class="active" data-toggle="tab" href="#singin" role="tab" id="singin-tab" data-easein="zoomInUp">Acceder</a></li>
                                <li><a data-toggle="tab" href="#signup"  role="tab" id="signup-tab" data-easein="zoomInRight">Registrarse</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Left Content -->
                <!-- Begin Right Content -->
                <div class="col-xl-9 col-lg-7 col-md-7 col-sm-12 col-12 my-auto no-padding">
                    <!-- Begin Form -->
                    <div class="authentication-form-2 mx-auto">
                        <div class="tab-content" id="animate-tab-content">
                            <!-- Begin Sign In -->
                            <div role="tabpanel" class="tab-pane show active" id="singin" aria-labelledby="singin-tab">
                                <h3>Accede a FreelanceDesk</h3>
                              <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                  @csrf
                                  <div class="group material-input">
                                          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                          @if ($errors->has('email'))
                                              <span class="bar" role="alert">
                                                  <strong>{{ $errors->first('email') }}</strong>
                                              </span>
                                          @endif
                                          <label for="email">{{ __('Dirección de correo') }}</label>
                                  </div>
                                  <div class="group material-input">
                                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                       @if ($errors->has('password'))
                                           <span class="bar" role="alert">
                                                 <strong>{{ $errors->first('password') }}</strong>
                                           </span>
                                           @endif 
                                      <label for="password" >{{ __('Contraseña') }}</label>
                                   </div>
                                
                                   
                                  <div class="row">
                                    <div class="col text-left">
                                        <div class="styled-checkbox">
                                            <input type="checkbox" ame="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                              <label class="form-check-label" for="remember">
                                                  {{ __('Recordarme') }}
                                              </label>
                                          </div>
                                      </div>
                                  </div>
                                
                                    <div class="form-group row mb-0">
                                      <div class="col-md-8 offset-md-4">
                                          <button type="submit" class="btn btn-primary">
                                              {{ __('Entrar') }}
                                          </button>
                                          <a class="btn btn-link" href="{{ route('password.request') }}">
                                              {{ __('¿Olvidaste tu contraseña?') }}
                                         </a>  
                                      </div>
                                    </div>
                              </form>
                          </div>
                          
                           <!-- Begin Sign Up -->
                            <div role="tabpanel" class="tab-pane" id="signup" aria-labelledby="signup-tab">
                                <h3>Crear una cuenta</h3>
                                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                    @csrf
                                    <div class="group material-input">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                               <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <label for="name">{{ __('Nombre') }}</label>
                                    </div>
                                    <div class="group material-input">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        <label for="email">{{ __('Dirección de correo') }}</label>
                                    </div>
                                    <div class="group material-input">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                            @if ($errors->has('password'))
                                                <span class="bar" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                           <label for="password">{{ __('Contraseña') }}</label>
                                     </div>
                                      <div class="group material-input">
                                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                             <label for="password-confirm" >{{ __('Confirmar contraseña') }}</label>
                                      </div>
                                      <div class="sign-btn text-center">
                                          <button type="submit" class="btn btn-lg btn-gradient-01">
                                              {{ __('Registrar') }}
                                          </button>
                                      </div>
                              </form>
                            </div>
                            <!-- End Sign Up -->
                   </div>
        </div>
    </div>
</div>
@endsection
