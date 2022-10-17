@extends('layouts.app_new')

@section('title')
    Dashboard Produk-Sekolah Vokasi E-COM
@endsection

@section('content')
<div class="main-content">
  <section class="section">
        <div class="container-fluid">
          <div class="section-header">
            <h1>Seller Dashboard- Daftar Produk </h2>
              <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active"></div>
              </div>
          </div>
          <div class="dashboard-content">
            
            <div class="row">
              <div class="col-md-12">
                <a
                  href="{{ route('dashboard-product-create')}}"
                  class="btn btn btn-primary"
                  >Tambah produkmu</a
                >
              </div>
            </div>
            <div class="row justify-content-between custom_s mt-4">
              <!-- data product -->
              @foreach ($products as $p)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 mb-md-auto card-wrapper">
                  <a
                    href="{{ route('dashboard-product-details', $p->id )}}"
                    class="card card-dashboard-product d-block"
                  >
                  
                    <img
                      src="{{ Storage::url($p->galleries->first()->photos ?? '') }}"
                      alt=""
                      class="image-box"
                    />
                  <div class="card-body">
                      <div class="product-title">{{ $p->name }}</div>
                      <div class="product-category">{{ $p->category->name }}</div>
                      <div class="product-category">Terjual {{ ($p->transactiondetail->sum('quantity')) }} pcs</div>
                      
                    </div>
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        
  </div>
</div>         
@endsection
@push('addon-script')
<style>
  .custom_s::after {
    content: "";
    flex: auto;
  }
  .custom_s .card {
    width: 230px;
  }
  .custom_s .image-box {
    width: 230px;
    height: 230px;
    max-width: 100%;
    object-fit: cover;
    padding: 8px
  }
  
  @media (max-width: 720px) {
    .custom_s .card {
      width: 100%;
    }
    .custom_s .image-box {
      width: 100%;
      max-height: 100%;
      min-height: 330px;
    }
  }
</style>
@endpush