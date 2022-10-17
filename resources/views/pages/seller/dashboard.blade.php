@extends('layouts.app_new')

@section('title')
Dashboard-Sekolah Vokasi E-COM
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Ringkasan statistik</h2>
        <p class="section-lead">Rutin pantau perkembangan toko untuk tingkatkan penjualanmu</p>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pendapatan</h4>
                      </div>
                      <div class="card-body">
                        Rp. {{ number_format($revenue) }}
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                      <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pesanan Baru</h4>
                      </div>
                      <div class="card-body">
                        {{ $newrevenue}}
                      </div>
                    </div>
                  </div>
            </div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Aktivitas Hari ini</h2>
        <p class="section-lead">Aktivitas yang perlu kamu pantau untuk jaga kepuasan pembeli</p>
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

      <div class="section-body">
        <h2 class="section-title">Recent Transactions</h2>
        <p class="section-lead"></p>
        @forelse ($recentlytransaction as $item)
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
                                <h5 class="fw-bold mb-1">{{ $item->name }}</h5>
                                <small class="text-muted mb-0">{{ $item->email }}</small>
                            </div>
                            <div class="col-md-2">
                                <h5 class="fw-bold mb-1">{{ $item->roles }}</h4>
                            </div>
                            <div class="col-md-2">
                                <h5 class="fw-bold mb-1">{{ $item->transaction_status }}</h4>
                            </div>
                            <div class="col-md-4">
                                <h5 class="fw-bold mb-1">{{ $item->updated_at }}</h4>
                            </div>
                        </div>
                    </li>

                </ul>
                @empty
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
                                <h5 class="fw-bold mb-1">Transaksi Kosong</h5>
                            </div>
                        </div>
                    </li>

                </ul>
                @endforelse
      </div>

      <div class="section-body">
        <h2 class="section-title">Produk Terlaris di Tokomu</h2>
        <p class="section-lead">Aktivitas yang perlu kamu pantau untuk jaga kepuasan pembeli</p>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover table-bordered scroll-horizontal-vertical w-100" id="crudTable">
                <thead class="bg-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Terjual</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=0;
                    @endphp
                    @forelse ($bestselling as $item)
                    @php
                    $i++;
                    @endphp
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $i }}</td>
                        <td>Rp. {{ number_format($item->price) }}</td>
                        <td>{{ $item->count }}</td>
                        <td>Aktif</td>
                    </tr>
                    @empty
                    <tr>
                        <td>Produk Kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
        </div>
      </div>
    </section>
</div>

@endsection
