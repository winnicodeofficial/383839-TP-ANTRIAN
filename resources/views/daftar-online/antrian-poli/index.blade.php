<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan Poli Yang di Tuju</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #495057;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .modal-body {
            width: 50%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #007bff;
        }

        .alert {
            margin-bottom: 20px;
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 4px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        select,
        input {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
        }

        .modal-footer {
            text-align: right;
            margin-top: 20px;
            border-top: 1px solid #dee2e6;
            padding-top: 10px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 8px;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .modal-body {
                width: 80%;
            }

            .btn {
                width: 100%;
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="modal-body">
        <form action="#" method="POST">
            @csrf
            <h1>Pemilihan Poli Yang di Tuju</h1>
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible show fade">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <div class="alert-body">
                    @foreach ($errors->all() as $error )
                    {{ $error }}
                    @endforeach
                </div>
            </div>
            @endif
            <div class="form-group">
                <label for="poli_id">Poli</label>
                <select id="poli_id" name="poli_id" class="select2 form-control">
                    <option value="">-- Pilih Poli --</option>
                    @foreach ($poli as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_poli }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="dokter_id">Dokter</label>
                <select id="dokter_id" name="dokter_id" class="select2 form-control">
                    <option value="">-- Pilih Dokter --</option>
                    @foreach ($dokter as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_dokter }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">TANGGAL</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="{{ __('tanggal_lahir') }}">
            </div>

            <div class="modal-footer">
                <a href="/" class="btn btn-danger">Kembali</a>
                <a href="/cetak-antrian" class="btn btn-primary">Kirim</a>
            </div>
        </form>
    </div>
</body>

</html>