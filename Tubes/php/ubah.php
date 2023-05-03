<?php

session_start();

if (!isset($_SESSION["submit"])) {
    header("Location: login.php");
}
// koneksi ke dbms
$conn = mysqli_connect("localhost", "root", "", "tugas_besar");
require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$brg = query("SELECT * FROM items WHERE id = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {




    // cek apakah data berhasil di ubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
           <script> 
            alert('data berhasil diubah!');
            document.location.href = 'admin.php';
           </script>
        ";
    } else
        echo "<script>
    alert('data gagal diubah!);
    document.location.href = 'admin.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ubah data mahasiswa</title>
</head>

<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $brg["id"] ?>">

        <ul>
            <li>
                <label for="nama">nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $brg["nama"] ?>">
            </li>
            <li>
                <label for="brand">brand : </label>
                <input type="text" name="brand" id="brand" required value="<?= $brg["brand"] ?>">
            </li>
            <li>
                <label for="harga">harga : </label>
                <input type="text" name="harga" id="harga" required value="<?= $brg["harga"] ?>">
            </li>
            <li>
                <label for="detail">detail : </label>
                <input type="text" name="detail" id="detail" required value="<?= $brg["detail"] ?>">
            </li>

            <li>

                <label for="gambar">Gambar : </label> <br>
                <img src="img/<?= $brg["gambar"]; ?>" width="85"> <br>

                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>

    </form>

</body>

</html>