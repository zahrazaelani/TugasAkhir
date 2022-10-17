@extends('layouts.admin.app')

@section('title')
    Transaksi - Sekolah Vokasi E-COM
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section" data-aos="fade-up">
      <div class="section-header">
        <h1>Admin Dashboard - Transaksi </h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="#">Transaksi</a></div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Transaksi- Marketplace Sekolah Vokasi </h2>
        <p class="section-lead">List Transaksi</p>
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
                <div class="table-responsive">
                    <table class="table table-hover table-bordered scroll-horizontal-vertical w-100" id="crudTable">
                        <thead >
                            <tr>
                                <th>Kode Transaksi</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Tanggal Transaksi</th>
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
                { data: 'code', name: 'code' },
                { data: 'user.name', name: 'user.name' },
                { data: 'total_price', name: 'total_price' },
                { data: 'transaction_status', name: 'transaction_status' },
                { data: 'created_at', name: 'created_at' },
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