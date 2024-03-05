<!-- resources/views/errors/unauthorized.blade.php -->

@extends('layouts2.main', ['title' => 'Halaman Data Dokter', 'page_heading' => 'Tidak Dizinkan'])

@section('content')
<center>
    <h1>Maaf tidak diizinkan mengakses</h1>
</center>
<a href="/admin/dashboard" class="btn">Back Dahsbord</a>

<style>
    body {
        text-align: center;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 18px;
        text-decoration: none;
        color: #fff;
        background-color: #007bff;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>
<script>
    // Bootstrap-styled popup logic
    document.addEventListener('DOMContentLoaded', function() {
        // Using Bootstrap's modal to create a popup
        $('#popupModal').modal('show');

        // Close the modal after 5 seconds (adjust as needed)
        setTimeout(function() {
            $('#popupModal').modal('hide');
        }, 5000);
    });
</script>

<!-- Bootstrap Modal -->
<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="popupModalLabel">Tidak Diizinkan Mengakses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Mohon maaf, Anda tidak memiliki izin untuk mengakses halaman ini.</p>
            </div>
        </div>
    </div>
</div>
@endsection