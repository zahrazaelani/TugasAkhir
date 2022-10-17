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
        <h2 class="section-title">Detail Transaction</h2>
        <p class="section-lead">Sekolah Vokasi E-Commerce</p>
        <div class="card-body">
            @foreach ($detail as $item)
            @php
            $status =$item->shipping_status;
            @endphp
            <div id="listview">
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
                                    height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path
                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                    <path
                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                </svg></p>
                            <p class="text-dark mb-0">{{ $item->updated_at,0,10 }}</p>
                            {{-- <div class="mb-3">
                                <h5 class="fw-bold mb-1">John Doe</h5>
                            </div> --}}
                        </div>
                    </li>
                </ul>
                <li class="list-group-item list-group-item-action justify-content-between align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-2">
                                        <i class="bi bi-image"></i>
                                        <img src="Storage::url($item->photo)" alt=""
                                            style="width: 70px; height: 70px" />

                                    </div>
                                    <div class="col-md-10">
                                        <div class="col">
                                            <h4 class="fw-bold">{{ $item->name }}</h4>
                                            <p class="text-muted mb-0">1 x Rp.
                                                {{ number_format($item->price) }} </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </li>
            </div>

            @endforeach


        </div>
      </div>
    </section>
</div>
@endsection
