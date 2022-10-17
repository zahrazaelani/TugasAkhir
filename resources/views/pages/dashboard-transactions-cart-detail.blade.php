@extends('layouts.app_new')

@section('title')
    Dashboard-Sekolah Vokasi E-COM
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="container-fluid">
      <div class="section-header">
        <h1>{{ $transaction->first()->code }}</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"></div>
        </div>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12 mt-2">
            
              <div
                class="tab-pane fade show active"
                id="pills-home"
                role="tabpanel"
                aria-labelledby="pills-home-tab"
              >
              <h3 class="dashboard-title">Daftar Barang Belanjaan</h3>
                <!-- view list barang  -->
                @foreach ($cartBuyTransactions as $b_transaction)
                  <a
                    class="card card-list d-block"
                    href="{{ route('dashboard-transaction-details', $b_transaction->id)}}"
                  >
                    <div class="card-body ">
                      <div class="row">
                        <div class="col-md-1">
                          <img
                            src="{{ Storage::url($b_transaction->product->galleries->first()->photos ?? '')}}"
                            class="w-50"
                            alt=""
                          />
                        </div>
                        <div class="col-md-1">{{ $b_transaction->code }}</div>
                        <div class="col-md-3">{{ $b_transaction->product->name }}</div>
                        <div class="col-md-2">{{ $b_transaction->product->user->store_name }}</div>
                        <div class="col-md-2">{{ $b_transaction->created_at }}</div>
                        <div class="col-md-1 d-none d-md-block">
                          Detail
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
                @foreach ($cartSellTransactions as $s_transaction)
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
      </br>
        <h3 class="dashboard-title">Invoice - Checkout</h3>
        <div class="invoice p-3 mb-3">
          <div class="row">
            <div class="col-12">
              <h4>
                 E-Commerce Sekolah Vokasi UNS
                <small class="float-right">Tanggal: {{ $transaction->first()->created_at}} </small>
              </h4>
            </div>
          </div>  
        </div>
          
        <div class="card-body">
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong>{{ $transaction->first()->user->name }}</strong><br>
                {{ $transaction->first()->user->address_one }}<br>
                {{ App\Models\Province::find($transaction->first()->user->provinces_id)->name }}, {{ $transaction->first()->user->zip_code }}<br>
                telfon: {{ $transaction->first()->user->phone_number }}<br>
                Email: {{ $transaction->first()->user->email }}
              </address>
            </div>
            
            <div class="col-sm-4 invoice-col">
              <b>Order ID:</b> {{ $transaction->first()->code }} <br>
                <br>
              <b>Payment Due:</b> 2/22/2014<br>
              <b>Account:</b> 968-34567
            </div>
            
            </div>
            
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Serial #</th>
                      <th>Qty</th>
                      <th>Nama Produk</th>
                      <th>Nama Toko</th>
                      <th>Harga Satuan</th>
                      <th>Deskripsi</th>
                      <th>Subtotal</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $totalPrice = 0
                    @endphp
                    @foreach ($cartBuyTransactions as $b_transaction)
                      <tr>
                        <td>{{ $b_transaction->code }}</td>
                        <td>{{ $b_transaction->quantity }}</td>
                        <td>{{ $b_transaction->product->name }}</td>
                        <td>{{ $b_transaction->product->user->store_name }}</td>
                        <td>Rp. {{ number_format($b_transaction->product->price) }}</td>
                        <td>{!! $b_transaction->product->description !!}</td>
                        <td>Rp. {{ number_format($b_transaction->price * $b_transaction->quantity) }}</td>
                        <td>
                          <a
                          href="{{ route('dashboard-transaction-details', $b_transaction->id)}}"
                          >
                          <img
                          src="/images/dashboard-arrow-right.svg"
                          alt=""
                          />
                          </a>
                      </td>
                      </tr>
                      @php $totalPrice += $b_transaction->product->price * $b_transaction->quantity @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            
            <div class="row">
            
            <div class="col-6">
              <p class="lead">Payment Supported With:</p>
              <img src="/images/Midtrans.png" style="width: 150px" alt="Visa">
              <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
  
              </p>
            </div>
            
            <div class="col-6">
              <p class="lead">Status Pembayaran <b>{{$cartBuyTransactions->first()->transaction->transaction_status}}</b></p>
              <div div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Total Harga ( {{$cartBuyTransactions->count()}} Barang)</th>
                    <td>Rp. {{ number_format($totalPrice) ?? 0 }}</td>
                  </tr>
                  <tr>
                    <th>Total Ongkos Kirim</th>
                    <td>Rp. {{ number_format($cartBuyTransactions->first()->transaction->shipping_price) ?? 0 }}</td>
                  </tr>
                  <tr>
                    <th>Total Belanja:</th>
                    <td>Rp. {{ number_format($cartBuyTransactions->first()->transaction->total_price) ?? 0 }} </td>
                  </tr>
                </table>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
</div>          

          
@endsection