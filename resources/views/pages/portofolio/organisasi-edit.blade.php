@extends('layouts.app_new')

@section('title')
   Update Riwayat Organisasi Mahasiswa Sekolah Vokasi
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Riwayat Organisasi</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Riwayat Organisasi</a></div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Riwayat Organisasi</h2>
      <p class="section-lead">Update Riwayat Organisasi</p>
      @if($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <form action="{{ route('portofolio-organisasi-update', $item->id) }}" method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf
<input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-4">
  <div class="form-group">
    <label>Nama Organisasi</label>
    <input type="text" class="form-control" name="nama" value="{{ $item->nama }}" />
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <label>Jabatan di Organisasi</label>
    <input type="text" class="form-control" name="jabatan" value="{{ $item->jabatan}}" />
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <label>Divisi</label>
    <input type="text" class="form-control" name="divisi" value="{{ $item->divisi }}"/>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label>Waktu Mulai</label>
    <input type="date" class="form-control" name="waktu_mulai" value="{{ $item->waktu_mulai }}"/>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label>Waktu Selesai</label>
    <input type="date" class="form-control" name="waktu_selesai" value="{{ $item->waktu_selesai}}" />
  </div>
</div>
<div class="col-md-12">
  <div class="form-group">
      <label>Deksripsi</label>
      <textarea name="deskripsi" id="editor"> {!! $item->deskripsi !!} </textarea>
  </div>
</div>


</div>
<div class="row">
<div class="col">
  <button
    type="submit"
    class="btn btn-info col-md-12"
  >
    Simpan
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