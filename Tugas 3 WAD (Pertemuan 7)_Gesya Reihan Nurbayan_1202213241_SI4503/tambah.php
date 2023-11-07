<?php
require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){

    // Latihan 3 : Notifikasi cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan!');
            document.location.href = 'index.php'
        </script>
        ";
    }

}
?>

<!-- Latihan 2 Membuat form yang dapat di input ke dalam database -->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tambah Data Buku</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <section class="container mt-5">
            <h1><img src="img/undraw_mathematics_-4-otb.svg" alt="" width="150px" class="pe-3">Tambah Data Buku</h1><hr>
            
            <form action="" method="post" class="form-floating" enctype="multipart/form-data">
                <ul>
                    <li>
                        <label for="judulbuku" class="fs-5 fw-semibold pt-3">Judul Buku :</label>
                        <input type="text" name="judulbuku" id="judulbuku" class="form-control" placeholder="Tuliskan judul buku disini" required><br>
                    </li>
                    <li>
                        <label for="coverbuku" class="fs-5 fw-semibold">Cover Buku :</label>
                        <input type="file" name="coverbuku" id="coverbuku" class="form-control" placeholder="Tuliskan gambar buku disini" required><br>
                    </li>
                    <li>
                        <label for="penulis" class="fs-5 fw-semibold">Penulis :</label>
                        <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Tuliskan nama penulis buku disini" required><br>
                    </li>
                    <li>
                        <label for="status" class="fs-5 fw-semibold">Status :</label>
                        <input type="text" name="status" id="status" class="form-control" placeholder="Tuliskan status buku disini" required><br>
                    </li>
                    
                    <button class="btn btn-primary" type="submit" name="submit">Tambah Data!</button>
                    
                </ul>
            </form>
        </section>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>