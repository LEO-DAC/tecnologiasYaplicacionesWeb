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
    <!-- se incluyen los links de los archivos .css-->
   @include('links.toplinks')
   <link rel="shortcut icon" href="{{ asset('logo.png') }}">
   <title>FreelanceDesk</title>
</head>

  
<body id="page-top" >
  <div class="page">
    <!-- lugar donde se hará uso del section 'login' -->
    @yield('login')
    @yield('selector_user')
  </div>
  
   
  <script href="js/app.js"></script>
  <!-- se incluyen los links de los archivos .js-->
  @include('links.footerlinks')
</body>
</html>