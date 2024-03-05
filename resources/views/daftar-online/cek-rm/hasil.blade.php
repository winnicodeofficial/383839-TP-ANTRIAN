<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Cek Data</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            width: 90%;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
            color: #3498db;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Ditemukan</h1>
        <h1>{{ $data->no_rm }} - {{ $data->nama_pasien }}</h1>
        <table>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Usia</th>
                <th>No HP</th>
            </tr>
            <tr>
                <td>{{ $data->nama_pasien }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->usia }}</td>
                <td>{{ $data->no_hp }}</td>
            </tr>
        </table>
        <a href="/" class="back-button">Kembali</a>
        <a href="/form-pendaftaran" class="back-button">Poli</a>
    </div>
</body>

</html>