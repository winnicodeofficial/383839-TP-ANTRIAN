@extends('layouts2.main', ['title' => 'Halaman Data Pasien', 'page_heading' => 'Data Rekap Pasien'])

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
                        <h4>Edit Rekap</h4>
                        <a href="{{ route('data-rekap.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('data-rekap.update', $rekap->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nik">No.Rm</label>
                                        <input type="text" id="nik" name="no_rm" class="form-control @error('no_rm') is-invalid @enderror" placeholder="{{ __('No Rm') }}" value="{{ $rekap->no_rm ?? '' }}" data-toggle="modal" data-target="#myModal" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_kk">NAMA</label>
                                        <input type="text" id="nama_kk" name="nama_pasien" class="form-control @error('nama_pasien') is-invalid @enderror" placeholder="{{ __('Nama Pasien') }}" value="{{ $rekap->nama_pasien ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">ALAMAT</label>
                                        <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="{{ __('Alamat') }}" value="{{ $rekap->alamat ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat">USIA</label>
                                        <input type="text" id="alamat" name="usia" class="form-control @error('alamat') is-invalid @enderror" placeholder="{{ __('Usia') }}" value="{{ $rekap->usia ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="no_hp">NO HP</label>
                                        <input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="{{ __('No Hp') }}" value="{{ $rekap->no_hp ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="status_pasien">STATUS PASIEN</label>
                                        <select id="status_pasien" name="status_pasien" class="form-control @error('status_pasien') is-invalid @enderror">
                                            <option value="#">Silahkan Pilih</option>
                                            <option value="baru" {{ isset($rekap) && $rekap->status_pasien == 'baru' ? 'selected' : '' }}>Baru</option>
                                            <option value="lama" {{ isset($rekap) && $rekap->status_pasien == 'lama' ? 'selected' : '' }}>Lama</option>
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

<!-- Bootstrap Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="popupModalLabel">Rekam Medis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>NO Rekam Medis Bersifat Permanen.</p>
            </div>
        </div>
    </div>
</div>
@endsection


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>