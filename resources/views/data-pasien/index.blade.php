@extends('layouts2.main', ['title' => 'Halaman Data Pasien', 'page_heading' => 'Data Pasien'])

@section('content')
<section class="section custom-section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>List Pasien</h4>
                        <div>
                            <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#exportModal">
                                <i class="fas fa-fw fa-file-excel"></i>&nbsp; Export
                            </button>
                            <button class="btn btn-primary ml-3" data-toggle="modal" data-target="#exampleModal">
                                <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Tambah Data Pasien
                            </button>
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
                                        <th>NIK</th>
                                        <th>NAMA LENGKAP</th>
                                        <th>NAMA KK</th>
                                        <th>ALAMAT</th>
                                        <th>TANGGAL LAHIR</th>
                                        <th>USIA</th>
                                        <th>NOMOR HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasien as $result => $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nik }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->nama_kk }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->tanggal_lahir }}</td>
                                        <td>{{ $data->usia }}</td>
                                        <td>{{ $data->no_hp }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('data-pasien.edit', $data->id) }}" class="btn btn-success btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                                                <form method="POST" action="{{ route('data-pasien.destroy', $data->id) }}">
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
                            <h5 class="modal-title">Tambah Pasien</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('data-pasien.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
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
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" id="nik" name="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="{{ __('nik') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Nama') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_kk">Nama KK</label>
                                            <input type="text" id="nama_kk" name="nama_kk" class="form-control @error('nama_kk') is-invalid @enderror" placeholder="{{ __('nama_kk') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">ALAMAT</label>
                                            <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="{{ __('alamat') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir">TANGGAL LAHIR</label>
                                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="{{ __('tanggal_lahir') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="usia">USIA</label>
                                            <input type="text" id="usia" name="usia" class="form-control @error('usia') is-invalid @enderror" placeholder="{{ __('usia') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">NOMOR HP</label>
                                            <input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="{{ __('no_hp') }}">
                                        </div>
                                        <div class="form-group" style="display: none;">
                                            <label for="status_pasien">STATUS PASIEN</label>
                                            <select id="status_pasien" name="status_pasien" class="form-control @error('Masukan Status Pasien') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Status Pasien</option>
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

    <!-- Modal Export -->
    <div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportModalLabel">Export Data Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Teks Konfirmasi -->
                    <p class="mb-4">Apakah Anda yakin untuk melakukan export data pasien?</p>

                    <!-- Opsi Export -->
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('excel.pasien.export') }}" class="btn btn-success mr-3">
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
@endpush