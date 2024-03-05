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
                        <h4>Edit {{ $pegawai->level }} {{ $pegawai->name }}</h4>
                        <a href="{{ route('data-pegawai.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('data-pegawai.update', $pegawai->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="text" id="nip" name="nip" class="form-control @error('nip') is-invalid @enderror" placeholder="{{ __('NIP') }}" value="{{ $pegawai->nip ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="nama">NAMA LENGKAP</label>
                                        <input type="text" id="nama" name="name" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Nama Pegawai') }}" value="{{ $pegawai->name ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kk">ALAMAT</label>
                                        <input type="text" id="nama_kk" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="{{ __('Nama KK') }}" value="{{ $pegawai->alamat ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kk">EMAIL</label>
                                        <input type="text" id="nama_kk" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" value="{{ $pegawai->email ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" style="display: none;">
                                        <label for="jabatan">Jabatan</label>
                                        <select id="jabatan" name="level" class="form-control @error('level') is-invalid @enderror">
                                            <option value="#">Silahkan Pilih</option>
                                            <option value="admin" {{ isset($pegawai) && $pegawai->level == 'admin' ? 'selected' : '' }}>admin</option>
                                            <option value="Kepala" {{ isset($pegawai) && $pegawai->level == 'Kepala' ? 'selected' : '' }}>Kepala</option>
                                            <option value="Sekertaris" {{ isset($pegawai) && $pegawai->level == 'Sekertaris' ? 'selected' : '' }}>Sekertaris</option>
                                            <option value="Petugas" {{ isset($pegawai) && $pegawai->level == 'Petugas' ? 'selected' : '' }}>Petugas</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="jabatan">JABATAN</label>
                                        <input type="text" id="jabatan" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" placeholder="{{ __('Jabatan') }}" value="{{ $pegawai->jabatan ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="jabatan">Status Pegawai</label>
                                        <select id="jabatan" name="status_pegawai" class="form-control @error('status_pegawai') is-invalid @enderror">
                                            <option value="#">Silahkan Pilih</option>
                                            <option value="ASN" {{ isset($pegawai) && $pegawai->status_pegawai == 'ASN' ? 'selected' : '' }}>ASN</option>
                                            <option value="NONASN" {{ isset($pegawai) && $pegawai->status_pegawai == 'NONASN' ? 'selected' : '' }}>NON ASN</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="jabatan">Pendidikan</label>
                                        <select id="jabatan" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror">
                                            <option value="#">Silahkan Pilih</option>
                                            <option value="SLTA/SEDERAJAT" {{ isset($pegawai) && $pegawai->pendidikan == 'SLTA/SEDERAJAT' ? 'selected' : '' }}>SLTA/SEDERAJAT</option>
                                            <option value="DIPLOMA" {{ isset($pegawai) && $pegawai->pendidikan == 'DIPLOMA' ? 'selected' : '' }}>D3</option>
                                            <option value="D4" {{ isset($pegawai) && $pegawai->pendidikan == 'D4' ? 'selected' : '' }}>D4</option>
                                            <option value="S1" {{ isset($pegawai) && $pegawai->pendidikan == 'S1' ? 'selected' : '' }}>S1</option>
                                            <option value="S2" {{ isset($pegawai) && $pegawai->pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="jabatan">Unit Kerja</label>
                                        <select id="jabatan" name="unit_kerja" class="form-control @error('unit_kerja') is-invalid @enderror">
                                            <option value="#">Silahkan Pilih</option>
                                            <option value="PUKESMAS PREMBUN" {{ isset($pegawai) && $pegawai->unit_kerja == 'PUKESMAS PREMBUN' ? 'selected' : '' }}>PUKESMAS PREMBUN</option>
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