@extends('layouts.app')

@section('title')
    Profile Toko - Sekolah Vokasi E-COM
@endsection
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Profile Toko</h4>
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
              <div class="shop__sidebar__accordion">
                <div class="accordion" id="accordionExample">
                  <div class="card">
                    <div
                      id="collapseOne"
                      class="collapse show"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="shop__sidebar__categories">
                          <div class="card card-info card-outline">
                            <div class="card-body box-profile">
                              <!-- Foto belum dipakai

                              <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                              </div>

                              -->
                              <h3 class="profile-username text-center">{{ $users->store_name }}</h3>
                              <p class="text-muted text-center">{{ $users->name }}</p>
                              <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                  <b>Status Toko</b> <a class="float-right">
                                    @if ($users->store_status == 1)
                                    Toko Buka
                                    @else
                                    Toko Tutup
                                    @endif</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Jumlah Produk</b> <a class="float-right">{{ $products_count }}</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Total Terjual</b> <a class="float-right">{{ $totalProductSold }}</a>
                                </li>
                              </ul>
                            </div>
                          </div>
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
                <div class="col-lg-12 col-md-6 col-sm-6">
                  <div class="product__details__tab__profile">
                      <div class="shop__product__option__right">
                          <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                              <a
                                class="nav-link active"
                                data-toggle="tab"
                                href="#tabs-5"
                                role="tab"
                                >Produk Terbaru</a
                              >
                            </li>
                            <li class="nav-item">
                              <a
                                class="nav-link"
                                data-toggle="tab"
                                href="#tabs-6"
                                role="tab"
                                >Produk Terlaris</a
                              >
                            </li>
                          </ul>
                      </div>
                </div>
              </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                    <div class="product__details__tab__content">
                      <div class="product__details__tab__content__item">
                  <!-- view list barang  -->
                  <!-- batasProduct-->
                          <div class="row">
                            @php $incrementProduct = 0 @endphp
                            @forelse ($products as $product)
                              <div class="col-md-4 " data-aos="fade-up"
                                data-aos-delay="{{ $incrementProduct+= 100 }}">
                                <a href="{{ route('detailproduk', $product->slug)}}" class="component-products d-block">
                                  <div class="products-thumbnail">
                                    <div class="products-image " style="
                                      @if($product->galleries->count())
                                          background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                                      @else
                                          background-color: #eee
                                      @endif">
                                    </div>
                                  </div>
                                  <div class="products-text-profile"><h6>{{ $product->name }}</h6>
                                  <h5>Rp. {{number_format($product->price) }}</h5></div>
                                </a>
                              </div>
                            @empty
                              <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                                Tidak ada produk
                              </div>
                            @endforelse
                            <!-- batas Product-->
                          </div>
                        </div>
                      </div>
                  </div>

                <!-- PRODUK TERLARIS -->
                <div class="tab-pane" id="tabs-6" role="tabpanel">
                    <div class="product__details__tab__content">
                      <div class="product__details__tab__content__item">
                          <div class="row">
                            @php $incrementProduct = 0 @endphp
                            @forelse ($bestSellerProducts as $product)
                            <div class="col-md-4 " data-aos="fade-up"
                                data-aos-delay="{{ $incrementProduct+= 100 }}">
                              <a href="{{ route('detailproduk', $product->slug)}}" class="component-products d-block">
                                <div class="products-thumbnail">
                                  <div class="products-image" style="
                                  @if($product->galleries->count())
                                      background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                                  @else
                                      background-color: #eee
                                  @endif">
                                  </div>
                                </div>
                                  <div class="products-text-profile"><h6>{{ $product->name }}</h6>
                                  <h5>Rp. {{number_format($product->price) }}</h5></div>
                              </a>
                            </div>
                            @empty
                            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                              Tidak ada produk
                            </div>
                            @endforelse
                          </div>
                        </div>
                </div>
                <!-- END PRODUK TERLARIS -->

            {{-- <div class="row">
                @forelse ($products as $product )
              <div class="col-lg-4 col-md-4 col-sm-6">
               <div class="product__item">
                 <div class="image-content">
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
           @endforelse --}}
           
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- Shop Section End -->
    @endsection