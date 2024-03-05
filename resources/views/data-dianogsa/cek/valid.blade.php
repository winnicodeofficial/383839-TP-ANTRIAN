        @extends('layouts2.main', ['title' => 'Halaman Data Dianogsa', 'page_heading' => 'Data Dianogsa Valid'])

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
                                <h4>Tambah Dianogsa</h4>
                                <a href="{{ route('data-pasien.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('data-dianogsa.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nik">No.RM</label>
                                                <input type="text" id="nik" name="no_rm" class="form-control @error('nik') is-invalid @enderror" placeholder="{{ __('NIK') }}" value="{{ $data->no_rm }}" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="nama">NAMA LENGKAP</label>
                                                <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Nama Pasien') }}" value="{{ $data->nama_pasien }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_periksa">Tanggal</label>
                                                <input type="date" id="tanggal_periksa" name="tanggal_periksa" class="form-control @error('tanggal_periksa') is-invalid @enderror" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_kk">Dianogsa</label>
                                                <textarea id="nama_kk" name="dianogsa" class="form-control @error('nama_kk') is-invalid @enderror" placeholder="{{ __('Masukkan Dianogsa') }}"></textarea>
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