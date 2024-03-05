@extends('layouts2.main', ['title' => 'Halaman Data Pasien', 'page_heading' => 'Data Pasien'])

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        @foreach ($errors->all() as $error )
                        {{ $error }}
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Edit Pasien {{ $pasien->nama_pasien }}</h4>
                        <a href="{{ route('data-pasien.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('data-pasien.update', $pasien->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" id="nik" name="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="{{ __('NIK') }}" value="{{ $pasien->nik ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="nama">NAMA LENGKAP</label>
                                        <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Nama Pasien') }}" value="{{ $pasien->nama ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kk">NAMA KK</label>
                                        <input type="text" id="nama_kk" name="nama_kk" class="form-control @error('nama_kk') is-invalid @enderror" placeholder="{{ __('Nama KK') }}" value="{{ $pasien->nama_kk ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat">ALAMAT</label>
                                        <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="{{ __('Alamat') }}" value="{{ $pasien->alamat ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="tanggal_lahir">TANGGAL LAHIR</label>
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="{{ __('Tanggal Lahir') }}" value="{{ $pasien->tanggal_lahir ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="usia">USIA</label>
                                        <input type="text" id="usia" name="usia" class="form-control @error('usia') is-invalid @enderror" placeholder="{{ __('Usia') }}" value="{{ $pasien->usia ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="no_hp">NO HP</label>
                                        <input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="{{ __('No Hp') }}" value="{{ $pasien->no_hp ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status_pasien">STATUS PASIEN</label>
                                        <select id="status_pasien" name="status_pasien" class="form-control @error('Masukan Status Pasien') is-invalid @enderror">
                                            <option value="baru">Baru</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection