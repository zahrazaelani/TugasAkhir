@extends('layouts.app')

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
<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Detail Produk</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="{{ route('daftarproduct') }}">Produk</a>
                            <span>Detail</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section Begin -->
    <div class="shop-details" >
        <div class="container">
          <div class="row">
            <div class="col-lg-12">

              <div class="product__details__pic">
                <div class="row" id="gallery">
                    <div class="col-lg-2 col-md-3" >
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <div 
                                  class=" nav-link col-3 col-lg-12 mt-2 mt-lg-0" 
                                  v-for="(photo, index) in photos" 
                                  :key="photo.id" 
                                  data-aos="zoom-in" 
                                  data-aos-delay="100">
                                  <a href="#" @click="changeActive(index)">
                                      <img :src="photo.url" class="image-detail-row mb-2" :class="{active:index==activePhoto}"alt="">
                                  </a>
                                  </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9  ">
                              <div class="product__details__pic__item ">
                                  <transition name="slide-fade" mode="out-in">
                                      <img 
                                      :src="photos[activePhoto].url" 
                                      :key="photos[activePhoto].id" 
                                      class="image-detail "
                                      alt="">
                                  </transition>
                              </div>
                          </div>
                        </div>
                    </div>         
                </div>
        </div>
      </div> 
    </div>
      <div class="product__details__content">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <div class="product__details__text">
                <h4>{{ $product->name }}</h4>
                <div >
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
                  <span> -  {{ round($ratingCount, 1) }} / 5</span>
                </div>
                <div class="price">  <h3>Rp. {{ number_format($product->price) }}</h3></div>
                
                  <div class="product__details__last__option">
                    <ul>
                      <li><span>By : </span> <a href="{{ route('profiletoko', $product->user->id) }}">{{ $product->user->store_name }}</a></li>
                      <li><span>Stok : </span>{{ number_format($product->stock) }} pcs</li>
                      <li><span>Terjual :</span> {{ number_format($product->transactiondetail->sum('quantity')) }}</li>
                    </ul>     
                  </div>
                <div class="product__details__cart__option">
                   @if($product->user->store_status==1)
                            @auth
                            @if($product->user->store_status==0)
                            <a href="#" class="site-btn">
                                    Toko Tutup
                                </a>
                                <!-- Memeriksa apakah stok produk lebih dari 0 -->
                                @elseif ($product->stock >0)
                                <!-- Jika stok lebih dari 0, maka akan muncul button add to cart -->
                                <form action="{{ route('detail-add', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf <!--unntuk bisa mengirim form-->
                                    <button type="submit" class="primary-btn px mt-2">
                                        Add to Cart
                                    </button>
                                </form>
                                @else
                                <!-- Jika stok kosong, maka akan muncul stok habis -->
                                <a href="#" class="site-btn">
                                    Stok Habis
                                </a>
                                @endif
                                
                            @else
                                <a href="{{ route('login') }}" class="site-btn">
                                    Sign In untuk membeli
                                </a>
                            @endauth
                            @else
                             <a href="#" class="tutup-btn">
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
          </div>
        </div>
      </div>
      </div>
    </div>
          <div class="container">
            <div class="col-lg-12">
              <div class="product__details__tab">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      data-toggle="tab"
                      href="#tabs-5"
                      role="tab"
                      >Deskripsi</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      data-toggle="tab"
                      href="#tabs-6"
                      role="tab"
                      >Komentar( {{$comment->count()}} )</a
                    >
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tabs-5" role="tabpanel">
                    <div class="product__details__tab__content">
                      <div class="product__details__tab__content__item mt-3">
                        <h5>Deskripsi Produk</h5>
                        <p>
                          {!! $product->description !!}
                        </p>
                       
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tabs-6" role="tabpanel">
                    <div class="product__details__tab__content">
                      <div class="product__details__tab__content__item">
                          @foreach ($comment as $com)
                        <h5 class="mt-3 mb-1">{{ $com->transaction->user->name }}</h5>
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
                                            
                        <p>
                         {!! $com->komentar !!}
                        </p>
                        
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Shop Details Section End -->

    
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
    

