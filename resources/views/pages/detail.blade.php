@extends('layouts.app1')

@section('title')
    Detail - Sekolah Vokasi E-COM
@endsection
@push('addon-style')
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}

</style>

@endpush


@section('content')
<div class="page-content page-details">
    <section
      class="store-breadcrumbs"
      data-aos="fade-down"
      data-aos-delay="100"
    >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ route('listproduct') }}">Semua Produk</a>
                </li>
                <li class="breadcrumb-item active">Detail Produk</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
    <section class="store-gallery mb-3" id="gallery">
        <div class="row">
          <div class="col-lg-10" data-aos="zoom-in">
            <transition name="slide-fade" mode="out-in"> <!--vue js transisition-->
              <!--src ambil dari variable dibawah. ambil object photo 
            ambil object photos kemudian ambil array photos yg pertama. url = url foto tsb karena dibawah bentuknya url-->
            <img
                v-bind:src="photos[activePhoto].url" 
                :key="photos[activePhoto].id"
                class="w-100 image-box"
                alt=""
              />
            </transition>
          
          <div class="row">
              <!-- v for adalah lopping divue js
                v-for="(photo, index) in photos" mksdnya objek yang ada di photos dipecah menjadi variable photo dan index(indexnya=key array tsb(0,1,2,3))/datanya diakses di photo, arraynya di index
                key="photo.id" idnya tu sama aja dgn index/diambil dari v-for
                -->
    
              <div
                class="col-3 col-lg-3 col-md-3 mt-3"
                v-for="(photo, index) in photos"
                :key="photo.id"
                data-aos="zoom-out"
                data-aos-delay="100"
              >
              <!--class="{ active: index == activePhoto }" mksudnya indexnya itu = activephoto bukan kalo iya keadaan aactive bakalan true maka class yg w-100 tu bakalan ada-->
                <a href="#" v-on:click="changeActive(index)"> <!--action saat gambar diklik jd gambar gedenya gnti sesuai dgn index yg diklik -->
                  <img
                    v-bind:src="photo.url"
                    class="w-100 thumbnail-image"
                    :class="{ active: index == activePhoto }"
                    alt=""
                  />
                </a>
              </div>
            </div>
          </div>
        
      </div>
    </section>
            </div>
            <div class="col-md-4">
            <section class="store-heading">
                <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <h1>{{ $product->name }}</h1>
                            <div class="row">
                                <div class="col-md-12 mt-2 owner">By
                                    <a href="{{ route('profile', $product->user->id) }}">{{ $product->user->store_name }}</a>
                                </div>
                                <div class="col-md-6 mb-2 stock">Stock : {{ number_format($product->stock) }}</div>
                                <div class= "col-md-6 mb-2 stock">Terjual : {{ number_format($product->transactiondetail->sum('quantity')) }}</div>
                                <section class="store-description">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <!-- Rating -->
                                                @if (round($ratingCount) == '1')
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>
                                                @elseif (round($ratingCount) == '2')
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>
                                                @elseif (round($ratingCount) == '3')
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>
                                                @elseif (round($ratingCount) == '4')
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>   
                                                    <span class="fa fa-star "></span>
                                                @elseif (round($ratingCount) == '5')
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>     
                                                @else
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>   
                                                @endif
                                                 {{ round($ratingCount, 1) }} / 5
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="col-md-12 price">Rp. {{ number_format($product->price) }}</div>
                        
                                    <section class="store-description">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-lg-8">
                                                    <p>
                                                        {!! $product->description !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    
                                    
                        <div class="col-lg-12" data-aos="zoom-in">
                             @if($product->user->store_status==1)
                            @auth
                          
                            @if($product->user->store_status==0)
                            <a href="#" class="btn btn-warning disabled px-4 text-white btn-block mb-3">
                                    Toko Tutup
                                </a>
                                <!-- Memeriksa apakah stok produk lebih dari 0 -->
                                @elseif ($product->stock >0)
                                <!-- Jika stok lebih dari 0, maka akan muncul button add to cart -->
                                <form action="{{ route('detail-add', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf <!--unntuk bisa mengirim form-->
                                    <button type="submit" class="btn btn-primary px-4 text-white btn-block mb-3">
                                        Add to Cart
                                    </button>
                                </form>
                                @else
                                <!-- Jika stok kosong, maka akan muncul stok habis -->
                                <a href="#" class="btn btn-danger disabled px-4 text-white btn-block mb-3">
                                    Stok Habis
                                </a>
                                @endif
                                
                            @else
                                <a href="{{ route('login') }}" class="site-btn">
                                    Sign In untuk membeli
                                </a>
                            @endauth
                            @else
                             <a href="#" class="site-btn">
                                    Toko Tutup
                                </a>
                                
                             @endif
                            <!-- Menampilkan pesan error jika ada -->
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            </div>
           
             <div class="store-details-container" data-aos="fade-out">
            <section class="store-review">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 mb-3 mt-3">
                            <h3>Komentar( {{$comment->count()}} )</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <ul class="list-unstyled">
                                @foreach ($comment as $com)
                                    <li class="media md-6">
                                        <img src="/images/icons-testimonial-2.png" class="mr-3 rounded-circle" alt="" />
                                        <div class="media-body">
                                            <!-- nama -->
                                            <h5 class="mt-3 mb-1">{{ $com->transaction->user->name }}</h5>
                                            <!-- Rating -->
                                            @if ($com->rating == '1')
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                            @elseif ($com->rating == '2')
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                            @elseif ($com->rating == '3')
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                            @elseif ($com->rating == '4')
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>   
                                                <span class="fa fa-star "></span>
                                            @elseif ($com->rating == '5')
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>     
                                            @else
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>   
                                            @endif
                                            
                                            <!-- Isi komen -->
                                            <div class="col-md-12">{!! $com->komentar !!}</div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
</div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        var gallery = new Vue({ //inisialisasi dalam satu variable bernama galerry didalamnya menginisialisasikan vue baru 
            el: "#gallery", //elemen yang ditarget yaitu galeri berarti diatas id=gallery
            mounted() { // mounted ini script yang akan dijalankan ketika vuejs muncul
                AOS.init(); //manggil animasi aos, aos emg hrs diinisialisasikan di vue
            },
            data: { //objek data, menyimpan variable yang variablenya tesimpan dijavascript(vue berjalan diclient side)
                activePhoto: 0, //active photo ngmbil dari gmbar yg aray pertama
                photos: [
                    @foreach ($product->galleries as $gallery) // ngelooping agleri dalam bentuk objek dalam vue
                        {
                            id: {{ $gallery->id }},
                            url: "{{ Storage::url($gallery->photos) }}",
                        },
                    @endforeach
                ],
            },
            //membuat fungsi
            methods: {
                changeActive(id) { //(id berbentuk array)buat gnti difoto yg besar itu kalo diklik,ngecek dari array data fotonya
                    this.activePhoto = id;
                },
            },
        });
    </script>
@endpush
