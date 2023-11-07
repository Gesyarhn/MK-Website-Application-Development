<?php
// memanggil file functions
    require 'functions.php';

    $buku = query("SELECT * FROM buku");
    
?>

<!-- Latihan 1 Tabel terkoneksi ke database -->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Perpustakaan WAD</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-dark navbar-light fixed-top py-3">
            <div class="container">
                <a href="#" class="navbar-brand fs-5 fw-semibold text-light">Perpustakaan WAD</a>

                <button 
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navmenu">

                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                      <li class="nav-item">
                        <a href="#daftarbuku" class="nav-link fs-5 text-light">Daftar Buku</a>
                      </li>
                      <li class="nav-item">
                        <a href="#contact" class="nav-link fs-5 text-light">Contact Center</a>
                      </li>
                    </ul>

                </div>
            </div>
        </nav>

        <section class="container d-flex justify-content-between align-items-center pt-5 mt-5" id="daftarbuku">
            <div>
                <h1 class="mt-5 mb-5">Daftar Buku</h1>
            </div>
            <div>
                <a href="tambah.php" class="btn btn-success btn-lg" role="button"><i class="bi bi-plus-lg pe-2"></i>Tambah Data Buku</a>
            </div>
            
        </section>
    
        <section class="container">
            <table class="table table-primary table-striped p-5 table-bordered">
                <tr class="table-primary">
                    <th class="fs-5 align-middle text-center">Id</th>
                    <th class="fs-5 align-middle text-center">Judul Buku</th>
                    <th class="fs-5 align-middle text-center">Cover Buku</th>
                    <th class="fs-5 align-middle text-center">Penulis</th>
                    <th class="fs-5 align-middle text-center">Status</th>
                    <th class="fs-5 align-middle text-center">Action</th>
                </tr>

                <?php $i = 1; ?>
                <?php
                    foreach ($buku as $row) :
                ?>

                <tr class="table">
                    <td class="align-middle text-center"> <?php echo $i; ?> </td>
                    <td class="align-middle text-center"><?php echo $row["judulbuku"]; ?></td>
                    <td class="align-middle text-center"><img src="img/<?php echo $row["coverbuku"]; ?>" alt="" width="200px;"></td>
                    <td class="align-middle text-center"><?php echo $row["penulis"]; ?></td>
                    <td class="align-middle text-center"><?php echo $row["status"]; ?></td>
                    <td class="align-middle text-center">
                        <a href="ubah.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary" role="button">Update</a>
                        <a href="hapus.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger" role="button" onclick="return confirm('yakin Anda akan menghapusnya?');">Delete</a>
                    </td>
                </tr>
                <?php $i ++; ?>
                <?php
                endforeach;
                ?>
            </table>
        </section>

        <section class="p-5 container" id="contact">
            <div class="row g-4 align-items-center">
                <div class="col-md">
                    <h2 class="text-center mb-4">Contact Center</h2>
                    <ul class="list-group list-group-flush lead">
                        <li class="list-group-item">
                            <i class="bi bi-geo-alt"></i>
                            <span class="fw-bold">Location:</span>
                            <br>Jl. Telekomunikasi. 1, Terusan Buahbatu
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-telephone"></i>
                            <span class="fw-bold">Mobile Phone:</span>
                            <br>(62+) 812-2123-3214
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-instagram"></i>
                            <span class="fw-bold">Instagram:</span>
                            <br>@perpustakaanwad
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-envelope"></i>
                            <span class="fw-bold">E-mail:</span>
                            <br>perpustakaanwad@gmail.com
                        </li>

                    </ul>
                </div>
                <div class="col-md">
                    <img
                    class="img-fluid d-none d-lg-block"
                    src="img/contact.svg" alt="contact">
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="p-5 bg-dark text-white text-center position-relative">
            <div class="container">
                <p class="lead">Copyright &copy; 2023 gesyareihan@gmail.com</p>

                <a href="#" class="position-absolute bottom-0 end-0 p-5">
                    <i class="bi bi-arrow-up-circle h1"></i>
                </a>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
