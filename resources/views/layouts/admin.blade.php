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

    <title>@yield('title')</title>
    @stack('prepend-style')

    <link rel="stylesheet" href="/admin/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/assets/modules/fontawesome/css/all.min.css">
  
    <!-- CSS Libraries -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    <link href="/style/main.scss" rel="stylesheet" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="/admin/assets/css/style.css">
    <link rel="stylesheet" href="/admin/assets/css/components.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
    @stack('addon-style')
    
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!--sideebar-->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/admin.png" class="my-4" style="max-width: 100px" alt="" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="{{ route('admin-dashboard')}}"
              class="list-group-item list-group-item-action list-group-item-info"
            >
              Dashboard
            </a>
            <a
              href="{{ route('product.index')}}"
              class="list-group-item list-group-item-action list-group-item-info {{ (request()->is('admin/product')) ? 'active' : '' }}"
            >
              Produk
            </a>
            <a
              href="{{ route('product-gallery.index')}}"
              class="list-group-item list-group-item-action list-group-item-info {{ (request()->is('admin/product-gallery*')) ? 'active' : '' }}"
            >
              Produk Galeri
            </a>
            <a
              href="{{ route('category.index')}}"
              class="list-group-item list-group-item-action list-group-item-info {{ (request()->is('admin/category*')) ? 'active' : '' }}"
            >
              Kategori
            </a>
            <a
              href="{{ route('slider.index')}}"
              class="list-group-item list-group-item-action list-group-item-info {{ (request()->is('admin/slider*')) ? 'active' : '' }}"
            >
              Slider
            </a>
            <a
              href="{{ route('transaction.index')}}"
              class="list-group-item list-group-item-action list-group-item-info {{ (request()->is('admin/transaction*')) ? 'active' : '' }}"
            >
              Transaksi
            </a>
            <a
              href="{{ route('withdraw.index')}}"
              class="list-group-item list-group-item-action list-group-item-info{{ (request()->is('admin/withdraw*')) ? 'active' : '' }}"
            >
              Penarikan 
            </a>
            <a
            href="{{ route('refund.index')}}"
            class="list-group-item list-group-item-action list-group-item-info{{ (request()->is('admin/refund*')) ? 'active' : '' }}"
            >
              Pengembalian Dana 
            </a>
            <a
              href="{{ route('user.index')}}"
              class="list-group-item list-group-item-action list-group-item-info {{ (request()->is('admin/user*')) ? 'active' : '' }}"
            >
              Pengguna
            </a>
            <a
              href="{{ route('sertifikat.index') }}"
              class="list-group-item list-group-item-action list-group-item-info {{ (request()->is('admin/sertifikat*')) ? 'active' : '' }}"
            >
              Sertifikat
            </a>
            <a
              href="#"
              class="list-group-item list-group-item-action list-group-item-info"
            >
              Pengaturan Akun
            </a>
            <a
              href="/index.html"
              class="list-group-item list-group-item-action list-group-item-info"
            >
              Sign Out
            </a>
          </div>
        </div>

        
        <div class="main-sidebar sidebar-style-2" >
          <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('home')}}">E-Commerce SV UNS</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
              <a href="{{ route('admin-dashboard')}}" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Management Product</li>
            <li><a class="nav-link" href="{{ route('product.index') }}"><i class="far fa-square"></i> <span>Product</span></a></li>
            <li><a class="nav-link" href="{{ route('product-gallery.index') }}"><i class="far fa-square"></i> <span>Gallery Product</span></a></li>
            
            <li class="menu-header">Management Transaction</li>
            <li><a class="nav-link" href="{{ route('product.index') }}"><i class="far fa-square"></i> <span>Transaction</span></a></li>
            <li><a class="nav-link" href="{{ route('refund.index') }}"><i class="far fa-square"></i> <span>Refund</span></a></li>
            <li><a class="nav-link" href="{{ route('withdraw.index') }}"><i class="far fa-square"></i> <span>Withdraw</span></a></li>

            <li class="menu-header">Master</li>
            <li><a class="nav-link" href="{{ route('slider.index') }}"><i class="far fa-square"></i> <span>Slider</span></a></li>
            <li><a class="nav-link" href="{{ route('category.index') }}"><i class="far fa-square"></i> <span>Category</span></a></li>
            <li><a class="nav-link" href="{{ route('sertifikat.index') }}"><i class="far fa-square"></i> <span>Sertificate</span></a></li>
            <li><a class="nav-link" href="{{ route('user.index') }}"><i class="far fa-square"></i> <span>User</span></a></li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('logout') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Log Out
            </a>
          </div>        
          </aside>
        </div>
        <!-- Page Content -->
        <div id="page-content-wrapper">
          <nav
            class="navbar navbar-store navbar-expand-lg navbar-light fixed-top"
            data-aos="fade-down"
          >
            <div class="container-fluid">
                <button
                class="btn btn-secondary d-md-none mr-auto mr-2"
                id="menu-toggle"
                >
                &laquo; Menu
                </button>

                <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto d-none d-lg-flex">
                    <li class="nav-item dropdown">
                    <a
                        class="nav-link"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <img
                        src="/images/icon-user.png"
                        alt=""
                        class="rounded-circle mr-2 profile-picture"
                        />
                        Hi, {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                   Log Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </div>
            </li>
                      
                    
                </ul>
                <!-- Mobile Menu -->
                <ul class="navbar-nav d-block d-lg-none mt-3">
                    <li class="nav-item">
                    <a class="nav-link" href="#"> Hi, Siapa anda? </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link d-inline-block" href="#"> Cart </a>
                    </li>
                </ul>
                </div>
            </div>
          </nav>

            {{--content--}}
            @yield('content')

        </div>
      </div>
    </div>
  </body>
  <!-- Bootstrap core JavaScript -->
  @stack('prepend-script')
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  
   @stack('addon-script')
   
   @push('addon-script')
   <script src="/admin/assets/modules/jquery.min.js"></script>
   <script src="/admin/assets/modules/popper.js"></script>
   <script src="/admin/assets/modules/tooltip.js"></script>
   <script src="/admin/assets/modules/bootstrap/js/bootstrap.min.js"></script>
   <script src="/admin/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
   <script src="/admin/assets/modules/moment.min.js"></script>
   <script src="/admin/assets/js/stisla.js"></script>
   <script src="/admin/assets/js/scripts.js"></script>
   <script src="/admin/assets/js/custom.js"></script>       
   @endpush
</html>
