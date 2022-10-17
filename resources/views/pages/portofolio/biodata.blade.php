@extends('layouts.app_new')

@section('title')
    Biodata Mahasiswa Sekolah Vokasi
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>My Account</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Account</a></div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">BIODATA</h2>
        
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
                                <a class="btn btn-info px-5 mb-4" href="{{ route('portofolio-biodata-create') }}" role="button">
                                    Edit
                                </a>
                                <h5>Foto Profile</h5>
                                <img src="{{ url('public/images/'.$user->image) }}" style="height:100px;width:auto;margin-bottom:20px;">
                                <h5>Deskripsi</h5>
                                <p>{!! $user->deskripsi !!}</p>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Tempat Lahir: </h5>
                                            <p class="ml-2">{{ $user->tempat_lahir }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Tanggal Lahir: </h5>
                                            <p class="ml-2">{{ $user->tanggal_lahir }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Alamat KTP: </h5>
                                            <p class="ml-2">{{ $user->address_one }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Angkatan: </h5>
                                            <p class="ml-2">{{ $user->angkatan }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>No Telepon: </h5>
                                            <p class="ml-2">{{ $user->phone_number }}</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Fakultas: </h5>
                                            <p class="ml-2">{{ $user->fakultas }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Program Studi: </h5>
                                            @if ($prodi == null)
                                                <p class="ml-2">Belum ada Program Studi</p>
                                            @else
                                                <p class="ml-2">{{ $prodi->nama }}</p>
                                            @endif
                                        </div>
                                        <div class="d-flex">
                                            <h5>Alamat Solo: </h5>
                                            <p class="ml-2">{{ $user->alamat_solo }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>NIM: </h5>
                                            <p class="ml-2">{{ $user->nim }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Email: </h5>
                                            <p class="ml-2">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
      </div>
    </section>
</div>
@endsection