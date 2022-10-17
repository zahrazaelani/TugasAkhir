@extends('layouts.admin.app')

@section('title')
    Dashboard-Sekolah Vokasi E-COM
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section" data-aos="fade-up">
      <div class="section-header">
        <h1>Admin Dashboard - User </h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="#">User</a></div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">User- Marketplace Sekolah Vokasi </h2>
        <p class="section-lead">List User</p>

        <div class="card">
            <div class="card-body">
                <a href="{{ route('user.create')}}" class="btn btn-info mb-3">
                    Tambah User
                </a>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered scroll-horizontal-vertical w-100" id="tabeluser">
                        <thead >
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Status</th>
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
        var datatable = $('#tabeluser').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}', //Panggil url untuk data table makanya pake ajax, dikasi url dari halaman itu sendiri
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'roles', name: 'roles' },
                {data: 'suspend', name: 'suspend'
                ,orderable: false,
                searchable:false,},
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