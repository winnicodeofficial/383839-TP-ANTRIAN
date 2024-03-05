@extends('layouts2.main', ['title' => 'Halaman Data Dokter', 'page_heading' => 'Data Dokter'])

@section('content')
<section class="section">
    <div class="section-body">
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Edit Data Dokter</h4>
                        <a href="{{ route('data-dokter.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('data-dokter.update', $dokter->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_mapel">Nama Dokter</label>
                                <input type="text" id="nama_mapel" name="nama_dokter" class="form-control @error('nama_dokter') is-invalid @enderror" placeholder="{{ __('Nama Mata Pelajaran') }}" value="{{ $dokter->nama_dokter }}">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection