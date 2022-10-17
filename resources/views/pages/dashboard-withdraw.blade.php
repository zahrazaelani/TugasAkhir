@extends('layouts.app_new')

@section('title')
    Pengajuan Penarikan-Sekolah Vokasi E-COM
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Seller Dashboard - Penarikan Uang</h1>
                <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active"></div>
                </div>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                              <a href="{{ route('dashboard-withdraw-create')}}" class="btn btn-primary mb-3">
                                + Tambah Pengajuan 
                              </a>
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
                                        <tbody>
                                           
                                        </tbody>
                                    </table>
                              </div>
                            </div>
                        </div>
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
                { data: 'status', name: 'status'},
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