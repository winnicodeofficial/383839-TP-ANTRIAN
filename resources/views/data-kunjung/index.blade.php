@extends('layouts2.main', ['title' => 'Halaman Data Kunjungan', 'page_heading' => 'Data Kunjungan'])

@section('content')
<section class="section custom-section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>List Data Kunjungan</h4>
                        <div>
                            <a href="{{ route('excel.kunjung.export') }}" class="btn btn-success ml-3">
                                <i class="fas fa-fw fa-file-excel"></i>&nbsp; Export
                            </a>
                            <a href="{{ url('/data-kunjungan/reset') }}" class="btn btn-danger">Reset Kunjungan</a>
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
                        @else
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>UMUM</th>
                                        <th>GIGI DAN MULUT</th>
                                        <th>KIA</th>
                                        <th>KB</th>
                                        <th>LANSIA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($poli as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->poli->nama_poli }}</td>
                                        <td>{{ $data->poli->nama_poli }}</td>
                                        <td>{{ $data->poli->nama_poli }}</td>
                                        <td>{{ $data->poli->nama_poli }}</td>
                                        <td>{{ $data->poli->nama_poli }}</td>
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
                            <h5 class="modal-title">Tambah Data Kunjungan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('data-kunjung.store') }}" method="POST">
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
                                            <label for="nama_dokter">Nama Pasien</label>
                                            <input type="text" id="nama_dokter" name="nama_pasien" class="form-control @error('nama_dokter') is-invalid @enderror" placeholder="{{ __('nama_pasien') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_dokter">Nomor Pendaftar</label>
                                            <input type="text" id="nama_dokter" name="no_daftar" class="form-control @error('nama_dokter') is-invalid @enderror" placeholder="{{ __('nomor_daftar') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_dokter">Tanggal Daftar</label>
                                            <input type="date" id="tanggal_daftar" name="tanggal_daftar" class="form-control @error('nama_dokter') is-invalid @enderror" placeholder="{{ __('tanggal_daftar') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="poli_id">Poli</label>
                                            <select id="poli_id" name="poli_id" class="select2 form-control ">
                                                <option value="">-- Pilih Poli --</option>
                                                @foreach ($poli as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama_poli }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_dokter">Dianogsa</label>
                                            <input type="text" id="nama_dokter" name="dianogsa" class="form-control @error('nama_dokter') is-invalid @enderror" placeholder="{{ __('dianogsa') }}">
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