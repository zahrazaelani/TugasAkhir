@extends('layouts.app_new')

@section('title')
Dashboard-Sekolah Vokasi E-COM
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Buyer Dashboard</h1>
      </div>
      <div class="section-body">
        <h2 class="section-title">Buyer Dashboard</h2>
        <p class="section-lead">Sekolah Vokasi E-Commerce</p>
        <div class="row">
            <div class="col-12">
                <div class="card pmd-card">
                    <div class="pmd-tabs">
                        <ul role="tablist" class="nav nav-tabs nav-fill">
                            <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab"
                                    role="tab" aria-controls="home" href="#home-fixed">Pesanan Dikemas</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab"
                                    aria-controls="profile" href="#about-fixed">Pesanan Dikirim</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab"
                                    aria-controls="messages" href="#work-fixed">Pesanan Selesai</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab"
                                    aria-controls="messages" href="#cancel-fixed">Pesanan Dibatalkan</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home-fixed">
                                @foreach ($recentlytransaction as $item)
                                @php
                                // dd($item);
                                $status =$item->transaction_status;
                                @endphp
                                @if ($item->shipping_status=='PENDING')
                                <div id="listview" onclick="redirect({{ $item->id_transaksi }})">
                                    <ul class="list-group list-group-light">
                                        <li class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100">
        
                                                <div class="sm-1" style="
                                                padding-left: 5px;
                                                padding-right: 5px;">
                                                    <p class="fw-bold text-danger mb-1">{{ ucfirst(strtolower($status))
                                                        }}
                                                    </p>
                                                </div>
                                                <p class="text-dark" style="
                                                padding-left: 5px;
                                                padding-right: 5px;">/</p>
                                                <p class="text-dark" style="
                                                padding-left: 5px;
                                                padding-right: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-clock"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                        <path
                                                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                    </svg></p>
                                                <p class="text-dark mb-0">{{ substr($item->updated_at,0,10) }}</p>
                                                {{-- <div class="mb-3">
                                                    <h5 class="fw-bold mb-1">John Doe</h5>
                                                </div> --}}
                                            </div>
                                        </li>
                                    </ul>
                                    <li
                                        class="list-group-item list-group-item-action justify-content-between align-items-center">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <i class="bi bi-image"></i>
                                                            <img src=" {{ Storage::url($item->photo) }}" alt=""
                                                                style="width: 70px; height: 70px" />
        
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="col">
                                                                <h4 class="fw-bold">{{ $item->products_name }}</h4>
                                                                <p class="text-muted mb-0">1 x Rp.{{
                                                                    number_format($item->price) }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                </div>
                                                <div class="col" style="border-left: 3px solid lightgrey;">
                                                    {{-- <div class="col-md-12"
                                                        style="text-align:left;padding-left: 10px">
                                                        --}}
                                                        <h5 class="fw-bold mb-1">{{ $item->store_name }}</h5>
                                                        {{--
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                @endif
        
                                @endforeach
                            </div>
        
                            <div role="tabpanel" class="tab-pane" id="about-fixed">
                                @foreach ($recentlytransaction as $item)
                                @if ($item->shipping_status=='SUCCESS')
                                <div id="listview" onclick="redirect({{ $item->id_transaksi }})">
        
                                    <li
                                        class="list-group-item list-group-item-action justify-content-between align-items-center">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col-md-2">
        
                                                            <img src=" {{ Storage::url($item->photo) }}" alt=""
                                                                style="width: 70px; height: 70px" />
        
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="col">
                                                                <h4 class="fw-bold">{{ $item->products_name }}</h4>
                                                                <p class="text-muted mb-0">Putih, 123</p>
                                                                <p class="text-muted mb-0">1 x Rp.{{
                                                                    number_format($item->price) }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                </div>
                                                <div class="col" style="border-left: 3px solid lightgrey;">
                                                    {{-- <div class="col-md-12"
                                                        style="text-align:left;padding-left: 10px">
                                                        --}}
                                                        <h5 class="fw-bold mb-1">{{ $item->store_name }}</h5>
                                                        {{--
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                @endif
        
                                @endforeach
                            </div>
                            <div role="tabpanel" class="tab-pane" id="work-fixed">
                                @foreach ($recentlytransaction as $item)
                                @if ($item->shipping_status=='DONE')
                                <div id="listview" onclick="redirect({{ $item->id_transaksi }})">
                                    <ul class="list-group list-group-light">
                                        <li class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100">
        
                                                <div class="sm-1" style="
                                                                                padding-left: 5px;
                                                                                padding-right: 5px;">
                                                    <p class="fw-bold text-danger mb-1">{{ ucfirst(strtolower($status))
                                                        }}
                                                    </p>
                                                </div>
                                                <p class="text-dark" style="
                                                                                padding-left: 5px;
                                                                                padding-right: 5px;">/</p>
                                                <p class="text-dark" style="
                                                                                padding-left: 5px;
                                                                                padding-right: 5px;"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                        <path
                                                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                    </svg></p>
                                                <p class="text-dark mb-0">{{ substr($item->updated_at,0,10) }}</p>
                                                {{-- <div class="mb-3">
                                                    <h5 class="fw-bold mb-1">John Doe</h5>
                                                </div> --}}
                                            </div>
                                        </li>
                                    </ul>
                                    <li
                                        class="list-group-item list-group-item-action justify-content-between align-items-center">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src=" {{ Storage::url($item->photo) }}" alt=""
                                                                style="width: 70px; height: 70px" />
        
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="col">
                                                                <h4 class="fw-bold">{{ $item->products_name }}</h4>
                                                                <p class="text-muted mb-0">Putih, 123</p>
                                                                <p class="text-muted mb-0">1 x Rp.{{
                                                                    number_format($item->price) }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                </div>
                                                <div class="col" style="border-left: 3px solid lightgrey;">
                                                    {{-- <div class="col-md-12"
                                                        style="text-align:left;padding-left: 10px">
                                                        --}}
                                                        <h5 class="fw-bold mb-1">{{ $item->store_name }}</h5>
                                                        {{--
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <div role="tabpanel" class="tab-pane" id="cancel-fixed">
                                @foreach ($recentlytransaction as $item)
                                @if ($item->shipping_status=='CANCEL')
                                <div id="listview" onclick="redirect({{ $item->id_transaksi }})">
                                    <ul class="list-group list-group-light">
                                        <li class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100">
        
                                                <div class="sm-1" style="
                                                                                padding-left: 5px;
                                                                                padding-right: 5px;">
                                                    <p class="fw-bold text-danger mb-1">{{ ucfirst(strtolower($status))
                                                        }}
                                                    </p>
                                                </div>
                                                <p class="text-dark" style="
                                                                                padding-left: 5px;
                                                                                padding-right: 5px;">/</p>
                                                <p class="text-dark" style="
                                                                                padding-left: 5px;
                                                                                padding-right: 5px;"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                        <path
                                                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                                    </svg></p>
                                                <p class="text-dark mb-0">{{ substr($item->updated_at,0,10) }}</p>
                                                {{-- <div class="mb-3">
                                                    <h5 class="fw-bold mb-1">John Doe</h5>
                                                </div> --}}
                                            </div>
                                        </li>
                                    </ul>
                                    <li
                                        class="list-group-item list-group-item-action justify-content-between align-items-center">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src=" {{ Storage::url($item->photo) }}" alt=""
                                                                style="width: 70px; height: 70px" />
        
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="col">
                                                                <h4 class="fw-bold">{{ $item->products_name }}</h4>
                                                                <p class="text-muted mb-0">Putih, 123</p>
                                                                <p class="text-muted mb-0">1 x Rp.{{
                                                                    number_format($item->price) }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                </div>
                                                <div class="col" style="border-left: 3px solid lightgrey;">
                                                    {{-- <div class="col-md-12"
                                                        style="text-align:left;padding-left: 10px">
                                                        --}}
                                                        <h5 class="fw-bold mb-1">{{ $item->store_name }}</h5>
                                                        {{--
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
      </div>
    </section>
</div>

@endsection
