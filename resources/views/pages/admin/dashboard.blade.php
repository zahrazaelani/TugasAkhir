@extends('layouts.admin')

@section('title')
Dashboard-Sekolah Vokasi E-COM
@endsection

@section('content')
<div class="container-fluid">
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin Dashboard</h2>
                <p class="dashboard-subtitle">Sekolah Vokasi E-Commerce</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <div class="dashboard-card-title">Pesanan Diproses</div>
                                <div class="dashboard-card-subtitle">{{ $pending }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <div class="dashboard-card-title">Pesanan Dikirim</div>
                                <div class="dashboard-card-subtitle">{{ $success}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <div class="dashboard-card-title">Pesanan Diselesaikan</div>
                                <div class="dashboard-card-subtitle">{{ $done }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <div class="dashboard-card-title">Pesanan Dibatalkan</div>
                                <div class="dashboard-card-subtitle">{{ $canceled }}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="dashboard-heading">
                <h3 class="dashboard-title">Recent Transactions</h3>
            </div>
            <div class="dashboard-content">
                {{-- <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul> --}}

                @foreach ($recentlytransaction as $item)
                <ul class="list-group list-group-light">
                    <li class="list-group-item list-group-item-action justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-md-1">
                                {{-- <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                    style="width: 70px; height: 70px" class="rounded-circle" /> --}}
                                {{-- <i class="bi bi-person" style="width: 70px; height: 70px"></i> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" fill="currentColor"
                                    class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                </svg>
                            </div>
                            <div class="col-md-3">
                                <h5 class="fw-bold mb-1">{{ $item->user->name }}</h5>
                                <small class="text-muted mb-0">{{ $item->user->email }}</small>
                            </div>
                            <div class="col-md-2">
                                <h5 class="fw-bold mb-1">Admin</h4>
                            </div>
                            <div class="col-md-2">
                                <h5 class="fw-bold mb-1">{{ $item->user->transaction_status }}</h4>
                            </div>
                            <div class="col-md-4">
                                <h5 class="fw-bold mb-1">{{ $item->user->updated_at }}</h4>
                            </div>
                        </div>
                    </li>

                </ul>
                @endforeach
            </div>

            <div class="dashboard-heading">
                <h3 class="dashboard-title">Portofolio Update</h3>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <div class="dashboard-card-title">Verifikasi Request</div>
                                <div class="dashboard-card-subtitle">{{ $portofoliobaru }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered scroll-horizontal-vertical w-100"
                                        id="crudTable">
                                        <thead class="bg-info">
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
                </div>
            </div>
        </div>
    </div>
</div>
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
