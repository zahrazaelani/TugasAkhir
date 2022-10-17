@extends('layouts.app_new')

@section('title')
    Tambah Biodata Mahasiswa Sekolah Vokasi
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>BIODATA</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">BIODATA</a></div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Isi Biodata Anda</h2>
      @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('portofolio-biodata-store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                      <div class="card" style="margin-bottom: 20px;">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">
                                  Foto Profile
                                </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                  </div>
                                  <div class="custom-file">
                                    <input type="file" name="foto" class="custom-file-input" onchange="pilih_foto(this);">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                  </div>
                                </div>
                              </div>
                              @if ($user->image)
                              <img src="{{ url('public/images/'.$user->image) }}" id="tampilkan_foto"  style="height: auto; width: 150px;margin-bottom:10px">
                          @else
                              <img src="" id="tampilkan_foto" style="margin-bottom: 10px">
                          @endif
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="name">Nama</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="name"
                                  id="name"
                                  value="{{$user->name}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control" name="nim" value="{{ $user->nim }}" />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="email"
                                  id="email"
                                  value="{{$user->email}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" value="{{ $user->tempat_lahir }}" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" value="{{ $user->tanggal_lahir}}" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Alamat KTP</label>
                                <input type="text" class="form-control" name="address_one" value="{{ $user->address_one }}" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Alamat Solo</label>
                                <input type="text" class="form-control" name="alamat_solo" value="{{ $user->alamat_solo }}" />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Prodi</label>
                                <select name="prodis_id" class="form-control">
                                  @foreach ($prodis as $p)
                                      <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Angkatan</label>
                                <input type="number" class="form-control" name="angkatan" value="{{ $user->angkatan }}" />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Fakultas</label>
                                <input type="text" class="form-control" name="fakultas" value="Sekolah Vokasi" disabled />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number}}" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" id="editor">{!! $user->deskripsi !!}</textarea>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  function pilih_foto(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
 
                reader.onload = function (e) {
                    $('#tampilkan_foto')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(auto);
                };
 
                reader.readAsDataURL(input.files[0]);
            }
        }
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