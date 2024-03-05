<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Cek</title>
</head>

<body>
    <div class="container">
        <h1>Tambah Dianogsa</h1>
        <form action="{{ route('cek-dianogsa') }}" method="post">
            @csrf
            <label for="no_rm">Cek Data Rekap</label>
            <input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="Masukan No.RM" required>

            <button type="submit" class="btn btn-primary">Cek</button>
        </form>
    </div>
</body>

</html>