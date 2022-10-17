@extends('layouts.app')

@section('title')
    Produk - Sekolah Vokasi E-COM
@endsection
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Produk</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Produk</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section Begin -->
    <section class="shop spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="shop__sidebar">
                <div class="shop__sidebar__search">
                <form action="{{ route('listproduct') }}"  method="GET">
                    
                        <input type="search" name="search" value="{{ request()->get('search') }}" class="form-control form-control-lg"  placeholder="Search..." />
                        <div class="input-group-append">
                            <button type="submit">
                            <span class="fa fa-search"></span>
                        </button>
                        </div>
                </form>
              </div>
              <div class="shop__sidebar__accordion">
                <div class="accordion" id="accordionExample">
                  <div class="card">
                    <div class="card-heading">
                      <a data-toggle="collapse" data-target="#collapseOne"
                        >Categories</a
                      >
                    </div>
                    <div
                      id="collapseOne"
                      class="collapse show"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="shop__sidebar__categories">
                          <ul class="nice-scroll">
                            @foreach ($categories as $category)
                            <li><a href="{{ route('product-categories', $category->slug) }}">{{ $category->name }}</a></li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    
                    <div
                      id="collapseThree"
                      class="collapse show"
                      data-parent="#accordionExample"
                    >
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-heading">
                      <a data-toggle="collapse" data-target="#collapseSix"
                        >Tags</a
                      >
                    </div>
                    <div
                      id="collapseSix"
                      class="collapse show"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="shop__sidebar__tags">
                          @foreach ($tags as $tag)
                            <a href="{{ route('product-tag', $tag->tags) }}">{{ $tag->tags }}</a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="shop__product__option">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="shop__product__option__left">
                     <p>Showing 1–9 of {{ $products->count()}}</p>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="row">
                @forelse ($products as $product )
              <div class="col-lg-4 col-md-4 col-sm-6">
               <div class="product__item">
                 <div class="image-content-list">
                   <div
                    class="product__item__pic"
                    style="
                        background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                    "
                  ></div>
                 </div>
                  
                  <div class="product__item__text">
                    <h6>{{ $product->name }}</h6>
                    <a href="{{ route('detailproduk', $product->slug)}}" class="add-cart">Detail Produk</a>
                   
                    <h5>Rp. {{number_format($product->price) }}</h5>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-12 text-center py-5" data-aos="fade-up"
                  data-aos-delay="100">
                  Tidak ada produk
              </div>
           @endforelse
           
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="product__pagination">
                  {{ $products->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Shop Section End -->
    @endsection