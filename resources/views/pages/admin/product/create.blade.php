@extends('layouts.admin.app')

@section('title')
    Product-Marketplace Sekolah Vokasi
@endsection

@section('content')
<!-- Main Content -->
    
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="main-content">
    <section class="section" data-aos="fade-up">
      <div class="section-header">
        <h1>Admin Dashboard - Product </h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="#">Product</a></div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Produk- Marketplace Sekolah Vokasi </h2>
        <p class="section-lead">Tambah Produk Baru</p>
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
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"> <!--maksudnya enctype="multipart/form-data biar bisa upload file-->
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pemilik Produk</label>
                                <select name="users_id" class="form-control">
                                    @foreach ($users as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kategori Produk</label>
                                <select name="categories_id" class="form-control">
                                    @foreach ($categories as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Harga Produk</label>
                                <input type="number" name="price" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Stok Produk</label>
                                <input type="number" name="stock" class="form-control" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="select2Multiple">Tags Produk</label>
                                <select class="select2-multiple form-control" name="tags[]" id="select2Multiple" multiple="multiple">
                                    @foreach ($tags as $p)
                                        <option value="{{ $p->tags }}">{{ $p->tags }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Berat Produk</label>
                                <input type="number" name="weight" class="form-control" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Deksripsi Produk</label>
                                <textarea name="description" id="deskripsi"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col text-right">
                            <button type="submit" class="btn btn-info px-5">
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
<!--manggil ck editor 5 ngambil dri cdn ck editor-->
@push('addon-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
          // Select2 Multiple
          $('.select2-multiple').select2({
              placeholder: "Select",
              allowClear: true,
          });

      });
    </script>
    <script>
        ClassicEditor.create(document.querySelector("#deskripsi"))
          .then((editor) => {
            console.log(editor);
          })
          .catch((error) => {
            console.error(error);
          });
      </script>

@endpush
