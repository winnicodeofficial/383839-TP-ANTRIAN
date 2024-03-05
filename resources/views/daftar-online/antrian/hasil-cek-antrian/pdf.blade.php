<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Antrian</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding: 20px;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
        }

        .content {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .value {
            color: #333;
        }

        .large {
            font-size: 24px;
            /* Ganti dengan ukuran yang diinginkan */
            font-weight: bold;
        }

        .footer {
            color: #888;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>UPT PUSKESMAS PREMBUN</h1>
    </div>

    <div class="content">
        <div class="label">Nomor Antrian:</div>
        <div class="value large">{{ $antrian->nomor_antrian }}</div>

        <div class="label">Nama Poli:</div>
        <div class="value">{{ $antrian->poli->nama_poli }}</div>

        <div class="label">Nama Dokter:</div>
        <div class="value">{{ $antrian->dokter->nama_dokter }}</div>

        <div class="label">Tanggal Pendaftaran:</div>
        <div class="value">{{ \Carbon\Carbon::parse($antrian->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY [Pukul] H:mm [WIB]') }}</div>
    </div>
    <div class="qrcode-container">
        <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="QR Code">

    </div>

    <div class="footer">
        <p>Semoga sehat selalu - Terima kasih atas kunjungan Anda</p>
    </div>
</body>

</html>