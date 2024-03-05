@extends('layouts2.main', ['title' => 'Halaman Data Dianogsa', 'page_heading' => 'Data Dianogsa'])

@section('content')
@if ($errors->any())
<section class="section custom-section">
    <div class="section-body">
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
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>List Rekap</h4>
                        <div>
                            <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#exportModal">
                                <i class="fas fa-fw fa-file-excel"></i>&nbsp; Export
                            </button>
                            <!--
                            <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#importModal">
                                <i class="fas fa-fw fa-file-excel"></i>&nbsp; Import
                            </button>
                            -->
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Tambah Data Rekap
                            </button>
                            <!--
                            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">
                                <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Tambah Data Otomatic
                            </button>
                            -->
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ $message }}
                            </div>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NO.RM</th>
                                        <th>NO.PENDAFTARAN</th>
                                        <th>NAMA</th>
                                        <th>ALAMAT</th>
                                        <th>USIA</th>
                                        <th>NOMOR HP</th>
                                        <th>DIANOGSA</th>
                                        <th>STATUS PASIEN</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rekap as $result => $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->no_rm }}</td>
                                        <td>{{ $data->no_daftar }}</td>
                                        <td>{{ $data->nama_pasien }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->usia }}</td>
                                        <td>{{ $data->no_hp }}</td>
                                        <td>{{ $data->dianogsa }}</td>
                                        <td>{{ $data->status_pasien }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('data-rekap.edit', $data->id) }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit"></i></a>
                                                <form method="POST" action="{{ route('data-rekap.destroy', $data->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm show_confirm" data-toggle="tooltip" title='Delete' style="margin-left: 8px"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Rekap</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('data-rekap.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nik">No.RM</label>
                                            <input type="text" id="nik" name="no_rm" class="form-control @error('nik') is-invalid @enderror" placeholder="{{ __('Masukkan Rekam Medis') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">No.Pendaftaran</label>
                                            <input type="text" id="nama" name="no_daftar" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Masukkan Nama') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_kk">Nama</label>
                                            <input type="text" id="nama_kk" name="nama_pasien" class="form-control @error('nama_kk') is-invalid @enderror" placeholder="{{ __('Masukkan Nama KK') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">ALAMAT</label>
                                            <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="{{ __('Masukkan Alamat') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir">TANGGAL LAHIR</label>
                                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="{{ __('Masukkan Tanggal Lahir') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="usia">USIA</label>
                                            <input type="text" id="usia" name="usia" class="form-control @error('usia') is-invalid @enderror" placeholder="{{ __('Masukkan Usia') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">NOMOR HP</label>
                                            <input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="{{ __('Masukkan No Hp') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="dianogsa">DIANOGSA</label>
                                            <input type="text" id="dianogsa" name="dianogsa" class="form-control @error('no_hp') is-invalid @enderror" placeholder="{{ __('Masukkan Dianogsa') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status_pasien">STATUS PASIEN</label>
                                            <select id="status_pasien" name="status_pasien" class="form-control @error('Masukan Status Pasien') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Status Pasien</option>
                                                <option value="lama">Lama</option>
                                                <option value="baru">Baru</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer br">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        @csrf
                        <label for="nomor_antrian">Cek Data</label>
                        <input type="text" class="form-control" id="nomor_antrian" name="nama" placeholder="Masukkan No Hp" required>
                        <button type="submit" class="btn btn-primary">Cek</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Export -->
    <div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportModalLabel">Export Data Rekap</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Teks Konfirmasi -->
                    <p class="mb-4">Apakah Anda yakin untuk melakukan export data rekap?</p>

                    <!-- Opsi Export -->
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('excel.rekap.export') }}" class="btn btn-success mr-3">
                            <i class="fas fa-fw fa-file-excel"></i>&nbsp; Export Excel
                        </a>
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                            Kembali
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Import -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Rekap</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="p" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="file">Pilih File Excel</label>
                            <input type="file" name="file" class="form-control">
                            @error('file')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Import</button>

                        <!-- Tombol Download Template -->
                        <a href="{{ url('assets/excel/Template-Rekap.xlsx') }}" class="btn btn-info">
                            <i class="fas fa-download"></i> Download Template
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('script')
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Yakin ingin menghapus data ini?`,
                text: "Data akan terhapus secara permanen!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        // Mendeteksi perubahan pada input tanggal lahir
        $("#tanggal_lahir").change(function() {
            // Mendapatkan nilai tanggal lahir
            var tanggalLahir = new Date($(this).val());

            // Mendapatkan tanggal hari ini
            var today = new Date();

            // Menghitung selisih tahun
            var age = today.getFullYear() - tanggalLahir.getFullYear();

            // Mengupdate nilai pada input usia
            $("#usia").val(age);
        });
    });
</script>
@endpush