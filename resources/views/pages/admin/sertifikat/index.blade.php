@extends('layouts.admin.app')

@section('title')
    Dashboard-Sekolah Vokasi E-COM
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section" data-aos="fade-up">
      <div class="section-header">
        <h1>Admin Dashboard - Sertifikat</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="#">Sertifikat</a></div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Sertifikat- Marketplace Sekolah Vokasi </h2>
        <p class="section-lead">List Sertifikat</p>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-certificate"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Sertifikat</h4>
                  </div>
                  <div class="card-body">
                    {{ $data_sertifikat['total'] }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fab fa-bitbucket"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Request</h4>
                  </div>
                  <div class="card-body">
                    {{ $data_sertifikat['pending'] }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-stamp"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Approve</h4>
                  </div>
                  <div class="card-body">
                    {{ $data_sertifikat['approved'] }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-window-close"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Rejected</h4>
                  </div>
                  <div class="card-body">
                    {{ $data_sertifikat['rejected'] }}
                  </div>
                </div>
              </div>
            </div>                  
          </div>
          <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered scroll-horizontal-vertical w-100" id="crudTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Jenis</th>
                                <th>Lembaga</th>
                                <th>No Sertifikat</th>
                                <th>Sertifikat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
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
                { "data" : null, "sortable":false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;}
                },
                { data: 'user.name', name: 'user.name' },
                { data: 'jenis', name: 'jenis' },
                { data: 'lembaga', name: 'lembaga' },
                { data: 'no_sertifikat', name: 'no_sertifikat' },
                // { data: 'path_url_photo', name: 'path_url_photo' },
                { data: 'photo', name: 'photo'},
                {
                    data: 'status',
                    name: 'status',
                    render: function (data, type, row, meta) {
                        if (data == 'rejected') {
                            return data + '<br>Alasan: ' + row.alasan;
                        } else {
                            return data
                        }
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable:false,
                    widht: '15%',
                },
            ]
        })

        function filter(status) {
            datatable.column(6).search(status).draw();
        }
    </script>
@endpush
