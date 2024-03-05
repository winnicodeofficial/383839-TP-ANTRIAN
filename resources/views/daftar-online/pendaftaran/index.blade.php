<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Antrian Online</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
            max-width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #3498db;
        }

        .alert {
            margin-bottom: 20px;
        }

        .btn-container {
            text-align: right;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 8px;
            background-color: #3498db;
            color: #fff;
            border: none;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Pendaftaran Antrian Online</h1>
        <form action="{{ route('biodata-pasien.store') }}" method="POST">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error )
                {{ $error }}
                @endforeach
            </div>
            @endif
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" id="nik" name="nik" class="form-control" placeholder="{{ __('NIK') }}">
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="{{ __('Nama') }}">
            </div>
            <div class="form-group">
                <label for="nama_kk">Nama KK</label>
                <input type="text" id="nama_kk" name="nama_kk" class="form-control" placeholder="{{ __('Nama KK') }}">
            </div>
            <div class="form-group">
                <label for="alamat">ALAMAT</label>
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="{{ __('Alamat') }}">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">TANGGAL LAHIR</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" placeholder="{{ __('Tanggal Lahir') }}">
            </div>
            <div class="form-group">
                <label for="usia">USIA</label>
                <input type="text" id="usia" name="usia" class="form-control" placeholder="{{ __('Usia') }}">
            </div>
            <div class="form-group">
                <label for="no_hp">NOMOR HP</label>
                <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="{{ __('Nomor HP') }}">
            </div>
            <div class="form-group" style="display: none;">
                <label for="status_pasien">STATUS PASIEN</label>
                <select id="status_pasien" name="status_pasien" class="form-control @error('Masukan Status Pasien') is-invalid @enderror">
                    <option value="baru">Baru</option>
                </select>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn">Kirim</button>
            </div>
        </form>
    </div>
</body>

</html>