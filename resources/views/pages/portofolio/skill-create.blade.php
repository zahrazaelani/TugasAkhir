@extends('layouts.app_new')

@section('title')
Tambah Skill Mahasiswa Sekolah Vokasi
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Skill</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Skill</a></div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Skill</h2>
      <p class="section-lead">Tambahkan Skill</p>
      @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('portofolio-skill-store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Jenis Sertifikasi</label>
                                <input type="text" class="form-control" name="jenis" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Nomor Sertifikat</label>
                                <input type="text" class="form-control" name="no_sertifikat" />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Nama Lembaga yang Mengeluarkan</label>
                                <input type="text" class="form-control" name="lembaga" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Tanggal Sertifikasi</label>
                                <input type="date" class="form-control" name="tanggal" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Tanggal Expired</label>
                                <input type="date" class="form-control" name="tanggal_expired" />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Sertifikat</label>
                                <input type="file" name="photo" class="form-control" />
                                <p class="text-muted">
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <button type="submit" class="btn btn-info col-md-12">
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