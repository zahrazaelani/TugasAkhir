@extends('layouts.app_new')

@section('title')
    Tambah Riwayat Pendidikan Mahasiswa Sekolah Vokasi
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Riwayat Pendidikan</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Riwayat Pendidikan</a></div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Riwayat Pendidikan</h2>
      <p class="section-lead">Tambahkan Riwayat Pendidikan</p>
      @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('portofolio-pendidikan-store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Jenjang</label>

                                    <select name="jenjang" required id="jenjang" class="form-control">
                                      <option value="SMP">SMP</option>
                                      <option value="SMA">SMA</option>                                      
                                      <option value="SMK">SMK</option>
                                    </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Nama Sekolah</label>
                                <input type="text" class="form-control" name="nama" />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group" v-if="is_jenjang_smp">
                                <label>Jurusan</label>
                                <input 
                                  type="text" 
                                  class="form-control @error('jurusan') is-invalid @enderror" 
                                  id="jurusan" 
                                  name="jurusan"
                                  autocomplete
                                  autofocus/>
                                    @error('jurusan')
                                      <span class="disabled-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Tahun Masuk</label>
                                <input type="number" class="form-control" name="masuk" />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Tahun Keluar</label> 
                                <input type="number" class="form-control" name="keluar" />
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
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
  Vue.use(Toasted);

  var jenjang = new Vue({
    el: "#jenjang",
    mounted() {
      AOS.init();
    },
    data() {
      return {
        is_jenjang_smp: true,
        jurusan: "",
      }
    }
  });
</script>
@endpush