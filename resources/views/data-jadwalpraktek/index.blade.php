@extends('layouts2.main', ['title' => 'Halaman Data Jadwal Praktek', 'page_heading' => 'Data Jadwal Praktek'])

@section('content')
<section class="section custom-section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>List Jadwal Praktek</h4>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="nav-icon fas fa-folder-plus"></i>&nbsp; Tambah Data Jadwal</button>
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
                        @else
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Dokter</th>
                                        <th>Nama Poli</th>
                                        <th>Hari</th>
                                        <th>Jadwal Praktek</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->dokter->nama_dokter }}</td>
                                        <td>{{ $data->poli->nama_poli }}</td>
                                        <td>{{ $data->hari_oper }}</td>
                                        <th>{{ $data->jadwal_praktek }}</th>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('data-jadwal-praktek.edit', $data->id) }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit"></i></a>
                                                <form method="POST" action="{{ route('data-jadwal-praktek.destroy', $data->id) }}">
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
                            <h5 class="modal-title">Tambah Jadwal Praktek</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('data-jadwal-praktek.store') }}" method="POST">
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
                                            <label for="dokter_id">Nama Dokter</label>
                                            <select id="doketr_id" name="dokter_id" class="select2 form-control ">
                                                <option value="">-- Pilih Dokter --</option>
                                                @foreach ($dokter as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama_dokter }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="poli_id">Nama Poli</label>
                                            <select id="poli_id" name="poli_id" class="select2 form-control ">
                                                <option value="">-- Pilih Poli --</option>
                                                @foreach ($poli as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama_poli }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="hari_oper">Hari</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <select id="hari_awal" name="hari_awal" class="select2 form-control ">
                                                        <option value="">-- Pilih Hari --</option>
                                                        <option value="Senin">Senin</option>
                                                        <option value="Selasa">Selasa</option>
                                                        <option value="Rabu">Rabu</option>
                                                        <option value="Kamis">Kamis</option>
                                                        <option value="Jumat">Jumat</option>
                                                        <option value="Sabtu">Sabtu</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select id="hari_akhir" name="hari_akhir" class="select2 form-control ">
                                                        <option value="">-- Pilih Hari --</option>
                                                        <option value="Senin">Senin</option>
                                                        <option value="Selasa">Selasa</option>
                                                        <option value="Rabu">Rabu</option>
                                                        <option value="Kamis">Kamis</option>
                                                        <option value="Jumat">Jumat</option>
                                                        <option value="Sabtu">Sabtu</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jadwal_praktek">Jadwal Praktek</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="time" id="jadwal_awal" name="jadwal_awal" class="form-control @error('jadwal_awal') is-invalid @enderror">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="time" id="jadwal_akhir" name="jadwal_akhir" class="form-control @error('jadwal_akhir') is-invalid @enderror">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer bg-whitesmoke br">
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