@extends('layouts.admin.app')

@section('title')
    Transaksi - Sekolah Vokasi E-COM
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section" data-aos="fade-up">
      <div class="section-header">
        <h1>Admin Dashboard - Penarikan Uang </h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="#">Penarikan Uang</a></div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Penarikan Uang- Marketplace Sekolah Vokasi </h2>
        <p class="section-lead">List Penarikan Uang</p>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Transaksi</th>
                                <th>Akun Pengaju</th>
                                <th>Total Penarikan</th>
                                <th>Pemilik Rekening</th>
                                <th>Nomor Rekening</th>
                                <th>Bank</th>
                                <th>Status</th>
                                <th>Tanggal Pengajuan</th>
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
                { data: 'transaction_details_id', name: 'transaction_details_id' },
                { data: 'user.name', name: 'user.name' },
                { data: 'total_withdraw', name: 'total_withdraw' },
                { data: 'name', name: 'name' },
                { data: 'rekening', name: 'rekening' },
                { data: 'bank', name: 'bank' },
                { data: 'status', name: 'status' },
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