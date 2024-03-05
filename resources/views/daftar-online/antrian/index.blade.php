<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrian Umum | Puskesmas Prembun</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            overflow: hidden;
            margin: 20px;
            /* Menambahkan margin pada card */
        }

        header {
            background-color: #4caf50;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-bottom: 100px;
            /* Menambahkan margin pada header */
        }

        h1 {
            margin: 0;
            color: #fff;
        }

        .form-group {
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        select,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        footer {
            text-align: center;
            color: #888;
            font-size: 14px;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border-radius: 0 0 8px 8px;
            margin-top: 100px;
            /* Menambahkan margin pada footer */
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>UPT PUKESMAS PREMBUN</h1>
        </header>

        <div class="form-group">
            <form action="/terimakasih-telah-mengisi-pendaftaran-online" method="post">
                @csrf
                <label for="poli_id">Poli</label>
                <select id="poli_id" name="poli_id" class="form-control">
                    <option value="">-- Pilih Poli --</option>
                    @foreach ($poli as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_poli }}</option>
                    @endforeach
                </select>

                <label for="dokter_id">Dokter</label>
                <select id="dokter_id" name="dokter_id" class="form-control">
                    <option value="">-- Pilih Dokter --</option>
                    @foreach ($dokter as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_dokter }}</option>
                    @endforeach
                </select>

                <button type="submit">Daftar Antrian</button>
                <div>
                    <p>Lupa Nomor Antrian? <a href="/check-antrian">Cek Disini</a></p>
                </div>
            </form>
        </div>

        <footer>
            <p>Sistem Antrian Online</p>
        </footer>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Display SweetAlert for success or error messages
    @if(session('error'))
        Swal.fire({
            title: 'MAAF',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    @endif

    @if(session('success'))
        Swal.fire({
            title: 'Success',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif

    @if(session('success') && session('pdfUrl'))
        Swal.fire({
            icon: 'success',
            title: 'Pendaftaran berhasil!',
            text: 'Klik OK untuk mendownload PDF.',
        }).then((result) => {
            // Redirect to the PDF download URL
            window.location.href = "{{ session('pdfUrl') }}";
        });
    @endif
</script>
<script>
    // Display SweetAlert on page load if there is a success message
    document.addEventListener('DOMContentLoaded', function() {
        let successMessage = '{{ session('
        success ') }}';

        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: successMessage,
                showConfirmButton: false,
                timer: 5000 // Close after 3 seconds
            });
        }
    });
</script>