@extends('layouts.app1')

@section('title')
    Kategori - Sekolah Vokasi E-COM
@endsection

@section('content')
<div class="page-content page-home" style="margin-top: 80px">
  <section class="store-trend-categories mt-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h5>Semua Kategori</h5>
        </div>
      </div>
      <div class="row">
      <!--category Gadget-->
        @php $incrementCategory = 0 @endphp
        @forelse ($categories as $category)
          <div
            class="col-6 col-md-3 col-lg-2"
            data-aos="fade-up"
            data-aos-delay="{{ $incrementCategory+= 100 }}"
          >
            <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
              <div class="categories-image">
                <img src="{{ Storage::url($category->photo) }}" class="w-100" />
              </div>
              <p class="categories-text">{{ $category->name }}</p>
            </a>
          </div>
        @empty
            <div class="col-12 text-center py-5" data-aos="fade-up"
            data-aos-delay="100">
              Tidak Ada Kategori
            </div>
        @endforelse
      <!-- Batas Kategori -->
      </div>
    </div>
  </section>

  <section class="store-new-products">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <h5>Semua Produk</h5>
        </div>
      </div>
      <div class="row">
      <!-- batas new Product-->
        @php $incrementProduct = 0 @endphp
          @forelse ($products as $product )
            <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="{{ $incrementProduct+= 100 }}"
            >
              <a href="{{ route('detail', $product->slug)}}" class="component-products d-block">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      @if($product->galleries->count())
                        background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                      @else
                        background-color: #eee
                      @endif
                    "
                  ></div>
                </div>
                <div class="products-text">{{ $product->name }}</div>
                <div class="products-price">Rp. {{number_format($product->price) }}</div>
              </a>
            </div>
          @empty
            <div class="col-12 text-center py-5" data-aos="fade-up"
            data-aos-delay="100">
              Tidak ada produk
            </div>
          @endforelse
      <!-- batas new Product-->
      </div>
    </div>
  </section>
</div>
@endsection