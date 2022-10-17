@extends('layouts.app_new')

@section('title')
    Dashboard Setting-Sekolah Vokasi E-COM
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Store Setting</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Store Setting</a></div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Store Setting</h2>
      <p class="section-lead">Look what you have made today!</p>
      <form action="{{ route('dashboard-setting-redirect', 'dashboard-setting-store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Toko</label>
                <input type="text" class="form-control" name="store_name" value="{{ $user->store_name}}"/>
              </div>
            </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Toko</label>
                    <p class="text-muted">
                      Apakah anda juga ingin membuka Toko dan
                      memulai berjualan?
                    </p>
                    <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        type="radio"
                        class="custom-control-input"
                        name="store_status"
                        id="openStoreTrue"
                        value="1"
                        {{ $user->store_status == 1 ? 'checked' : ''}}
                      />
                      <label
                        for="openStoreTrue"
                        class="custom-control-label"
                      >
                        Buka
                      </label>
                    </div>
                    <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        type="radio"
                        class="custom-control-input"
                        name="store_status"
                        id="openStoreFalse"
                        value="0"
                        {{ $user->store_status == 0 || $user->store_status == NULL ? 'checked' : ''}}
                      />
                      <label
                        for="openStoreFalse"
                        class="custom-control-label"
                      >
                        Tutup Sementara
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