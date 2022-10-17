@extends('layouts.app')

@push('addon-style')
    <style>

    </style>
@endpush

@section('title')
    Sekolah Vokasi E-COM
@endsection

@section('content')
<div class="page-content page-home" style="margin-top: -20px">
      <!-- section start Hero-->
      <section class="hero">
        <div class="hero__slider owl-carousel">
          @foreach ($sliders as $slider)
          <div class="hero__items set-bg" data-setbg="{{ Storage::url($slider->photo) }}">
            <div class="container">
              <div class="row">
                <div class="col-xl-5 col-lg-7 col-md-8">
                  <div class="hero__text">
                    <h6>Sekolah Vokasi UNS</h6>
                    <h2>Diskon - Hari Mahasiswa 2030</h2>
                    <p>Diskon spesial bagi seluruh mahasiswa sekolah vokasi yang baru pertama kali mendaftar sebesar 70%</p>
                    <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                    <div class="hero__social">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                      <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </section>
    <!-- end section Hero-->

    <section class="store-trend-categories mt-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h5>Kategori</h5>
          </div>
        </div>
        <div class="row">
            @php $incrementCategory = 0 @endphp
            @forelse ($categories as $category)
              <div
                class="col-6 col-md-3 col-lg-2"
                data-aos="fade-down-right"
                data-aos-delay="{{ $incrementCategory+= 200 }}"
              >
                <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                  <div class="categories-image">
                    <img src="{{ Storage::url($category->photo) }}" class="w-100" />
                  </div>   
                    <p class="categories-text">{{ $category->name }}</p>
                </a>
              </div>
            @empty
                <div class="col-12 text-center py-5" data-aos="fade-down-right"
                data-aos-delay="200">
                  Tidak Ada Kategori
                </div>
            @endforelse

          
          <!-- Batas Kategori -->
        </div>
      </div>
    </section>

    <div class="section store-new-products">
      <section class="product spad">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <ul class="filter__controls">
                <li class="active" data-filter=".new-arrivals">Produk Terbaru</li>
                <li data-filter=".hot-sales">Produk Terlaris</li>
              </ul>
            </div>
          </div>
          <div class="row product__filter">

            @foreach ($products as $product)
            <div
              class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals"
            >
              <div class="product__item">
                <div
                  class="product__item__pic set-bg products-image"
                  data-setbg="{{ Storage::url($product->galleries->first()->photos ?? '')  }}"
                >
                  <span class="label">New</span>
                </div>
                <div class="product__item__text">
                  <h6>{{ $product->name }}</h6>
                  <a href="{{ route('detailproduk', $product->slug)}}" class="add-cart">+ Add To Cart</a>
                  <h5>Rp. {{number_format($product->price) }}</h5>
                </div>
              </div>
            </div>
            @endforeach

            @foreach ($productBests as $product )
            <div
              class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales"
            >
              <div class="product__item">
                <div
                  class="product__item__pic set-bg"
                  data-setbg="{{ Storage::url($product->galleries->first()->photos) }}"
                >
                </div>
                <div class="product__item__text">
                  <h6>{{ $product->name }}</h6>
                  <a href="{{ route('detailproduk', $product->slug)}}" class="add-cart">+ Add To Cart</a>
                  
                  <h5>Rp. {{number_format($product->price) }}</h5>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
    </div>
</div>
@endsection