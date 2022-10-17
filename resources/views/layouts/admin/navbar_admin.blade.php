
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
     
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="{{ asset('images/admin.png') }}" class="rounded-circle mr-1">
          <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
          <div class="dropdown-menu dropdown-menu-right ">
            @if (auth()->user()->roles == 'ADMIN')
            <a href="{{route('admin-dashboard')}}" class="dropdown-item has-icon">
                <span>Admin</span>
                <i class="far fa-user"></i>
              </a>
          @endif
          @if (auth()->user()->roles == 'USER')
          <a href="{{ route('seller-dashboard')}}" class="dropdown-item has-icon">
            <span>Dashboard</span>
            <i class="far fa-user"></i>
          </a>
          @endif
          @if (auth()->user()->roles == 'BUYER')
          <a href="{{ route('buyer-dashboard')}}" class="dropdown-item has-icon">
            <span>Dashboard</span>
            <i class="far fa-user"></i>
          </a>
          @endif
          @if (auth()->user()->roles == 'MAHASISWA')
          <a href="{{ route('mahasiswa-dashboard')}}" class="dropdown-item has-icon">
            <span>Dashboard</span>
            <i class="far fa-user"></i>
          </a>
          @endif
            <a href="{{ route('home') }}" class="dropdown-item has-icon">
              <span>Home</span>
              <i class="fas fa-home"></i>
            </a>
            <a href="{{ route('dashboard-setting-account')}}" class="dropdown-item has-icon">
              <span>Pengaturan</span>
              <i class="fas fa-cog"></i>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
              <span>LogOut</span>
              <i class="fas fa-sign-out-alt"></i>
            </a>
          </div>
        </li>
      </ul>
  </nav>
