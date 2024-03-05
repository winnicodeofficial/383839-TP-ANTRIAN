@extends('layouts2.main', ['title' => 'Halaman Data Dokter', 'page_heading' => 'Data Jadwal Dokter'])

@section('content')
<section class="section">
    <div class="section-body">
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Edit Jadwal Dokter</h4>
                        <a href="{{ route('data-jadwal-praktek.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('data-jadwal-praktek.update', $jadwal->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_mapel">Nama Dokter</label>
                                <input type="text" id="nama_mapel" name="nama_dokter" class="form-control @error('nama_dokter') is-invalid @enderror" placeholder="{{ __('Masukan Nama Dokter') }}" value="{{ $jadwal->dokter->nama_dokter }}">
                            </div>
                            <div class="form-group">
                                <label for="poli_id">Nama Poli</label>
                                <select id="poli_id" name="poli_id" class="select2 form-control">
                                    <option value="">-- Pilih Poli --</option>
                                    @foreach ($poli as $data)
                                    <option value="{{ $data->id }}" {{ $data->id == $jadwal->poli_id ? 'selected' : '' }}>
                                        {{ $data->nama_poli }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hari_oper">Hari</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <select id="hari_awal" name="hari_awal" class="select2 form-control">
                                            <option value="">-- Pilih Hari --</option>
                                            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                                            <option value="{{ $hari }}" {{ isset($hari_awal) && $hari_awal == $hari ? 'selected' : '' }}>
                                                {{ $hari }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select id="hari_akhir" name="hari_akhir" class="select2 form-control">
                                            <option value="">-- Pilih Hari --</option>
                                            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                                            <option value="{{ $hari }}" {{ isset($hari_akhir) && $hari_akhir == $hari ? 'selected' : '' }}>
                                                {{ $hari }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jadwal_praktek">Jadwal Praktek</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="time" id="jadwal_awal" name="jadwal_awal" class="form-control @error('jadwal_awal') is-invalid @enderror" placeholder="{{ __('Waktu Awal') }}" value="{{ date('H:i', strtotime(explode(' - ', $jadwal->jadwal_praktek)[0])) }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="time" id="jadwal_akhir" name="jadwal_akhir" class="form-control @error('jadwal_akhir') is-invalid @enderror" placeholder="{{ __('Waktu Akhir') }}" value="{{ date('H:i', strtotime(explode(' - ', $jadwal->jadwal_praktek)[1])) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection