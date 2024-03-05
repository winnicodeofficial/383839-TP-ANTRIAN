<div class="server-info">
    <p class="info-item"><strong>Server:</strong> Singapura</p>
    <p class="info-item"><strong>IP Public:</strong> 8.222.235.174</p>
    <p class="info-item"><strong>Port:</strong> 8090</p>
    <p class="info-item"><strong>Sistem Operasi:</strong> Ubuntu</p>
    <p class="info-item"><strong>Database:</strong></p>
    <div class="database-download">
        <p class="info-item">
            <a href="{{ url('assets/db_temp/db.sql') }}" class="btn btn-info" id="downloadBtn">
                <i class="fas fa-download"></i> Unduh Database
            </a>
        </p>
    </div>
</div>

<style>
    .server-info {
        background-color: #f5f5f5;
        padding: 20px;
        border-radius: 10px;
        margin: 20px 0;
    }

    .info-item {
        margin: 10px 0;
    }

    .btn-info {
        background-color: #17a2b8;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-info:hover {
        background-color: #117a8b;
    }
</style>
<script>
    // Mendapatkan elemen button
    var downloadButton = document.getElementById('downloadBtn');

    // Menambahkan event listener untuk mengatur disabled setelah diklik
    downloadButton.addEventListener('click', function() {
        // Menetapkan disabled setelah diklik
        this.setAttribute('disabled', true);

        // Menambahkan teks "Sedang Mengunduh" (Opsional)
        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sedang Mengunduh';

        // Contoh: Pindah ke halaman lain setelah 3 detik (Anda dapat menyesuaikan ini)
        setTimeout(function() {
            window.location.href = downloadButton.href;
        }, 3000);
    });
</script>