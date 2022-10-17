 <nav
      class="navbar navbar-expand-lg navbar-light bg-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-up-left"
    >
      <div class="container">
        <a href="{{ route('home')}}" class="navbar-brand">
          <img src="/images/image_sv.png" alt="Logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mr-auto">

            @guest <!-- Kondisi user belum login -->
              <li class="nav-item ">
                <a href="{{ route('home') }}" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}">Home</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('categories') }}" class="nav-link {{ (request()->is('categories')) ? 'active' : '' }}">Kategori</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('listproduct') }}" class="nav-link {{ (request()->is('listproduct')) ? 'active' : '' }}">Produk</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('portofolio') }}" class="nav-link">Portofolio</a>
              </li>
            @endguest
            @auth
              @if (auth()->user()->roles == 'MAHASISWA') <!-- Kondisi user login sbg mahasiswa -->
                  <li class="nav-item active">
                    <a href="{{ route('home') }}" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}">Home</a>
                  </li>
              @else <!-- Kondisi user login bkn sbg mahasiswa -->
                <li class="nav-item active">
                  <a href="{{ route('home') }}" class="nav-link  {{ (request()->is('/')) ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('categories') }}" class="nav-link {{ (request()->is('categories')) ? 'active' : '' }}">Kategori</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('listproduct') }}" class="nav-link {{ (request()->is('listproduct')) ? 'active' : '' }}">Produk</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('portofolio') }}" class="nav-link {{ (request()->is('portofolio')) ? 'active' : '' }}">Portofolio</a>
                </li>
              @endif
            @endauth
          </ul>
          <ul class="navbar-nav ml-auto">
            @guest <!-- navbar kanan -->
            <li class="nav-item ">
              <a href="{{ route('register')}}" class="nav-link">Sign-Up</a>
            </li>
            <li class="nav-item ">
              <a
                href="{{ route('login')}}"
                class="btn btn-dark nav-link px-5 text-white"
                >Sign-In</a 
              >
            </li>
            @endguest


          @auth <!-- navbar kanan sdh login -->
          <ul class="navbar-nav d-none d-lg-flex">
            <li class="nav-item dropdown" style="list-style: none">
              <a
                href="#"
                class="nav-link"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
              >
                <img
                  src="{{ Storage::url(Auth::user()->image) }}"
                  alt=""
                  class="rounded-circle mr-3 profile-picture"
                />
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu">
                @if (auth()->user()->roles == 'ADMIN')
                  <a href="{{route('admin-dashboard')}}" class="dropdown-item">Admin</a>
                @endif
                @if (auth()->user()->roles == 'USER')
                  <a href="{{ route('seller-dashboard')}}" class="dropdown-item">Dashboard</a>
                @endif
                @if (auth()->user()->roles == 'BUYER')
                  <a href="{{ route('buyer-dashboard')}}" class="dropdown-item">Dashboard</a>
                @endif
                @if (auth()->user()->roles == 'MAHASISWA')
                    <a href="{{ route('mahasiswa-dashboard')}}" class="dropdown-item">Dashboard</a>
                @endif


                <a href="{{ route('dashboard-setting-account')}}" class="dropdown-item"
                  >Pengaturan</a
                >
                <div class="dropdown-divider"></div>
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
            @if (auth()->user()->roles != 'MAHASISWA') 
            <li class="nav-item" style="list-style: none">
              <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                @php
                  $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->sum('quantity'); 
                @endphp
                @if ($carts > 0)
                  <img src="/images/icon-cart-filled.svg" alt="" />
                  <div class="cart-badge">{{ $carts }}</div>
                @else
                  <img src="/images/icon-cart-empty.svg" alt="" />
                @endif
              </a>
            </li>
            @endif
          

          <!-- <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item" style="list-style: none">
              <a href="#" class="nav-link"> Hi, {{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item" style="list-style: none">
              <a href="#" class="nav-link d-inline-block"> Cart </a>
            </li>
          </ul> -->
          @endauth

        </div>
      </div>
    </nav>
