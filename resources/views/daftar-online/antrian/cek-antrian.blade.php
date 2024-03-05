<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Antrian | Puskesmas Prembun</title>
    <style>
        /* Sesuaikan dengan gaya CSS yang Anda inginkan */
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
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
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
            padding: 10px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Cek Antrian</h1>
        <form action="/check-antrian" method="post">
            @csrf
            <label for="nomor_antrian">Nomor Antrian</label>
            <input type="text" id="nomor_antrian" name="nomor_antrian" placeholder="Masukan Nomor Antrian" required>

            <button type="submit">Cek Antrian</button>
        </form>
    </div>
</body>

</html>