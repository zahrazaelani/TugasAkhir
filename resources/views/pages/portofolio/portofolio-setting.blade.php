@extends('layouts.app_new')

@section('title')
    Pengaturan Portofolio
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Portofolio Setting</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Portofolio Setting</a></div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Portofolio Setting</h2>
        <p class="section-lead">Look what you have made today!</p>
        <form action="{{ route('portofolio-setting-update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label>Toko</label> --}}
                                <p class="text-muted">
                                Apakah anda ingin memperlihatkan portofolio?
                                </p>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input
                                        type="radio"
                                        class="custom-control-input"
                                        name="isPublic"
                                        id="openStoreTrue"
                                        value="1"
                                        {{ $user->isPublic == 1 ? 'checked' : ''}}
                                    />
                                    <label
                                        for="openStoreTrue"
                                        class="custom-control-label"
                                    >
                                        Publik
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input
                                        type="radio"
                                        class="custom-control-input"
                                        name="isPublic"
                                        id="openStoreFalse"
                                        value="0"
                                        {{ $user->isPublic == 0 || $user->isPublic == NULL ? 'checked' : ''}}
                                    />
                                    <label
                                        for="openStoreFalse"
                                        class="custom-control-label"
                                    >
                                        Tidak Publik
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
            <div class="col text-right">
              <button
                type="submit"
                class="btn btn-success px-5"
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