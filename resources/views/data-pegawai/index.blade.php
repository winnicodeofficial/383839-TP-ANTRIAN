@extends('layouts2.main', ['title' => 'Admin Dashboard', 'page_heading' => 'Data Pegawai'])

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
                                <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Tambah Data Pegawai
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
                                        <th>NAMA LENGKAP</th>
                                        <th>NIP</th>
                                        <th>JABATAN</th>
                                        <th>UNIT KERJA</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $result => $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->nip }}</td>
                                        <td>{{ $data->jabatan }}</td>
                                        <td>{{ $data->unit_kerja }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('data-pegawai.edit', $data->id) }}" class="btn btn-success btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                                                <form method="POST" action="{{ route('data-pegawai.destroy', $data->id) }}">
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
                            <h5 class="modal-title">Tambah Pegawai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('data-pegawai.store') }}" method="POST">
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
                                            <label for="nik">NIP</label>
                                            <input type="text" id="nik" name="nip" class="form-control @error('nik') is-invalid @enderror" placeholder="{{ __('Masukkan NIP') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" id="nama" name="name" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Masukan Nama Lengkap') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Email</label>
                                            <input type="text" id="nama" name="email" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Masukkan Email') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">ALAMAT</label>
                                            <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="{{ __('Masukkan Alamat') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror pwstrength" data-indicator="pwindicator" name="password" placeholder="{{ __('Masukkan Password') }}">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="pendidikan">Pendidikan</label>
                                            <select id="pendidikan" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror">
                                                <option value="" disabled selected>Pilih Pendidikan</option>
                                                <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                                                <option value="DIPLOMA">D3</option>
                                                <option value="D4">D4</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Status pegawai</label>
                                            <select id="status_pegawai" name="status_pegawai" class="form-control @error('alamat') is-invalid @enderror" placeholder="{{ __('alamat') }}">
                                                <option value="" disabled selected>Pilih Pegawai</option>
                                                <option value="ASN">ASN</option>
                                                <option value="NONASN">NON ASN</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="unit_kerja">Unit Kerja</label>
                                            <select id="unit_kerja" name="unit_kerja" class="form-control @error('usia') is-invalid @enderror" placeholder="{{ __('usia') }}">
                                                <option value="" disabled selected>Pilih Unit kerja</option>
                                                <option value="PUKESMAS PREMBUN">PUKESMAS PREMBUN</option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="display: none;">
                                            <label for=" level">Jabatan</label>
                                            <select id="level" name="level" class="form-control @error('no_hp') is-invalid @enderror" placeholder="{{ __('Masukkan Jabatan') }}">
                                                <option value="Petugas">Petugas</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <input type="text" id="jabatan" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" placeholder="{{ __('Masukan Masukkan Jabatan') }}">
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
                        <a href="{{ route('excel.pegawai.export') }}" class="btn btn-success mr-3">
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