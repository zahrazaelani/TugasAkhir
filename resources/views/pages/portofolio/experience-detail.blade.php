@extends('layouts.dashboard')

@section('title')
    Experience Mahasiswa Sekolah Vokasi
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Riwayat Kepanitiaan</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Riwayat Kepanitiaan</a></div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">{{ $experience->jabatan }}</h2>
        <a class="btn btn-info px-5" href="{{ route('portofolio-experiences-edit', $experience->id) }}" role="button">
            Edit
        </a>
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
            <h5>Deskripsi</h5>
            <p>{!! $experience->deskripsi !!}</p>
            <div class="row">
                <div class="col-6">
                    <div class="d-flex">
                        <h5>Perusahaan: </h5>
                        <p class="ml-2">{{ $experience->perusahaan }}</p>
                    </div>
                    <div class="d-flex">
                        <h5>Lokasi: </h5>
                        <p class="ml-2">{{ $experience->lokasi_perusahaan }}</p>
                    </div>
                    <div class="d-flex">
                        <h5>Waktu Mulai: </h5>
                        <p class="ml-2">{{ $experience->waktu_mulai }}</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex">
                        <h5>Bidang: </h5>
                        <p class="ml-2">{{ $experience->bidang }}</p>
                    </div>
                    <div class="d-flex">
                        <h5>Status: </h5>
                        <p class="ml-2">{{ $jabatan->status }}</p>
                    </div>
                    <div class="d-flex">
                        <h5>Waktu Berakhir: </h5>
                        <p class="ml-2">{{ $experience->waktu_selesai }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
      </div>
    </section>
  </div>
    
@endsection