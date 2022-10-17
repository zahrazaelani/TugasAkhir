@extends('layouts.auth')

@section('content')

<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center row-login justify-content-center">
          <div class="col-lg-5">
            <h2>
              Belanja hasil karya Mahasiswa, <br />
              menjadi lebih mudah. Daftarkan segera
            </h2>
            <div class="tabs vh-100">
              <div class="d-flex justify-content-center">
                <ul class="nav nav-pills-regist">
                  <li class="active">
                    <a href="#marketplace" data-toggle="tab">Marketplace</a>
                  </li>
                  <li>
                    <a href="#portofolio" data-toggle="tab">Portofolio</a>
                  </li>
                </ul>
              </div>
              <div class="tab-content clearfix">
                <div class="tab-pane active" id="marketplace">
                  <form method="POST" action="{{ route('register') }}" class="mt-3">
                    @csrf
                    <input type="hidden" name="roles" :value="''">
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input id="name" type="text"
                        v-model="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        name="name"  placeholder="Masukkan Nama Lengkap"
                        value="{{ old('name') }}" 
                        required autocomplete="name" autofocus>
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          
                    </div>

                    <div class="form-group">
                      <label>E-mail</label>
                      <input id="email" type="email"
                        v-model="email" 
                        @change="checkForEmailAvailability()"
                        class="form-control @error('email') is-invalid @enderror"
                        :class="{ 'is-invalid' : this.email_unavailable }" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      <input id="password" type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        name="password" required 
                        autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                      <label>Konfirmasi Password</label>
                      <input id="password-confirm" 
                        type="password" 
                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                        name="password_confirmation" required 
                        autocomplete="new-password">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    
                    <div class="form-group">
                      <label>Toko</label>
                      <p class="text-muted">
                        Apakah anda juga ingin membuka Toko dan memulai berjualan?
                      </p>
                      <div
                        class="custom-control custom-radio custom-control-inline"
                      >
                        <input
                          type="radio"
                          class="custom-control-input"
                          name="is_store_open"
                          id="openStoreTrue"
                          v-model="is_store_open"
                          :value="true"
                        />
                        <label for="openStoreTrue" class="custom-control-label">
                          Iya, Boleh
                        </label>
                      </div>
                      <div
                        class="custom-control custom-radio custom-control-inline"
                      >
                        <input
                          type="radio"
                          class="custom-control-input"
                          name="is_store_open"
                          id="openStoreFalse"
                          v-model="is_store_open"
                          :value="false"
                        />
                        <label for="openStoreFalse" class="custom-control-label">
                          Tidak, hanya membeli
                        </label>
                      </div>
                    </div>
                    <div class="form-group" v-if="is_store_open">
                      <label>Nama Toko</label>
                      <input type="text"
                          v-model="store_name"
                          id="store_name"
                          class="form-control @error('store_name') is-invalid @enderror"
                          name="store_name"
                          required
                          autocomplete
                          autofocus >
                            @error('store_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <button type="submit" 
                      class="btn btn-success btn-block mt-4"
                      :disabled="this.email_unavailable"
                    >
                      Daftar Sekarang
                    </button>
                    <a href="{{route('login')}}" class="btn btn-signup btn-block mt-4"
                      >Sign In Kembali
                    </a>
                  </form>
                </div>
                <!-- end market -->

                <div class="tab-pane" id="portofolio"> <!-- tab untuk pilih portofolio -->
                  <form method="POST" action="{{ route('register') }}" class="mt-3">
                    @csrf
                    <input type="hidden" name="is_store_open" :value="false"> <!--pake input type hidden spy ((false)) karna ada pengecekan, mahasiswa ga buka toko -->
                    <input type="hidden" name="roles" :value="'MAHASISWA'">
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input id="name" type="text"
                        v-model="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        name="name"  placeholder="Masukkan Nama Lengkap"
                        value="{{ old('name') }}" 
                        required autocomplete="name" autofocus> <!-- ngecek apakah nama sudah ada atau belum-->
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>

                    <div class="form-group">
                      <label>E-mail</label>
                      <input id="email" type="email"
                        v-model="email" 
                        @change="checkForEmailAvailability()"                          
                        class="form-control @error('email') is-invalid @enderror"
                        :class="{ 'is-invalid' : this.email_unavailable }" 
                        name="email" placeholder="Masukkan Email"
                        value="{{ old('email') }}" 
                        required autocomplete="email"> <!-- ngecek apakah email sudah ada atau belum-->
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      <input id="password" type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        name="password" required 
                        placeholder="Password"
                        autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                      <label>Konfirmasi Password</label>
                      <input id="password-confirm" 
                        type="password" 
                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                        name="password_confirmation" required 
                        placeholder="Masukkan Ulang Password"
                        autocomplete="new-password">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <button type="submit" 
                      class="btn btn-success btn-block mt-4"
                      :disabled="this.email_unavailable"
                    >
                      Daftar Sekarang
                    </button>
                    <a href="{{route('login')}}" class="btn btn-signup btn-block mt-4"
                      >Sign In
                  </a>
                  </form>
                </div> 
                <!-- end porto -->
              </div>
                <!-- end tab content -->

            </div> <!-- end tabs -->
          </div> <!-- end col-lg-5 -->
        </div>
      </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@push('addon-script')
</script>
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  Vue.use(Toasted);

  var register = new Vue({
    el: "#register",
    mounted() {
      AOS.init();
      /*  */
    },
    methods: {
      checkForEmailAvailability: function() {
        var self = this;
        axios.get('{{ route('api-register-check') }}', {
          params: {
            email: this.email
          }
        })
          .then(function (response) {
            if(response.data == 'Available') {
              self.$toasted.show(
                "Email tersedia untuk digunakan :)",
                {
                  position: "top-center",
                  className: "rounded",
                  duration: 1000,
                }
              );
                self.email_unavailable = false;

            } else {
              self.$toasted.error(
                "Maaf, email sudah terdaftar. Gunakan email lain untuk mendaftar!!",
                {
                  position: "top-center",
                  className: "rounded",
                  duration: 1000,
                }
              );
                self.email_unavailable = true;  

            }

            // handle success
            console.log(response);
          });
      }
    },
    data() {
      return {
        // name: "Exca Muchlis Andita",
        // email: "exca@test.test",
        is_store_open: true,
        store_name: "",
        email_unavailable: false,
        roles: ""
      }
    },
  });
</script>
@endpush
@endsection
