@extends('layouts.admin.app')

@section('title')
    Produk Galeri-Sekolah Vokasi E-COM
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section" data-aos="fade-up">
      <div class="section-header">
        <h1>Admin Dashboard - Galeri Produk </h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="#">Product</a></div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Produk- Marketplace Sekolah Vokasi </h2>
        <p class="section-lead">Tambah Produk Baru</p>
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card">
            <div class="card-body">
                <a href="{{ route('product-gallery.create')}}" class="btn btn-primary mb-3">
                    Tambah Galeri Produk
                </a>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered scroll-horizontal-vertical w-100" id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Produk</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>

@endsection

@push('addon-script')
    <script>
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'product.name', name: 'product.name' },
                { data: 'photos', name: 'photos' },
                { 
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable:false,
                    widht: '15%',
                },
            ]
        })
    </script>
@endpush