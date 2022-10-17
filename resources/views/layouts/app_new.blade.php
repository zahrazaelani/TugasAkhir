<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>
        @yield('title')
      </title>
    
      <!-- General CSS Files -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
    
      <!-- CSS Libraries -->
      <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
      <!-- Template CSS -->
      <link rel="stylesheet" href="{{ asset('/admin/assets/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('/admin/assets/css/components.css') }}">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>

      <!-- Main CSS -->
      <link rel="stylesheet" href="{{ asset('/style/main.css') }}">
    
  </head>

  <body class="vh-100">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
          <div class="navbar-bg"></div>
         
          {{-- Navbar  --}}
          @include('includes.navbar_new')
    
          {{-- SideBar --}}
          @include('includes.sidebar_new')
          
          @yield('content')
          <footer class="main-footer">
            <div class="footer-left">
              Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
            </div>
            <div class="footer-right">
              
            </div>
          </footer>
        </div>
      </div>

  
  <!-- General JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltip.js/1.3.3/tooltip.min.js"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
  <script src="{{ asset('/admin/assets/js/stisla.js') }}"></script>
  
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{ asset('/admin/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('/admin/assets/js/custom.js') }}"></script>

  <!-- Bootstrap core JavaScript -->
  @stack('prepend-script')
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
  <script>
    AOS.init();
  </script>
  @stack('addon-script')
  </body>
</html>
