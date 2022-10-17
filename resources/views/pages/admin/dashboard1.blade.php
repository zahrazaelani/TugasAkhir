@extends('layouts.admin.app')
@section('content')
    <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Admin Dashboard</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Dashboard-Sekolah Vokasi E-COM</h2>
            <p class="section-lead">Sekolah Vokasi E-Commerce</p>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="fas fa-hourglass"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Pesanan Diproses</h4>
                    </div>
                    <div class="card-body">
                      {{ $pending }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Pesanan Dikirim</h4>
                    </div>
                    <div class="card-body">
                      {{ $success}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fas fa-archive"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Pesanan Diselesaikan</h4>
                    </div>
                    <div class="card-body">
                      {{ $done }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="fas fa-calendar-times"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Pesanan Dibatalkan</h4>
                    </div>
                    <div class="card-body">
                      {{ $canceled }}
                    </div>
                  </div>
                </div>
              </div>                  
            </div>
          </div>

          {{-- Recent Transaksi --}}
          <div class="section-body">
            <h2 class="section-title">Recent Transactions</h2>
            
          </div>

          {{-- Recent Transaksi --}}
          <div class="section-body">
            <h2 class="section-title">Portofolio Update</h2>
            <div class="card card-statistic-1">
              <div class="card-icon bg-success">
                <i class="fas fa-check-circle"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Verifikasi Update</h4>
                </div>
                <div class="card-body">
                  {{ $portofoliobaru }}
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-hover table-bordered scroll-horizontal-vertical w-100"
                          id="crudTable">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Jenis</th>
                                  <th>Lembaga</th>
                                  <th>No Sertifikat</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <div class="btn-group">
                                  <div class="dropdown">
                                      <div class="dropdown-menu">
                                          <a class="dropdown-item"
                                              href="' . route('sertifikat.edit', $item->id) .'">
                                              Edit
                                          </a>
                                          <form action="'. route('sertifikat.destroy', $item->id) .'"
                                              method="POST">
                                              '. method_field('delete'). csrf_field() .'
                                              <button type="submit" class="dropdown-item text-danger">
                                                  Hapus
                                              </button>

                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </tbody>
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
            ordering: [[6, "desc"],true],
            searching: false,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { "data" : null, "sortable":false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;}
                },
                { data: 'name', name: 'name' },
                { data: 'jenis', name: 'jenis' },
                { data: 'lembaga', name: 'lembaga' },
                { data: 'no_sertifikat', name: 'no_sertifikat' },
                { data: 'status', name: 'status' },
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