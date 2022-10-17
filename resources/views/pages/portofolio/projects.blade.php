@extends('layouts.app_new')

@section('title')
    Projects Mahasiswa Sekolah Vokasi
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Projects</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Projects</a></div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Projects</h2>
        <a class="btn btn-info px-5 mb-2" href="{{ route('portofolio-projects-create') }}" role="button">
            Add
        </a>
        <div class="">
            @php $incrementProjets = 0 @endphp
            @forelse ($projects as $project)
                <div
                    {{-- class="col-6 col-md-3 col-lg-3" --}}
                    data-aos="fade-up"
                    data-aos-delay="{{ $incrementProjets+= 100 }}"
                >
                    <div class="card p-3 card-list">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center">
                                <h6 class="my-0">{{ $project->judul }}</h6>
                                <div class="ml-2">
                                    @if ($project->status == "selesai")
                                        <div class="badge rounded-pill bg-success  text-white">Selesai</div>
                                    @elseif ($project->status == "proses")
                                        <div class="badge rounded-pill bg-info  text-white">Proses</div>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('portofolio-project-edit', $project->id )}}" class="edit icon">
                                    <img src="/images/pencil-square.svg" alt="" class="w-75" />
                                </a>
                                <a href="{{ route('portofolio-project-delete', $project->id )}}" class="delete icon ml-2">
                                    <img src="/images/trash.svg" alt="" class="w-75" />
                                </a>
                            </div>
                        </div>
                        <p class="my-0">{!! $project->deskripsi !!}</p>
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex">
                                    <h5>Tanggal Mulai: </h5>
                                    <p class="ml-2">{{ $project->tanggal_mulai }}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex">
                                    <h5>Tanggal Berakhir: </h5>
                                    <p class="ml-2">{{ $project->tanggal_selesai }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5" data-aos="fade-up"
                    data-aos-delay="100">
                    Tidak Ada Project
                </div>
            @endforelse
        </div>
      </div>
    </section>
</div>
    
@endsection