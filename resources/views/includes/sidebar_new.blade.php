
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/o.png') }}" style="height: 100px;width:auto;margin-bottom:100px"></a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">SEV</a>
      </div>
      <ul class="sidebar-menu">
        @if (auth()->user()->roles == 'USER')
        <li class="{{ Route::is('seller-dashboard') ? 'active' : '' }}">
            <a class="nav-link " href="{{ route('seller-dashboard') }}">
                <i class="fas fa-grip-horizontal"></i> <span>Dashboard</span></a></li>
        @endif

        @if (auth()->user()->roles == 'USER')
        <li class="{{ Route::is('dashboard-product') ? 'active' : '' }}">
            <a class="nav-link " href="{{ route('dashboard-product') }}">
                <i class="fas fa-ice-cream"></i> <span>Produk</span></a></li>
        @endif

        @if (auth()->user()->roles == 'BUYER')
        <li class="{{ Route::is('buyer-dashboard') ? 'active' : '' }}">
            <a class="nav-link " href="{{ route('buyer-dashboard') }}">
                <i class="fas fa-grip-horizontal"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="{{ Route::is('dashboard-refund') ? 'active' : '' }}">
            <a class="nav-link " href="{{ route('dashboard-refund') }}">
                <i class="fas fa-ice-cream"></i> <span>Pengembalian Dana</span>
            </a>
        </li>
                  
        @endif
        @if (auth()->user()->roles != 'MAHASISWA')
        <li class="{{ Route::is('dashboard-transaction') ? 'active' : '' }}">
            <a class="nav-link " href="{{ route('dashboard-transaction') }}">
                <i class="fas fa-money-bill-wave"></i> <span>Transaksi</span></a></li>
        @endif
        @if (auth()->user()->roles == 'USER')
        <li class="{{ Route::is('dashboard-withdraw') ? 'active' : '' }}">
            <a class="nav-link " href="{{ route('dashboard-withdraw') }}">
                <i class="fas fa-money-bill-wave"></i> <span>Pengajuan Penarikan</span></a></li>
        <li class="dropdown {{ Route::is('dashboard/portofolio/biodata*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-address-card"></i> <span>Portofolio</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Route::is('portofolio-biodata') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-biodata') }}"><i class="fas fa-address-card"></i> <span>Biodata</a></span></li>
                <li class="{{ Route::is('portofolio-pendidikan') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-pendidikan') }}">	
                    <i class="fas fa-school"></i><span>Pendidikan</a></span></li>
                <li class="{{ Route::is('portofolio-kepanitiaan') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-kepanitiaan') }}"><i class="fas fa-users"></i> <span>Kepanitiaan</a></span></li>
                <li class="{{ Route::is('portofolio-organisasi') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-organisasi') }}">	
                    <i class="fas fa-users"></i> <span>Organisasi</a></span></li>
                
        <li class="{{ Route::is('portofolio-experiences') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-experiences') }}"><i class="fas fa-hard-hat"></i> <span>Experience</a></span></li>
        <li class="{{ Route::is('portofolio-projects') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-projects') }}"><i class="fas fa-laptop-code"></i><span>Project</a></span></li>
        <li class="{{ Route::is('portofolio-skills') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-skills') }}">	
            <i class="fas fa-laptop"></i><span>Skills</a></span></li>
        <li class="{{ Route::is('portofolio-setting') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-setting') }}">	
            <i class="fas fa-cogs"></i> <span>Pengaturan Portofolio</a></span></li>
            </ul>
          </li>
          <li class="{{ Route::is('dashboard-setting-store') ? 'active' : '' }}">
            <a class="nav-link " href="{{ route('dashboard-setting-store') }}">
                <i class="fas fa-cogs"></i> <span>Pengaturan Toko</span></a></li>
        @endif
        @if (auth()->user()->roles == 'MAHASISWA')
        <li class="{{ Route::is('portofolio-biodata') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-biodata') }}"><i class="fas fa-address-card"></i> <span>Biodata</a></span></li>
        <li class="{{ Route::is('portofolio-pendidikan') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-pendidikan') }}">	
            <i class="fas fa-school"></i> <span>Pendidikan</a></span></li>
        <li class="{{ Route::is('portofolio-kepanitiaan') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-kepanitiaan') }}"><i class="fas fa-users"></i> <span>Kepanitiaan</a></span></li>
        <li class="{{ Route::is('portofolio-organisasi') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-organisasi') }}"><i class="fas fa-users"></i> <span>Organisasi</a></span></li>
        <li class="{{ Route::is('portofolio-experiences') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-experiences') }}"><i class="fas fa-hard-hat"></i> <span>Experience</a></span></li>
        <li class="{{ Route::is('portofolio-projects') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-projects') }}"><i class="fas fa-laptop-code"></i><span>Project</a></span></li>
        <li class="{{ Route::is('portofolio-skills') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-skills') }}">	
            <i class="fas fa-laptop"></i><span>Skills</a></span></li>
        <li class="{{ Route::is('portofolio-setting') ? 'active' : '' }}"><a class="nav-link " href="{{ route('portofolio-setting') }}">	
            <i class="fas fa-cogs"></i> <span>Pengaturan Portofolio</a></span></li>
      @endif
      
        <li class="{{ Route::is('dashboard-setting-account') ? 'active' : '' }}" >
            <a href="{{ route('dashboard-setting-account')}}" class="nav-link ">
                <i class="fas fa-user-cog"></i> <span>Pengaturan Akun</span></a>
          </li>
        
      </ul>
      </aside>
  </div>
