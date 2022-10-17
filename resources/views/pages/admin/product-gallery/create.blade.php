@extends('layouts.admin.app')

@section('title')
    Prodduk Galeri-Sekolah Vokasi E-COM
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section" data-aos="fade-up">
      <div class="section-header">
        <h1>Admin Dashboard - Product Gallery</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="#">Product</a></div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Produk- Marketplace Sekolah Vokasi </h2>
        <p class="section-lead">Tambah Galeri Produk Baru</p>
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
                <form action="{{ route('product-gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Produk</label>
                                <select name="products_id" class="form-control">
                                    @foreach ($products as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Foto Produk</label>
                                <input type="file" name="photos" class="form-control" required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col text-right">
                            <button type="submit" class="btn btn-primary px-5">
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

