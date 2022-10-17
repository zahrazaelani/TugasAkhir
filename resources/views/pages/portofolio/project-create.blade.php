@extends('layouts.app_new')

@section('title')
    Tambah Project Mahasiswa Sekolah Vokasi
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Riwayat Project</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Riwayat Project</a></div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Riwayat Project</h2>
      <p class="section-lead">Tambahkan Riwayat Project</p>
      @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('portofolio-projects-store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="judul" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Status</label>
                                    <select name="status" required id="status" class="form-control">
                                      <option value="selesai">SELESAI</option>
                                      <option value="proses">PROSES</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input type="date" class="form-control" name="tanggal_mulai" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Tahun Selesai</label>
                                <input type="date" class="form-control" name="tanggal_selesai" />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" id="editor"></textarea>
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

