@extends('layouts.admin.app')

@section('title')
    Sertifikat-Sekolah Vokasi E-COM
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section" data-aos="fade-up">
      <div class="section-header">
        <h1>Admin Dashboard - Sertifikat </h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="#">Sertifikat</a></div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Sertifikat- Marketplace Sekolah Vokasi </h2>
        <p class="section-lead">Edit Sertifikat</p>
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('sertifikat.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="d-block">Status</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="verified"
                                            name="status" value="verified">
                                        <label class="form-check-label" for="verified">Verified</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="rejected"
                                            name="status" value="rejected">
                                        <label class="form-check-label" for="rejected">Reject</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="pending"
                                            name="status" value="pending">
                                        <label class="form-check-label" for="pending">Pending</label>
                                    </div>
                                </div>
                                <div class="form-group mb-3" id="form-alasan">
                                    <label for="">Alasan Penolakan</label>
                                    <textarea class="form-control" name="alasan" id="alasan" cols="30" rows="5">{{ old('alasan', $item->alasan) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <img src="{{ url('storage/assets/skill/'.$item->path_url_photo ?? '') }}" alt=""
                                    class="img img-fluid" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <button type="submit" class="btn btn-success mt-3 px-5">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('addon-script')
    <script>
        $('.form-check-input').on('change', function() {
            if($('#rejected').is(':checked')) {
                $('#form-alasan').show();
            } else {
                $('#form-alasan').hide();
            }
        });
        $(document).ready(function () {
            $('input:radio[name="status"][value="{{ old('status', $item->status) }}"]').attr('checked',true).trigger('change');
        });
    </script>
@endpush
