<!-- Latihan 6 Membuat modul delete data -->

<?php
    require 'functions.php';

    $id = $_GET["id"];

    if (hapus($id) > 0 ) {
        // Latihan 7 membaut notifikasi apakah data udah terhapus atau belum
        echo "
        <script>
            alert('Data Berhasil Dihapus!');
            document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal untuk Dihapus!');
            document.location.href = 'index.php'
        </script>
        ";
    }
?>