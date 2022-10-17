@extends('layouts.app_new')

@section('title')
    Dashboard-Sekolah Vokasi E-COM
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Transaksi</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Transaksi</a></div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Transaksi</h2>
      <p class="section-lead">Daftar seluruh transaksi</p>
      <div class="row">
        <div class="col-12 mt-2">
          <ul
            class="nav nav-pills mb-3"
            id="pills-tab"
            role="tablist"
          >
            <li class="nav-item" role="presentation">
              <a
                class="nav-link active"
                id="pills-home-tab"
                data-toggle="pill"
                href="#pills-home"
                role="tab"
                aria-controls="pills-home"
                aria-selected="true"
                >Buy Products</a
              >
            </li>

            @if (auth()->user()->roles == 'USER')
              <li class="nav-item" role="presentation">
                <a
                  class="nav-link"
                  id="pills-profile-tab"
                  data-toggle="pill"
                  href="#pills-profile"
                  role="tab"
                  aria-controls="pills-profile"
                  aria-selected="false"
                  >Sell Product</a
                >
              </li>
            @endif

                      
                    </ul>
                    <div class="col-12">
                      <div
                        class="tab-pane fade show active"
                        id="pills-home"
                        role="tabpanel"
                        aria-labelledby="pills-home-tab"
                      >
                        <!-- view list barang  -->
                        @foreach ($buyTransactionCart as $b_transaction)
                          <a
                            class="card card-list d-block"
                            href="{{ route('dashboard-transaction-cart-details', $b_transaction->id)}}"
                          >
                            <div class="card-body">
                              <div class="row">
                                
                                <div class="col-md-2">{{ $b_transaction->code }}</div>
                                <div class="col-md-3">Rp. {{ number_format($b_transaction->total_price)  }}</div>
                                <div class="col-md-3">{{ $b_transaction->transaction_status }}</div>
                                <div class="col-md-2">{{ $b_transaction->created_at }}</div>
                                <div class="col-md-2 d-none d-md-block">
                                  Lihat Detail Transaksi
                                  <img
                                    src="/images/dashboard-arrow-right.svg"
                                    alt=""
                                  />
                                </div>
                              </div>
                            </div>
                          </a>
                        @endforeach

                        

                      </div>
                      <div
                        class="tab-pane fade"
                        id="pills-profile"
                        role="tabpanel"
                        aria-labelledby="pills-profile-tab"
                      >
                        @foreach ($sellTransactions as $s_transaction)
                          <a
                            class="card card-list d-block"
                            href="{{ route('dashboard-transaction-details', $s_transaction->id)}}"
                          >
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-1">
                                  <img
                                    src="{{ Storage::url($s_transaction->product->galleries->first()->photos ?? '')}}"
                                    class="w-50"
                                    alt=""
                                  />
                                </div>
                                <div class="col-md-4">{{ $s_transaction->product->name }}</div>
                                <div class="col-md-3">{{ $s_transaction->transaction->user->name }}</div>
                                <div class="col-md-3">{{ $s_transaction->created_at }}</div>
                                <div class="col-md-1 d-none d-md-block">
                                  <img
                                    src="/images/dashboard-arrow-right.svg"
                                    alt=""
                                  />
                                </div>
                              </div>
                            </div>
                          </a>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection