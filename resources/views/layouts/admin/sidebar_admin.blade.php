
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
 
        <li class="{{ Route::is('admin-dashboard') ? 'active' : '' }}">
            <a class="nav-link " href="{{ route('admin-dashboard') }}"><i class="fas fa-grip-horizontal"></i><span>Dashboard</span></a></li>
      
        <li class="dropdown {{ Route::is('product.index') ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown">	
            <i class="fas fa-ice-cream"></i><span>Produk</span></a>
          <ul class="dropdown-menu">
            <li class="{{ Route::is('product.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('product.index') }}">Produk</a></li>
            <li class="{{ Route::is('admin/product-gallery*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('product-gallery.index') }}">Produk Galeri</a></li>
          </ul>
        </li>
        
        <li class="{{ Route::is('category.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-shapes"></i> <span>Kategori</span></a></li>
       
        <li class="{{ Route::is('tags.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('tags.index') }}"><i class="fas fa-tag"></i> <span>Tags</span></a></li>
       
        <li class="{{ Route::is('slider.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('slider.index') }}"><i class="fas fa-sliders-h"></i> <span>Slider</span></a></li>
     
        <li class="dropdown {{ Route::is('transaction.index') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-wave"></i> <span>Transaksi</span></a>
            <ul class="dropdown-menu">
              <li class="{{ Route::is('transaction.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('transaction.index') }}">Transaksi</a></li>
              <li class="{{ Route::is('withdraw.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('withdraw.index') }}">Penarikan</a></li>
              <li class="{{ Route::is('refund.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('refund.index') }}">Pengembalian Uang</a></li>
            </ul>
          </li>
          
          <li class="{{ Route::is('sertifikat.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('sertifikat.index') }}"><i class="fas fa-certificate"></i> <span>Sertifikat</span></a></li>
       
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>User</span></a>
          <ul class="dropdown-menu">
            <li class="{{ Route::is('user.index') ? 'active' : '' }}"><a href="{{ route('user.index') }}">Pengguna</a></li> 
            <li class="{{ Route::is('dashboard-setting-account') ? 'active' : '' }}"><a href="{{ route('dashboard-setting-account')}}">Pengaturan Akun</a></li> 
          </ul>
        </li>
        
      </ul>
      </aside>
  </div>
