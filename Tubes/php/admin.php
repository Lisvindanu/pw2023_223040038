<?php
session_start();

if (!isset($_SESSION["submit"])) {
    header("Location: login.php");
}
require 'functions.php';
$items = query("SELECT * FROM items ");

// ketika tombol cari ditekan
if (isset($_POST["cari"])) {
    $items = cari($_POST["keyword"]);
}
$hours = date("H");



?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/tabel.css">
    <link rel="stylesheet" href="../assets/css/navbwah.css" />
    <link rel="stylesheet" href="../assets/css/slider.css" />
    <link rel="stylesheet" href="../assets/css/adminhp.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">



</head>

<body>
    <?php include('../tambahanlain/navadmin.php') ?>

    <section class="admin mobile" style="margin-top:30px !important">



        <div class="container py-2 mobile tom " style="padding-top: 60px !important; ">
            <div class="row justify-content-between">
                <div class="col-6 col-lg-2 px-4 py-5 ">
                    <div class="tambah py-2">
                        <a class="btn btn-outline-danger px-3" role="button" href="../php/tambahdata.php">Add Product</a>
                    </div>

                </div>
                <div class="col-6 col-lg-2  py-5 ">
                    <div class="cari">
                        <form action="" method="post" size="40" class="py-2">
                            <input type="text" name="keyword" autofocus placeholder="masukan keyword pencarian.." autocomplete="off">
                            <button type="submit" name="cari" class="btn btn-outline-primary">Cari!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <p><?php
                    if (isset($_COOKIE["username"])) {
                        echo "Halo, " .  "<span id='ucapan_salam'></span> " . $_COOKIE["username"] . ". Selamat bekerja";
                    } else {
                        echo "Selamat datang!";
                    }
                    ?></p>



                <p>Admin diharapkan memiliki waktu tidur yang cukup</p>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Aksi</th>

                        <th scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Detail</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($items as $brg) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td>
                                <a href="ubah.php?id=<?= $brg["id"]; ?>">ubah</a> |
                                <a href="hapus.php?id=<?= $brg["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>
                            </td>
                            <td><img src="../assets/img/<?= $brg["gambar"]; ?>" alt="foto" style="width: 150px;"></td>
                            <td><?= $brg["nama"]; ?></td>
                            <td><?= $brg["brand"]; ?></td>
                            <td><?= $brg["harga"]; ?></td>
                            <td><?= $brg["kategori"]; ?></td>
                            <td><?= $brg["detail"]; ?></td>
                        </tr>
                    <?php
                        $i++;
                    endforeach ?>

                </tbody>
            </table>
        </div>



    </section>

    <!-- nav hp -->
    <?php include('../tambahanlain/navbarhp.php') ?>
    <!-- nav hp end -->

</body>
<script>
    // javascript untuk ucapan selamat (pagi, siang, sore, malam)
    function updateSalam() {
        var now = new Date();
        var hour = now.getHours();
        var salam;

        if (hour >= 4 && hour < 11) {
            salam = "Selamat pagi";
        } else if (hour >= 11 && hour < 14) {
            salam = "Selamat siang";
        } else if (hour >= 14 && hour < 18) {
            salam = "Selamat sore";
        } else {
            salam = "Selamat malam";
        }


        document.getElementById('ucapan_salam').innerHTML = salam;
        setTimeout(updateSalam, 3600000);
    }

    // Memanggil fungsi updateGreeting untuk pertama kali
    updateSalam();
</script>

<!-- Kode di atas mendefinisikan sebuah fungsi bernama updateSalam() yang akan mengupdate ucapan salam pada halaman dengan waktu yang berjalan.
Di dalam fungsi updateSalam(), pertama-tama kita membuat objek Date yang merepresentasikan waktu saat ini menggunakan var now = new Date();.
Kemudian kita mengambil jam saat ini dari objek Date menggunakan var hour = now.getHours();.
Selanjutnya, kita mendefinisikan variabel salam untuk menyimpan ucapan salam yang akan ditampilkan.
Dengan menggunakan kondisi if-else, kita memeriksa nilai jam untuk menentukan ucapan salam yang sesuai. Misalnya, jika jam berada antara 0 dan 12, kita akan mengatur salam sebagai "Selamat pagi". Jika jam berada antara 12 dan 18, kita akan mengatur salam sebagai "Selamat siang". Begitu seterusnya.
Setelah kita menentukan ucapan salam yang sesuai, kita menggunakan document.getElementById('ucapan_salam').innerHTML untuk mengubah isi elemen dengan ID "ucapan_salam" menjadi ucapan salam yang telah ditentukan.
Terakhir, kita menggunakan setTimeout(updateSalam, 3600000) untuk mengatur timeout. Ini berarti fungsi updateSalam() akan dipanggil kembali setiap 3600000 milidetik (1 jam). -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>