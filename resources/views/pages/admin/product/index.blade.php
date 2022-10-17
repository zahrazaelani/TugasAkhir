@extends('layouts.admin.app')

@section('title')
    Produk- Marketplace Sekolah Vokasi 
@endsection

@section('content')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section" data-aos="fade-up">
          <div class="section-header">
            <h1>Admin Dashboard - Product </h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="#">Product</a></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Produk- Marketplace Sekolah Vokasi </h2>
            <p class="section-lead">Marketplace Sekolah Vokasi</p>
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('product.create')}}" class="btn btn-primary mb-3">
                        Tambah Produk
                    </a>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered scroll-horizontal-vertical w-100" id="tabelproduk">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>User</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Terjual</th>
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
<!--nambahin script -->
@push('addon-script')
    <script>
        var datatable = $('#tabelproduk').DataTable({ //manggil data tablenya(var datatable adalah nama variablenya)
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}', //Panggil url untuk data table makanya pake ajax, dikasi url dari halaman itu sendiri
            },
            columns: [ //buat columnya bagian name itu disesuaikan dgn nama ditabel
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'user.name', name: 'user.name' }, //buat akses relasi
                { data: 'category.name', name: 'category.name' },
                { data: 'price', name: 'price' },
                { data: 'stock', name: 'stock' },
                { data: 'transactiondetail_sum_quantity', name: 'transactiondetail_sum_quantity', orderable: false, //fungsinya supaya field action gabisa disortir
                    searchable:false, },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false, //fungsinya supaya field action gabisa disortir
                    searchable:false,
                    widht: '15%',
                },
            ]
        })
    </script>
@endpush
