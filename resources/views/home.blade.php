@extends('layouts2.main', ['title' => 'Admin Dashboard', 'page_heading' => 'Dashboard'])

@section('content')
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <img src="{{ url('assets/img/dashboard/img/doctor.png') }}" alt="Hospital Bad Icon" class="custom-card-image">
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4 style="color: black; font-weight: bold; font-size: 20px;">Total Dokter</h4>
        </div>
        <div class="card-body">
          {{ $dokter_count }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <img src="{{ url('assets/img/dashboard/img/hospital-bed.png') }}" alt="Hospital Bad Icon" class="custom-card-image">
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4 style="color: black; font-weight: bold; font-size: 20px;">Total Pasien</h4>
        </div>
        <div class="card-body">
          {{ $pasien_count }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <img src="{{ url('assets/img/dashboard/img/pegawai.png') }}" alt="Hospital Bad Icon" class="custom-card-image">
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4 style="color: black; font-weight: bold; font-size: 20px;">Total Pegawai</h4>
        </div>
        <div class="card-body">
          {{ $pegawai_count }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <img src="{{ url('assets/img/dashboard/img/poli.png') }}" alt="Hospital Bad Icon" class="custom-card-image">
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4 style="color: black; font-weight: bold; font-size: 20px;">Total Poli</h4>
        </div>
        <div class="card-body">
          {{ $poli_count }}
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .custom-card-image {
    max-width: 100%;
    /* Adjust as needed */
    max-height: 100px;
    /* Adjust as needed */
    display: block;
    /* Prevents unwanted space beneath the image */
    margin: auto;
    /* Centers the image horizontally */
  }
</style>

@endsection

@push('modal')
@include('show')
@endpush

@push('js')
@include('_script');
@endpush