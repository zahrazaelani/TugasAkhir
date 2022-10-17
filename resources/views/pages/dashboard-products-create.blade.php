@extends('layouts.app_new')

@section('title')
    Tambah Produk-Sekolah Vokasi E-COM
@endsection

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Produk</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Produk</a></div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Tambah Produk Baru</h2>
      <p class="section-lead">tambah produk yang ingin dijual!</p>
      @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('dashboard-product-store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" name="name" />
                              </div>
                            </div>
                             <div class="col-md-6">
                              <div class="form-group">
                                <label>Kategori</label>
                                <select name="categories_id" class="form-control">
                                  @foreach ($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                              </select>
                              </div>
                            </div>
                            
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Harga Produk</label>
                                <input type="number" class="form-control" name="price" />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Berat Produk</label>
                                <input type="number" class="form-control" name="weight" />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Stok Produk</label>
                                <input type="number" class="form-control" name="stock" />
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
                                <label>Deskripsi Produk</label>
                                <textarea name="description" id="editor"></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Gambar Thumbnail</label>
                                <input type="file" name="photo" class="form-control" />
                                <p class="text-muted">
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <button
                                type="submit"
                                class="btn btn-info col-md-12"
                              >
                                Simpan Produk
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
    </div>
  </section>
</div>

@endsection

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
