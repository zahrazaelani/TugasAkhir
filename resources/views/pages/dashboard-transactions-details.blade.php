@extends('layouts.app_new')

@section('title')
  Detail Transaksi-Sekolah Vokasi E-COM
@endsection

@push('addon-style')
<style>
.rate {
  float: left;
  height: 46px;
  padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>
    
@endpush

@section('content')
@php
  $priceThisTransaction = $transaction->price * $transaction->quantity;
@endphp
<div class="main-content">
  <section class="section">
    <div class="container-fluid"> 
      <div class="section-header">
        <h1>{{ $transaction->code }}</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"></div>
        </div>
      </div>
      <div class="dashboard-content" id="transactionDetails">
        <div class="row">
          <div class="col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-4">
                    <img
                      src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '')}}"
                      class="w-100 mb-3"
                      alt=""
                    />
                  </div>
  
                  <div class="col-12 col-md-8">
                    <div class="card-body">
                      <div class="row invoice-info">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-12 table-responsive">
                              <table class="table table-striped">
                                <tbody>
                                  @php
                                      $totalPrice = 0
                                  @endphp
                                  <tr>
                                    <th>Serial #</th>
                                    <td>{{ $transaction->code }}</td>
                                  <tr>
                                    <th>Qty</th>
                                    <td>{{ $transaction->quantity }}</td>
                                  </tr>
                                  <tr>
                                    <th>Nama Produk</th>
                                    <td>{{ $transaction->product->name }}</td>
                                  </tr>
                                  <tr>
                                    <th>Nama Toko</th>
                                    <td>{{ $transaction->product->user->store_name }}</td>
                                  </tr>
                                  <tr>
                                    <th>Harga Satuan</th>
                                    <td>Rp. {{ number_format($transaction->product->price) }}</td>
                                  </tr>
                                  <tr>
                                    <th>Deskripsi</th>
                                    <td>{!! $transaction->product->description !!}</td>
                                  </tr>
                                  <tr>
                                    <th>Subtotal</th>
                                    <td>Rp. {{ number_format($transaction->price * $transaction->quantity) }}</td>
                                  </tr>
                                   @php $totalPrice = $transaction->product->price * $transaction->quantity @endphp
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-5">
                          <div class="row">
                            <p class="lead">Order ID: <b>{{ $transaction->transaction->code }}</b></p>
                          
                            <p class="lead">Status Pembayaran <b class="text-danger">{{$transaction->transaction->transaction_status}}</b></p>
                            <div div class="table-responsive">
                              <table class="table">
                                <tr>
                                  <th style="width:50%">Total Harga ( {{$transaction->quantity}} Barang)</th>
                                  <td>Rp. {{ number_format($totalPrice) ?? 0 }}</td>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12 invoice-col">
                              <b>Tanggal transaksi:</b> {{ $transaction->created_at}} <br>
                              <b>Account:</b> {{ $transaction->transaction->user->name}}
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <p class="lead">Payment Supported With:</p>
                              <img src="/images/Midtrans.png" style="width: 150px" alt="Visa">
                              <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
    
                              </p>
                            </div>
                          </div>
                          
                        </div>  
                        
                        <div class="col-sm-6 invoice-col">
                          <h5>Informasi Pengiriman</h5>
                          <div class="product-title"> Alamat Pengiriman</div>
                          <address>
                            <strong>{{ $transaction->transaction->user->name }}</strong><br>
                            {{ $transaction->transaction->user->address_one }}<br>
                            {{ App\Models\Province::find($transaction->transaction->user->provinces_id)->name }}, {{ $transaction->transaction->user->zip_code }}<br>
                            telfon: {{ $transaction->transaction->user->phone_number }}<br>
                            Email: {{ $transaction->transaction->user->email }}
                          </address>
                        </div>
  
                        <div class="col-sm-6">
                          <form action="{{ route('dashboard-transaction-update', $transaction->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                              @if (auth()->user()->roles == 'BUYER')
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="product-title">Status Pengiriman</div>
                                  <input
                                      type="text"
                                      name="shipping_status"
                                      v-model="status"
                                      class="form-control"
                                      disabled
                                    />
                                </div>
                              </div>
                              
                              <template v-if="status == 'SHIPPING'">
                                <div class="col-sm-12">
                                  <div class="product-title">Resi</div>
                                  <div class="product-subtitle">{{ $transaction->resi ?? '-' }}</div>
                                </div>
                                <div class="col-sm-12">
                                  <form action="{{ route('dashboard-transaction-update', $transaction->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="SUCCESS" name="shipping_status">
                                    <button
                                      class="btn btn-success btn-block mt-4"
                                      type="submit"
                                    >
                                    Barang Diterima
                                    </button>
                                  </form>
                                </div>
                              </template>
                            
                              <template v-if="status == 'SUCCESS'">
                                <form action="{{ route('dashboard-transaction-update', $transaction->id)}}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <div class="row">
                                    <div class="col-sm-12 mt-3">
                                      <div class="row">
                                        <!-- Rating Star -->
                                        <div class="col-sm-12 md-4">
                                          <div class="product-title">Rating produk</div>
                                          <div class="rate">
                                            <input type="radio" id="star5" name="rating" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rating" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rating" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rating" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rating" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                          </div>
                                        </div>
                                        <!-- kolom komentar -->
                                        <div class="col-sm-12">
                                          <div class="form-group">
                                            <div class="product-title">Kolom Komentar</div>
                                            <textarea name="komentar" id="editor">{{ $transaction->komentar ?? '-' }}</textarea>
                                          </div>
                                        </div>
                                        </div>
                                        <!-- tombol Submit Komen rating-->
                                        <div class="row justify-content-center">
                                          <div class="col-md-12">
                                          <button
                                            class="btn btn-success btn-block mt-4"
                                            type="submit"
                                          >
                                            Beri Komentar!!!
                                          </button>
                                        </div>
                                      </div>
                                    </div>  
                                  </div>
                                </form>
                              </template>
  
                              <template v-if="status == 'CANCELLED'">
                                <div class="row">
                                    <div class="col-sm-12 mt-2">
                                      <div class="product-title mt-2">Alasan Pembatalan</div>
                                      <div class="product-subtitle">{!! $transaction->reason ?? '-' !!}</div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <form action="{{ route('dashboard-refund-create', $transaction->id)}}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      <button
                                        class="btn btn-success btn-block mt-2"
                                        type="submit"
                                      >
                                      REFUND
                                      </button>
                                    </form>
                                  </div>
                                </div>
                              </template>
                            @endif
      
                            @if (auth()->user()->roles == 'USER')
                            <div class="col-sm-12">
                              <div class="product-title">Status Pengiriman</div>
                              <select
                                name="shipping_status"
                                id="status"
                                class="form-control"
                                v-model="status"
                              >
                                <option value="UNPAID">Unpaid</option>
                                <option value="PENDING">Pending</option>
                                <option value="SHIPPING">Shipping</option>
                                <option value="SUCCESS">Success</option>
                                <option value="CANCELLED">Cancelled</option>
                              </select>
                            </div>
                            <template v-if="status == 'SHIPPING'">
                              <div class="col-sm-12">
                                <div class="product-title">Input Resi</div>
                                <input
                                  type="text"
                                  name="resi"
                                  v-model="resi"
                                  class="form-control"
                                />
                              </div>
                              <div class="col-md-6">
                                <button
                                  type="submit"
                                  class="btn btn-success btn-block mt-4"
                                >
                                  Update Resi
                                </button>
                              </div>
                            </template>
                            <template v-if="status == 'CANCELLED'">
                              <div class="col-sm-12">
                                <div class="product-title">Alasan Pembatalan Pesanan</div>
                                    <textarea name="reason" id="editor">{{ $transaction->reason ?? '-' }}</textarea>
                                </div>
                              </div>
                                <!-- tombol Submit Komen rating-->
                              <div class="col-md-6">
                                <button
                                  type="submit"
                                  class="btn btn-success btn-block mt-4"
                                >
                                  Update Data
                                </button>
                              </div>
                            </template>
                            @endif
                            </div>
                          </form>
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
    </div>
  </section>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
  var transactionDetails = new Vue({
    el: "#transactionDetails",
    data: {
      status: "{{ $transaction->shipping_status}}",
      resi: "{{ $transaction->resi }}",
    },
  });
</script>
@endpush

@push('addon-script')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector("#editor"))
        .then((editor) => {
            console.log(editor);
        })
        .catch((error) => {
            console.error(error);
        });
</script>
<script>
    ckeditor.replace("editor");
</script>
@endpush