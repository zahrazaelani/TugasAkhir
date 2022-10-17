@extends('layouts.app_new')

@section('title')
    Tambah Pengajuan Pengembalian Transaksi Sekolah Vokasi E-COM
@endsection

@section('content')
<div class="main-content">
    <section class="section">
            <div class="section-header">
                <h1>Buyer Dashboard - Pengajuan Pengembalian Dana</h1>
                <div class="section-header-breadcrumb">
                    <p class="dashboard-subtitle">Tambah Pengajuan Pengembalian Dana</p>
                <div class="breadcrumb-item active"></div>
                </div>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('dashboard-refund-store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label>Kode Transaksi</label>
                                              <input type="text" class="form-control" value="{{ $codeTransactions->code }}" disabled required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Pengaju</label>
                                                <input type="text" name="nama" class="form-control" required>
                                                <p class="text-muted">
                                                  Nama harus sesuai dengan nama pemilik Rekening
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-group">
                                              <label>Total Penarikan</label>
                                              <input type="number" class="form-control" value="{{ $codeTransactions->transaction->total_price }}" disabled required>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label>Bank</label>
                                              <select name="bank" class="form-control">
                                                    <option value="" disabled>Pilih Bank</option>
                                                    <option value="BRI">BRI</option>
                                                    <option value="MANDIRI">MANDIRI</option>
                                                    <option value="BNI">BNI</option>
                                                    <option value="BTN">BTN</option>
                                                    <option value="BCA">BCA</option>
                                                    <option value="BSI">BSI</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-group">
                                              <label>Nomor Rekening</label>
                                              <input type="text" name="rekening" class="form-control" required>
                                          </div>
                                        </div>
                                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="transaction_details_id" value="{{ $codeTransactions->code }}">
                                        <input type="hidden" name="total" value="{{ $codeTransactions->transaction->total_price }}">
                                        <input type="hidden" name="status" value="PENDING">
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
                </div>
            </div>
        
    </section>
</div>

@endsection
