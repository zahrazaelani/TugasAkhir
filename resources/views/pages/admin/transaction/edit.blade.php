@extends('layouts.admin')

@section('title')
    Transaksi-Sekolah Vokasi E-COM
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section" data-aos="fade-up">
      <div class="section-header">
        <h1>Admin Dashboard - Transaksi </h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="#">Transaksi</a></div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Transaksi- Marketplace Sekolah Vokasi </h2>
        <p class="section-lead">Edit Transaksi</p>
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('transaction.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kode Transaksi</label>
                                <input type="text" name="name" class="form-control" value="{{ $item->code}}" required disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status Transaksi</label>
                                <select name="transaction_status" class="form-control">
                                    <option value="{{ $item->transaction_status }}" selected>{{ $item->transaction_status }}</option>
                                        <option value="" disabled>--------------------</option>
                                        <option value="PENDING">PENDING</option>
                                        <option value="UNPAID">UNPAID</option>
                                        <option value="SUCCESS">SUCCESS</option>
                                        <option value="CANCELLED">CANCELLED</option>
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Total Harga </label>
                                <input type="number" name="total_price" class="form-control" value="{{ $item->total_price }}" required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col text-right">
                            <button type="submit" class="btn btn-success px-5">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection

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
@endpush