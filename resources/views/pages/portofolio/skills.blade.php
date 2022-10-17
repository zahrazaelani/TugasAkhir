@extends('layouts.app_new')

@section('title')
    Pendidikan Mahasiswa Sekolah Vokasi
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Skills</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Skills</a></div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Skills</h2>
        <a class="btn btn-info px-5 mb-2" href="{{ route('portofolio-skill-create') }}" role="button">
            Add Skill
        </a>
        <div class="">
            @php
                $incrementSkills = 0
            @endphp
            @forelse ($skills as $skill)
                <div
                    data-aos="fade-up"
                    data-aos-delay="{{ $incrementSkills+= 100 }}"
                >
                    <div class="card p-3 card-list">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex align-items-center">
                                <h5 class="my-0">{{ $skill->jenis }}</h5>
                                @if ($skill->status == "verified")
                                    <div class="badge rounded-pill bg-success text-white ml-2">Verified</div>
                                @elseif ($skill->status == "pending")
                                    <div class="badge rounded-pill bg-warning text-white ml-2">Pending</div>
                                @elseif ($skill->status == "rejected")
                                    <div class="badge rounded-pill bg-danger text-white ml-2">Rejected</div>
                                @endif
                            </div>
                            <a href="{{ route('portofolio-skill-delete', $skill->id )}}" class="delete icon">
                                <img src="/images/trash.svg" alt="" class="w-75" />
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex">
                                    <h5>Lembaga yang mengeluarkan: </h5>
                                    <p class="ml-2">{{ $skill->lembaga }}</p>
                                </div>
                                <div class="d-flex">
                                    <h5>Tanggal Sertifikasi: </h5>
                                    <p class="ml-2">{{ $skill->tanggal }}</p>
                                </div>
                                @if ($skill->status == "rejected")
                                    <div class="d-flex">
                                        <h5>Alasan Penolakan: </h5>
                                        <p class="ml-2">{{ $skill->alasan }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-6">
                                <div class="d-flex">
                                    <h5>Nomor Sertifikat: </h5>
                                    <p class="ml-2">{{ $skill->no_sertifikat }}</p>
                                </div>
                                <div class="d-flex">
                                    <h5>Tanggal Expired: </h5>
                                    @if ($skill->tanggal_expired != null)
                                        <p class="ml-2">{{ $skill->tanggal_expired }}</p>
                                    @else
                                        <p class="ml-2">Tidak ada Tanggal Expired</p>
                                    @endif
                                </div>

                                <img
                                    src="{{ url('storage/assets/skill/'.$skill->path_url_photo ?? '') }}"
                                    alt=""
                                    class="w-50 h-50 mb-2 "
                                />
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12 text-center py-5" data-aos="fade-up"
                    data-aos-delay="100">
                    Tidak Ada Skills
                </div>
            @endforelse
        </div>
      </div>
    </section>
</div>
@endsection
