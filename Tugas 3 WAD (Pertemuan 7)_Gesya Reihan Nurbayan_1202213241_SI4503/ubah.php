<!-- Latihan 4 Membuat modul update data -->

<?php
require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data buku berdasarkan id
$buku = query("SELECT * FROM buku WHERE id = $id") [0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){
    
    // Latihan 5 : Notifikasi cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Diubah!');
            document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Diubah!');
            document.location.href = 'index.php'
        </script>
        ";
    }

}
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ubah Data Buku</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <section class="container mt-5">
            <h1><img src="img/milihbuku.svg" alt="" width="150px" class="pe-3">Ubah Data Buku</h1><hr>
            <form action="" method="post" class="form-floating" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $buku["id"]; ?>">
                <input type="hidden" name="gambarLama" value="<?= $buku["coverbuku"]; ?>">
                <ul>
                    <li>
                        <label for="judulbuku" class="fs-5 pt-3 fw-semibold">Judul Buku :</label>
                        <input type="text" name="judulbuku" id="judulbuku" class="form-control" placeholder="Tuliskan judul buku disini" required value="<?= $buku["judulbuku"]; ?>"><br>
                    </li>
                    <li>
                        <label for="coverbuku" class="fs-5 fw-semibold">Cover Buku :</label>
                        <img src="img/<?= $buku['coverbuku'] ?>" alt="" width="150px" class="pb-3">
                        <input type="file" name="coverbuku" id="coverbuku" class="form-control" placeholder="Tuliskan gambar buku disini"><br>
                    </li>
                    <li>
                        <label for="penulis" class="fs-5 fw-semibold">Penulis :</label>
                        <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Tuliskan nama penulis buku disini" required value="<?= $buku["penulis"]; ?>"><br>
                    </li>
                    <li>
                        <label for="status" class="fs-5 fw-semibold">Status :</label>
                        <input type="text" name="status" id="status" class="form-control" placeholder="Tuliskan status buku disini" required value="<?= $buku["status"]; ?>"><br>
                    </li>
                    
                    <button class="btn btn-primary" type="submit" name="submit">Ubah Data!</button>
                    
                </ul>
            </form>
        </section>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>