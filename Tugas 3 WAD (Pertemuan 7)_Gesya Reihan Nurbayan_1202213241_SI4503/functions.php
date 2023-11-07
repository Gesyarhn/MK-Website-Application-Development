<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "perpustakaan_wad");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    // ambil data dari tiap elemen dalam form
    $judulbuku = htmlspecialchars($data["judulbuku"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $status = htmlspecialchars($data["status"]);

    // upload gambar
    $coverbuku = upload();
    if (!$coverbuku) {
        return false;
    }
    // htmlspecialchars berfungsi untuk menghindari user iseng yang ingin berusaha menginputkan script html melalui sebuah form

     // query insert data
    $query = "INSERT INTO buku
                VALUES
            ('', '$judulbuku', '$coverbuku', '$penulis', '$status')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['coverbuku']['name'];
    $ukuranFile = $_FILES['coverbuku']['size'];
    $error = $_FILES['coverbuku']['error'];
    $tmpName = $_FILES['coverbuku']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "
        <script>
            alert('Pilih gambar terlebih dahulu!');
        </script>";
        return false;
    } 

    // cek apakah yang di upload itu gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
            alert('Yang Anda upload bukan gambar!');
        </script>";
        return false;
    }

    // cek jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "
        <script>
            alert('Ukuran gambar terlalu besar!');
        </script>";
        return false;
    }

    // lolos pengecekan gambar siap di upload
    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}



function hapus ($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $judulbuku = htmlspecialchars($data["judulbuku"]);
    
    $penulis = htmlspecialchars($data["penulis"]);
    $status = htmlspecialchars($data["status"]);
    // htmlspecialchars berfungsi untuk menghindari user iseng yang ingin berusaha menginputkan script html melalui sebuah form

    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user memilih gambar baru atau tidak
    if ($_FILES['coverbuku']['error'] === 4) {
        $coverbuku = $gambarLama;
    } else {
        $coverbuku = upload();
    }

     // query update data
    $query = "UPDATE buku SET
                judulbuku = '$judulbuku', coverbuku = '$coverbuku', penulis = '$penulis', status = '$status' WHERE id = $id";
                
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>