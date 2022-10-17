@extends('layouts.app')

@section('title')
    Portofolio - Sekolah Vokasi E-COM
@endsection

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-blog set-bg" data-setbg="img/bg1.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Portofolio</h2>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

    <div class="blog spad" style="margin-top: 80px;">
        <div class="container">
            <div class="row">
                @php $incrementUsers = 0 @endphp
                @if (request()->is('search') )
                    @forelse ($skills as $skill) <!-- dia akan ngeloop sebanyak skill yg dicari -->
                    <div class="col-lg-4 col-md-6 col-sm-6" data-aos="fade-up"
                    data-aos-delay="{{ $incrementUsers+= 100 }}">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{ url('public/images/'.$user->image) }}"></div>
                            <div class="blog__item__text">
                                <h5>{{ $user->name }}</h5>
                                <div class="d-flex flex-row justify-content-between">
                                    <p>{{ $user->nama }}</p>
                                    <p>{{ $user->angkatan }}</p>
                                </div>
                                <a href="{{ route('portofolio-detail', $user->id) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                        
                    @empty <!-- ketika dia ga nemu search by skill, maka dia akan cari by user -->
                        @forelse ($users as $user)
                        <div class="col-lg-4 col-md-6 col-sm-6" data-aos="fade-up"
                        data-aos-delay="{{ $incrementUsers+= 100 }}">
                            <div class="blog__item">
                                <div class="blog__item__pic set-bg" data-setbg="{{ url('public/images/'.$user->image) }}"></div>
                                <div class="blog__item__text">
                                    <h5>{{ $user->name }}</h5>
                                    <div class="d-flex flex-row justify-content-between">
                                        <p>{{ $user->nama }}</p>
                                        <p>{{ $user->angkatan }}</p>
                                    </div>
                                    <a href="{{ route('portofolio-detail', $user->id) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                            
                        @empty
                            <div class="col-12 text-center py-5" data-aos="fade-up"
                                data-aos-delay="100">
                                Tidak Ada Portofolio
                            </div>
                        @endforelse
                    @endforelse
                @else
                    @forelse ($users as $user)
                    <div class="col-lg-4 col-md-6 col-sm-6" data-aos="fade-up"
                    data-aos-delay="{{ $incrementUsers+= 100 }}">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{ url('public/images/'.$user->image) }}"></div>
                            <div class="blog__item__text">
                                <h5>{{ $user->name }}</h5>
                                <div class="d-flex flex-row justify-content-between">
                                    <p>{{ $user->nama }}</p>
                                    <p>{{ $user->angkatan }}</p>
                                </div>
                                <a href="{{ route('portofolio-detail', $user->id) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                        
                        
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up"
                            data-aos-delay="100">
                            Tidak Ada Portofolio
                        </div>
                    @endforelse
                @endif
            </div>
        </div>
    </div>
        <!-- Search Begin -->
        <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch">+</div>
                <form class="search-model-form" action="{{ url('/search') }}" type="get">
                    <input type="text" name="query" id="search-input" placeholder="Search here.....">
                </form>
            </div>
        </div>
        <!-- Search End -->
@endsection
