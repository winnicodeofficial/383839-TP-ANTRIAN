<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Antrian | Pukesmas Prembun</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #3490dc;
            color: #fff;
        }

        td {
            text-align: left;
        }

        button.download-btn {
            background-color: #3490dc;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }

        button.download-btn:hover {
            background-color: #2779bd;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Antrian - {{ $antrian->nomor_antrian }}</h1>

        <table>
            <!-- Display all details of the queue here -->
            <tr>
                <th>Nomor Antrian</th>
                <td>{{ $antrian->nomor_antrian }}</td>
            </tr>
            <tr>
                <th>Nama Poli</th>
                <td>{{ $antrian->poli->nama_poli }}</td>
            </tr>
            <tr>
                <th>Nama Dokter</th>
                <td>{{ $antrian->dokter->nama_dokter }}</td>
            </tr>
            <tr>
                <th>Tanggal Pendaftaran</th>
                <td>{{ \Carbon\Carbon::parse($antrian->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY [Pukul] H:mm [WIB]') }}</td>
            </tr>
        </table>

        <!-- Button for downloading the PDF -->
        <button class="download-btn" onclick="downloadPDF()">Download PDF</button>
    </div>

    <!-- JavaScript function to initiate the download -->
    <script>
        function downloadPDF() {
            window.location.href = '/generate-pdf/{{ $antrian->id }}';
        }
    </script>
</body>

</html>