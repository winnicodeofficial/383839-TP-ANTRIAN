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
                        <h4>Edit kunjungan</h4>
                        <a href="{{ route('data-kunjung.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('data-kunjung.update', $kunjung->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">NAMA Pasien</label>
                                        <input type="text" id="nama" name="nama_pasien" class="form-control @error('nama_pasien') is-invalid @enderror" placeholder="{{ __('Nama Pasien') }}" value="{{ $kunjung->nama_pasien ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kk">Nomor Pendaftaran</label>
                                        <input type="text" id="nama_kk" name="no_daftar" class="form-control @error('no_daftar') is-invalid @enderror" placeholder="{{ __('No Pendaftaran') }}" value="{{ $kunjung->no_daftar ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Daftar</label>
                                        <input type="date" id="tanggal_lahir" name="tanggal_daftar" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="{{ __('Tanggal Lahir') }}" value="{{ $kunjung->tanggal_lahir ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="poli_id">Nama Poli</label>
                                        <select id="poli_id" name="poli_id" class="select2 form-control ">
                                            @foreach ($poli as $data)
                                            <option value="{{ $data->id ?? '' }}">{{ $data->nama_poli ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">Dianogsa</label>
                                        <input type="text" id="no_hp" name="dianogsa" class="form-control @error('dianogsa') is-invalid @enderror" placeholder="{{ __('Dianogsa') }}" value="{{ $kunjung->dianogsa ?? '' }}">
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