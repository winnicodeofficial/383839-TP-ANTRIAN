@extends('layouts2.main', ['title' => 'Halaman Data Rekap', 'page_heading' => 'Data Rekap Valid'])

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
                        <h4>Tambah Rekap</h4>
                        <a href="{{ route('data-rekap.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('data-rekap.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" id="nik" name="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="{{ __('NIK') }}" value="{{ $data->nik }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama">NAMA LENGKAP</label>
                                        <input type="text" id="nama" name="nama_pasien" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Nama Pasien') }}" value="{{ $data->nama }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kk">NAMA KK</label>
                                        <input type="text" id="nama_kk" name="nama_kk" class="form-control @error('nama_kk') is-invalid @enderror" placeholder="{{ __('Nama KK') }}" value="{{ $data->nama_kk }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">ALAMAT</label>
                                        <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="{{ __('Masukkan alamat') }}" value="{{ $data->alamat }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">TANGGAL LAHIR</label>
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ $data->tanggal_lahir }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="usia">USIA</label>
                                        <input type="text" id="usia" name="usia" class="form-control @error('usia') is-invalid @enderror" placeholder="{{ __('Masukkan Usia') }}" value="{{ $data->usia }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">NO HP</label>
                                        <input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="{{ __('Masukkan No HP') }}" value="{{ $data->no_hp }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="status_pasien">STATUS PASIEN</label>
                                        <select id="status_pasien" name="status_pasien" class="form-control @error('Masukan Status Pasien') is-invalid @enderror">
                                            <option value="" disabled selected>Pilih Status Pasien</option>
                                            <option value="lama" {{ isset($data) && strtoupper($data->status_pasien) == 'LAMA' ? 'selected' : '' }}>Lama</option>
                                            <option value="baru" {{ isset($data) && strtoupper($data->status_pasien) == 'BARU' ? 'selected' : '' }}>Baru</option>
                                        </select>
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

<style>
    /* Gaya khusus untuk textarea di luar form-group */
    .form-group textarea {
        width: 100%;
        /* Membuat textarea mengisi lebar maksimal kontainer */
        min-height: 100px;
        /* Menetapkan tinggi minimum textarea */
        resize: none;
        /* Mencegah pengguna untuk mengubah ukuran textarea */
        display: block;
        /* Menyesuaikan textarea ke dalam blok untuk memaksimalkan lebar */
        margin-bottom: 10px;
        /* Memberikan ruang di bawah textarea */
    }
</style>
@push('script')
<script>
    // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
    var today = new Date().toISOString().split('T')[0];
    document.getElementById('tanggal_periksa').value = today;
</script>
@endpush