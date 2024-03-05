@extends('layouts2.main', ['title' => 'Halaman Data Dianogsa', 'page_heading' => 'Data Dianogsa'])

@section('content')
<section class="section custom-section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>List Dianogsa</h4>
                        <div class="d-flex justify-content-between">
                            <!--
                            <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#exampleModal">
                                <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Tambah Data Dianogsa
                            </button>
                            -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">
                                Tambah Data
                            </button>

                            <form action="{{ route('data-dianogsa.reset') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger ml-3 reset_confirm">Reset Data</button>
                            </form>
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
                        @elseif ($message = Session::get('danger'))
                        <div class="alert alert-danger alert-dismissible show fade">
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
                                        <th>No.RM</th>
                                        <th>Nama Pasien</th>
                                        <th>Dianogsa</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dianogsa as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->no_rm }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ Str::limit($data->dianogsa, 30, '...') }}</td>
                                        <td>{{ $data->tanggal_periksa }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <!--
                                                <a href="#" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit"></i></a>
                                                -->
                                                <form method="POST" action="{{ route('data-dianogsa.destroy', $data->id) }}">
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
                            <h5 class="modal-title">Tambah Data Dianogsa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('data-dianogsa.store') }}" method="POST">
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
                                            <label for="no_rm">No. RM</label>
                                            <input type="text" id="no_rm" name="no_rm" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Masukkan Nama Pasien') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Pasien</label>
                                            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Masukkan Nama Pasien') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="dianogsa">Dianogsa</label>
                                            <input type="text" id="dianogsa" name="dianogsa" class="form-control @error('dianogsa') is-invalid @enderror" placeholder="{{ __('Masukkan Dianogsa') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_periksa">Tanggal</label>
                                            <input type="date" id="tanggal_periksa" name="tanggal_periksa" class="form-control @error('tanggal_periksa') is-invalid @enderror" readonly>
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
                <form action="{{ route('cek-dianogsa') }}" method="post">
                    @csrf
                    <label for="nomor_antrian">Cek Data Rekap</label>
                    <input type="text" class="form-control" id="nomor_antrian" name="no_rm" placeholder="Masukkan No.RM" required>
                    <button type="submit" class="btn btn-primary">Cek</button>
                </form>
            </div>
        </div>
    </div>
</div>
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

    $('.reset_confirm').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        swal({
                title: `Yakin ingin mereset data ini?`,
                text: "Data akan dikembalikan ke pengaturan awal!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willReset) => {
                if (willReset) {
                    form.submit();
                }
            });
    });
</script>
<script>
    // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
    var today = new Date().toISOString().split('T')[0];
    document.getElementById('tanggal_periksa').value = today;
</script>
@endpush