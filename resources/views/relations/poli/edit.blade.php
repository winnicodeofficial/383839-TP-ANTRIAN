@extends('layouts2.main', ['title' => 'Halaman Data Poli', 'page_heading' => 'Data Poli'])

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
                        <h4>Edit Data Poli</h4>
                        <a href="{{ route('data-poli.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('data-poli.update', $poli->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_mapel">Nama Poli</label>
                                <input type="text" id="nama_mapel" name="nama_Poli" class="form-control @error('nama_poli') is-invalid @enderror" placeholder="{{ __('Masukkan Nama Poli') }}" value="{{ $poli->nama_poli }}">
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