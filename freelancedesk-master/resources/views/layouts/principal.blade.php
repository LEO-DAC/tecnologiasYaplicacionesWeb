<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-8825027796099212",
        enable_page_level_ads: true
      });
    </script>
  
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
    </script>
    @include('links.toplinks')
    <link rel="shortcut icon" href="{{ asset('logo.png') }}">
    <title>FreelanceDesk</title>
  
</head>
<body id="page-top" >
    <!-- Begin Preloader -->
    <div id="preloader">
        <div class="canvas">
            <img src="coder.png" alt="logo" class="loader-logo">
            <div class="spinner"></div>   
        </div>
    </div>
    <!-- End Preloader -->
    
    <div class="page " >
        <!-- Begin Header -->
        <header class="header">
            <nav class="navbar fixed-top">         

                <!-- Begin Topbar -->
                <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                    <!-- Begin Logo -->
                    <div class="navbar-header">
                        <a href="/home" class="navbar-brand">
                            <div class="brand-image brand-big">
                                <img src="logo-big.png" alt="logo" class="logo-big">
                            </div>
                            <div class="brand-image brand-small">
                                <img src="logo.png" alt="logo" class="logo-small">
                            </div>
                        </a>
                        <!-- Toggle Button -->
                        <a id="toggle-btn" href="#" class="menu-btn active">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <!-- End Toggle -->

                        
                    </div>
                    <!-- End Logo -->
                    <!-- Begin Navbar Menu -->
             
                    
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                            <div class="row">
																<a href="/home" class="btn btn-success" >  <i class="fas fa-home"></i>  </a>
														</div>
                                
                            <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="coder.png" alt="..." class="avatar rounded-circle"></a>
                            <ul aria-labelledby="user" class="user-size dropdown-menu">
                                <li class="welcome">
                                    <img src="coder.png" alt="..." class="rounded-circle">
                                </li>
                              <div class="infos">
                                  <h2>@yield('user')</h2><br>
                                  <div class="location"><center>@yield('email')</center></div>
                              </div>
                                <li>
                                    <a href="app-mail.html" class="dropdown-item"> 
                                        <i class="fas fa-user-cog fa-2x fa-fw" style="color: #3490dc "></i> <span style="font-size: 20px"> Perfil </span>
                                    </a>
                                </li>
                                <li class="separator"></li>
                                <li>
                                    <a rel="nofollow" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();" class="dropdown-item logout text-center">
                                        <i class="ti-power-off"></i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>  
                    </ul>
                </div> 
            </nav>
        </header>
        @yield('principal')
        </div>
    @include('links.footerlinks')  
</body>
</html>